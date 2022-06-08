@extends('layouts.admin')
@section('title') AdminLTE 3 | Dashboard 2 @endsection
@section('main')
    <x-admin.wrapper>
        <x-partials.admin.header />
        <x-partials.pages.admin.dashboard.main />
        <x-partials.admin.footer />
    </x-admin.wrapper>
@endsection
