@extends('layouts/app')

@section('title', 'Creating new blog post')

@section('submenu')
    {{ Breadcrumbs::render('blog.create') }}
@endsection

@section('content')
    <div class="row">
        <div class="card w-100">
            <div class="card-body">
                {!! Form::open([
'method' => 'POST',
'route' => ['blog.store'],
'enctype' => 'multipart/form-data'
]) !!}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Post title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Blog title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea type="text" class="form-control" id="text" name="text" placeholder="Post content" rows="4">{{ old('text') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection