@extends('layouts/master')

@section('app')
    <body {{ Session::has('message') ? 'data-notification' : '' }} data-notification-type='{{ Session::get('alert_type', 'info') }}'
          data-notification-message='{{ json_encode(Session::get('message')) }}'>
    <div id="app">
        @include('navbar.nav')
        @include('navbar.submenu')
        <main @yield('background-style')>
            <div class="container">
                @yield('content')
            </div>
        </main>

        @include('footer.footer')
    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
@endsection
