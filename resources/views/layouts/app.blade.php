@extends('layouts/master')

@section('app')
    <body>
    <div id="app">
        @include('navbar/nav')

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
    </body>
@endsection
