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
                    <label for="name">Preparation time in minutes</label>
                    <div class="input-group">
                    <input type="number" class="form-control" id="preparation_time" name="preparation_time" placeholder="Eg. 45 (minutes)" value="{{ old('preparation_time') }}">
                        <div class="input-group-append">
                            <span class="input-group-text">minutes</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tags">
                        Tags
                    </label>
                    <div class="input-group">
                        <tags-input element-id="tags"
                                    v-model="availableTags">
                        </tags-input>
                    </div>
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