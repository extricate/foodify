@extends('layouts/app')

@section('title', 'Something went drastically wrong! (500)')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('error-500') }}
    </div>
@endsection

@section('content')
    <h2>Something went terribly wrong on the server.</h2>
    <p>
        It's not you, it's probably us. We have logged this error and will look into it.
    </p>
    <p>
        For now, we suggest you go back to the previous page or to the <a href="{{ route('home') }}">homepage (dashboard)</a>
    </p>

    <p>
        Debugging info:
        {{ $exception->getMessage() }}
    </p>
@endsection