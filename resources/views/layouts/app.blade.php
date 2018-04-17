@extends('layouts/master')

@section('app')
    <body {{ Session::has('message') ? 'data-notification' : '' }} data-notification-type='{{ Session::get('alert_type', 'info') }}'
          data-notification-message='{{ json_encode(Session::get('message')) }}'>
    <div id="app">
        @include('navbar.nav')
        <div class="breadcrumbs">
            <div class="container">
                @yield('submenu')
            </div>
        </div>
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
@endsection
