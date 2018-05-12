@extends('layouts.app')

@section('title', 'Creating new menu')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('menus.create') }}
    </div>
@endsection

@section('content')
    <div class="page mh-100 h-100">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger m-3">
                        <ul class="list-unstyled mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                {!! Form::open([
                'method' => 'POST',
                'route' => ['menus.store'],
                'enctype' => 'multipart/form-data'
                ]) !!}
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name of this menu</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" placeholder="The menu identifier">
                                <div class="input-group-append">
                                    <button type="submit" class="mr-2 btn btn-primary">Create menu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection