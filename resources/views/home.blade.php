@extends('layouts.app')

@section('content')
    <div class="row">
        <h1 class="primary">Hi {{ auth()->user()->name }}</h1>
    </div>
    <div class="row">
        <div class="card-group">
            <div class="card m-1">
                <div class="card-body">
                    <div class="card-title">Your recipes</div>
                </div>
            </div>
            <div class="card m-1">
                <div class="card-body">
                    <div class="card-title">Your dietary analytics</div>
                </div>
            </div>
            <div class="card m-1">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
