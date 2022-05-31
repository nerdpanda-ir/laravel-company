@extends('layouts.front')
@section('title') عنوان پست@endsection
@section('main')
    <x-partials.header />
    <x-partials.pages.blog-details.main :bottomHeaderTitle="$bottomHeaderTitle"
     :bottomHeaderDescribe="$bottomHeaderDescribe"/>
    <x-partials.pages.blog-details.footer />
@endsection
