@props(['name', 'size', 'height'])

@php
    $avatar = new \Laravolt\Avatar\Avatar;
    $avatar->create($name)->setDimension($size)->setTheme('colorful');
@endphp

<img src="{{ $avatar->toBase64() }}" alt="{{ $name }}" @isset($height) height="{{ $height }}" @endisset class="rounded-circle header-profile-user">