@extends('layouts.admin')
@section('title') AdminLTE 3 | Dashboard 2 @endsection
@section('main')
    <x-admin.wrapper>
        <x-partials.admin.header />
        <x-partials.pages.admin.dashboard.main />
        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </x-admin.wrapper>
@endsection
