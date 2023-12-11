<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class MenuItem extends Component
{
    public $title;
    public $route;
    public $icon;
    public $id;

    public function __construct($title, $route, $icon = null, $id = null)
    {
        $this->title = $title;
        $this->route = $route;
        $this->icon = $icon;
        $this->id = $id;
    }

    public function isActive()
    {
        // return Route::currentRouteName() === $this->route;
        $route = $this->route;

        if (substr_count($route, '.') === 2 && substr($route, -6) === '.index') {
            $route = substr_replace($route, '.*', -6);
        }

        return Str::is($route, Route::currentRouteName());
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.menu-item');
    }
}
