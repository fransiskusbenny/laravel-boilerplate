<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>{{ config('app.name')  }} - {{ ($breadcrumb = Breadcrumbs::current()) ? $breadcrumb->title : null }} @yield('title')</title>
    <meta name="author" content="Benny Halim">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="icon" href="{{ asset('vendor/pages/ico/60.png') }}">
    <link rel="icon" sizes="76x76" href="{{ asset('vendor/pages/ico/76.png') }}">
    <link rel="icon" sizes="120x120" href="{{ asset('vendor/pages/ico/120.png') }}">
    <link rel="icon" sizes="152x152" href="{{ asset('vendor/pages/ico/152.png') }}">
    <link href="{{ asset('vendor/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet"/>
    @stack('css')
    <link href="{{ asset('vendor/pages/css/pages-icons.css') }}" rel="stylesheet">
    <link class="main-stylesheet" href="{{ asset('vendor/pages/css/themes/corporate.css') }}" rel="stylesheet"/>
    <link class="main-stylesheet" rel="stylesheet" href="{{ asset('css/pages.css') }}">
</head>
<body class="fixed-header menu-pin menu-behind">

@yield('content')

<script src="{{ asset('js/vendor.js') }}"></script>
@stack('script_before')
<script src="{{ asset('js/app.js') }}"></script>
@stack('script_after')

@include('layouts.includes.flash_message')
</body>
</html>