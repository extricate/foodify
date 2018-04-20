<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }} </title>
    <link rel="shortcut icon" href="{{{ asset('images/favicon/favicon.png') }}}">
    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.0.10/css/light.css" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.0.10/css/all.css" integrity="" crossorigin="anonymous">
</head>

@yield('app')

</html>