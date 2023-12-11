<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Cache;

class Setting extends Model
{
    protected $casts = [
        'value' => 'array'
    ];

    protected $fillable = [
        'lang',
        'key',
        'value'
    ];

    /**
     * @var Setting[]|\Illuminate\Database\Eloquent\Collection|null
     */
    static public $settings = null;

    static function getAll(string $key, $default = null){
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }
        $keys = explode('.', $key);
        $databaseKey = $keys[0];
        unset($keys[0]);
        $model = self
            ::$settings
            ->where('key', $databaseKey)
            ->first();
        if (empty($model)) {
            if (empty($default)) {
                //Throw an exception, you cannot resume without the setting.
                throw new \Exception('Cannot find setting: ' . $key);
            } else {
                return $default;
            }
        } else {
            return $model->value;
        }
    }

    static function get(string $key, $default = null, $lang = 'en')
    {
        if(is_null($lang)){
            $lang = app()->getLocale() ?? 'en';
        }
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }
        $keys = explode('.', $key);
        $databaseKey = $keys[0];
        unset($keys[0]);
        

        $cache_key = $databaseKey.'-x-'.$lang;
        if(Cache::has($cache_key)){
            $model = Cache::get($cache_key);
        }else{
            $model = self::$settings
                ->where('lang', $lang)
                ->where('key', $databaseKey)
                ->first();

            Cache::forget($cache_key);
            Cache::put($cache_key, $model, now()->addDays(30));
        }

        if (empty($model)) {
            if (empty($default)) {
                //Throw an exception, you cannot resume without the setting.
                // throw new \Exception('Cannot find setting: ' . $key);
                return null;
            } else {
                return $default;
            }
        } else {
            if(!empty( $keys)){
                return Arr::get($model->value, implode('.',$keys));
            }
            if(is_string( $model->value)){
                return $model->value;
            }
            if(Arr::has($model->value, 'default')){
                return $model->value['default'];
            }

            return $model->value;

        }
    }

    static function set(string $key, $value, $lang = 'en')
    {
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }

        $keys = explode('.', $key);
        $databaseKey = $keys[0];
        unset($keys[0]);
        
        $cache_key = $databaseKey.'-x-'.$lang;
        Cache::forget($cache_key);

        $model = self
            ::$settings
            ->where('lang', $lang)
            ->where('key', $databaseKey)
            ->first();

        if (empty($model)) {
            if(!empty($keys)){
                $array = [];
                $model = self::create([
                    'lang' => $lang,
                    'key' => $key,
                    'value' => Arr::set($array, implode('.',$keys), $value)
                ]);
            }
            else{
                $model = self::create([
                    'lang' => $lang,
                    'key' => $key,
                    'value' => $value
                ]);
            }

            self::$settings->push($model);
        } else {
            if(!empty($keys)){
                $old = $model->value;
                if(is_string($old)){
                    $old = ["default" => $old] ;
                }
                if(Arr::has($old, implode('.',$keys))){
                    $old = Arr::set($old, implode('.',$keys), $value);
                }
                else{
                    $old = Arr::add($old, implode('.',$keys), $value);
                }

                $model->update(['value' => $old]);
            }
            else{
                if(is_array($model->value)){
                    $new = $model->value;
                    $new['default'] = $value;
                    $value = $new;
                }
                $model->update(['value' => $value]);

            }

        }
        return true;
    }
}