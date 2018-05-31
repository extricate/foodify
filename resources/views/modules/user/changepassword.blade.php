@extends('layouts.app')

@section('title', 'Password - Settings')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('settings.password') }}
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Change password</h1>

                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection