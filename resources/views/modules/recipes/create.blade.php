@extends('layouts/app')

@section('title', 'Submitting new recipe')

@section('submenu')
    {{ Breadcrumbs::render('recipes.create') }}
@endsection

@section('content')
    <div class="row">
        <div class="card w-100">
            <div class="card-body">
                {!! Form::open([
'method' => 'POST',
'route' => ['recipes.store'],
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
                    <label for="name">Recipe name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Recipe name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Recipe description" rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" value="{{ old('image') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection