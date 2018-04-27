@extends('layouts/app')

@section('title', 'Change your comment')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('recipes.index') }}
    </div>
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            {!! Form::open([
                'method' => 'POST',
                'route' => ['comments.update'],
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
                <label for="text">Edit your comment. <b>Markdown</b> is supported.</label>
                <textarea type="text" class="form-control" id="text" name="text" placeholder="{{ $comment->text }}" rows="4">{{ $comment->text }}</textarea>
            </div>
            <input type="hidden" class="hidden" name="id" value="{{ $comment->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ $recipe->path() }}" class="btn btn-secondary">Cancel</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection