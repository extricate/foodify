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
                    <div class="alert alert-danger">
                        <ul class="list-unstyled mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open([
                'method' => 'POST',
                'route' => ['page.store'],
                'enctype' => 'multipart/form-data',
                ]) !!}
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="" placeholder="Write the page name here">
                </div>

                <div class="form-group">
                        <textarea type="text" class="form-control mde-editor" id="text" name="text"
                                  placeholder="Write the page content here."
                                  rows="8" maxlength="400"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('home.admin') }}">Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
@endsection