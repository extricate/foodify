@extends('layouts/app')

@section('title', 'We can\'t find that page! (404)')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('error-404') }}
    </div>
@endsection

@section('content')
    <h2>We cannot find that page!</h2>
    <p>
        Are you sure you typed the name correctly? It's also possible the page has been removed, or that we moved the page ourselves for some reason.
    </p>
    <p>
        Here's some suggestions on what you could do next:
    <ul class="list-unstyled">
        <li>You could try searching for the page you are looking for.</li>
        <li>You could go to the <a href="{{ route('home') }}">homepage (dashboard)</a>.</li>
        <li>You could go back to the previous page.</li>
        <li>You could check the url for any typing errors.</li>
    </ul>
    </p>

    <p class="small">
        Debugging info:
        {{ $exception->getMessage() }}
    </p>
@endsection