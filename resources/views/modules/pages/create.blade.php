@extends('layouts.app')

@section('title', 'Create new page')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('page.create') }}
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
                {!! Form::open([
                'method' => 'POST',
                'route' => ['page.create'],
                'enctype' => 'multipart/form-data',
                ]) !!}
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" value="" placeholder="Write the page name here">
                        <div class="input-group-append">
                            <button type="submit" class="mr-2 btn btn-primary">Change name</button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <textarea type="text" class="form-control" id="text" name="text"
                                  placeholder="Write the page content here."
                                  rows="8" maxlength="400"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('home.admin') }}">Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
@endsection