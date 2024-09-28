<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('pageTitle') | Vannucci</title>
    <title>@yield('title','A default title')</title>
    <meta name="keywords" content="@yield('meta_keywords','Laravel, Wordpress')">
    <meta name="description"
          content="@yield('meta_description','Blog di Simone Vannucci, su tecnologia e programmazione')">
    <link rel="canonical" href="{{url()->current()}}"/>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/cirrus-ui" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"/>
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

    @livewireStyles
</head>
<body class="antialiased">
<livewire:login/>
<div id="page" class="row">
    <div id="header" class="col-4 p-3">
        @include("layout.header")
    </div>
    <div id="content" class="col p-3">
        @yield("content")
    </div>
    @yield('scripts')
    @livewireScripts
</div>
</body>
</html>
