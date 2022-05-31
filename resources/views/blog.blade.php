@extends('layouts.front')
@section('title') صفحه وبلاگ @endsection
@section('main')

    <x-partials.header />
    <x-partials.pages.blog.main
        :bottomHeaderTitle="$bottomHeaderTitle"
        :bottomHeaderDescribe="$bottomHeaderDescribe"/>
    <x-partials.pages.blog.footer />

@endsection
