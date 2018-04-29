@extends('layouts.app')

@section('title', 'Settings')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('settings.index') }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            Your settings
        </div>
    </div>
@endsection