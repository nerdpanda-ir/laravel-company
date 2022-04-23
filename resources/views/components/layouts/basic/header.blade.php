@props([
    'language'
])
<!doctype html>
<html lang="{!! $language !!}">
<head>
    <x-layouts.basic.header-partials.meta-tags />
    <x-layouts.basic.header-partials.assets />

    <title>@yield('title')</title>
</head>
