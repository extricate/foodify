@extends('layouts/master')

@section('app')
    <body {{ Session::has('message') ? 'data-notification' : '' }} data-notification-type='{{ Session::get('alert_type', 'info') }}'
          data-notification-message='{{ json_encode(Session::get('message')) }}'>
    <div id="app">
        @include('navbar.nav')
        <div class="breadcrumbs-container">
            <div class="container">
                @yield('submenu')
            </div>
        </div>
        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}" async></script>
    </body>
@endsection
