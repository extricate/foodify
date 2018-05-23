@extends('layouts/app')

@section('title', 'Editing ' . $recipe->name)

@section('submenu')
    {{ Breadcrumbs::render('recipes.edit', $recipe) }}
@endsection

@section('submenu-buttons')
    <div class="d-none d-sm-inline-block">
        <a class="btn btn-primary" href="{{ $recipe->path() }}">
            Exit edit mode <i class="fal fa-sign-out"></i>
        </a>
    </div>
    <div class="d-none d-sm-inline-block">
        @if($recipe->deleted)
            <div class="d-none d-sm-inline-block">
                <a class="btn btn-success" href="{{ route('recipes.restore', $recipe) }}">
                    Restore recipe
                    <i class="fal fa-check"></i>
                </a>
            </div>
        @else
            <div class="d-none d-sm-inline-block">
                <a class="btn btn-danger" href="{{ route('recipes.soft-delete', $recipe) }}">
                    Delete recipe
                    <i class="fal fa-trash"></i>
                </a>
            </div>
        @endif
    </div>
@endsection

@section('submenu-buttons-mobile')
    <div class="collapse pull-right" id="submenu-buttons">
        <div class="card submenu-collapsible">
            <div class="card-body">
                <a class="btn btn-primary" href="{{ $recipe->path() }}">
                    Exit edit mode <i class="fal fa-sign-out"></i>
                </a>
                @if($recipe->deleted)
                    <a class="btn btn-success" href="{{ route('recipes.restore', $recipe) }}">
                        Restore recipe
                        <i class="fal fa-check"></i>
                    </a>
                @else
                    <a class="btn btn-danger" href="{{ route('recipes.soft-delete', $recipe) }}">
                        Delete recipe <i class="fal fa-trash"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-img-container">
                    <img class="card-img-top" src="{{ $recipe->getFirstMedia()->getUrl() }}" alt="{{ $recipe->name }}">
                </div>
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
                'method' => 'PATCH',
                'route' => ['recipe.update', $recipe->id],
                'enctype' => 'multipart/form-data',
                'class' => 'form-inline d-inline'
                ]) !!}
                {{ csrf_field() }}
                <div class="card-body form-group">
                    <label for="image">Image </label>
                    <input type="file" name="image" id="image" value="{{ old('image') }} ">
                    <button type="submit" class="btn btn-primary">Change image</button>
                </div>
                {!! Form::close() !!}

                {!! Form::open([
                'method' => 'PATCH',
                'route' => ['recipe.update', $recipe->id],
                'enctype' => 'multipart/form-data',
                'class' => 'form-inline'
                ]) !!}
                {{ csrf_field() }}
                <div class="card-body form-group w-100">
                    <input type="hidden" class="hidden" name="id" value="{{ $recipe->id }}">
                    <div class="input-group w-100">
                        <input type="text" class="form-control" name="name" value="{{ $recipe->name}}">
                        <div class="input-group-append">
                            <button type="submit" class="mr-2 btn btn-primary">Change name</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

                {!! Form::open([
                'method' => 'PATCH',
                'route' => ['recipe.update', $recipe->id],
                'enctype' => 'multipart/form-data'
                ]) !!}
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <textarea type="text" class="form-control" id="description" name="description"
                                  placeholder="{{ $recipe->description }}"
                                  rows="7">{{ $recipe->description }}</textarea>
                    </div>
                    <input type="hidden" class="hidden" name="id" value="{{ $recipe->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ $recipe->path() }}" class="btn btn-secondary">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        Details
                    </h2>
                    <div class="card-text">
                        {!! Form::open([
                'method' => 'PATCH',
                'route' => ['recipe.update', $recipe->id],
                'enctype' => 'multipart/form-data'
                ]) !!}
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="preparation_time">Preparation time</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="preparation_time"
                                           name="preparation_time"
                                           placeholder="{{ $recipe->preparation_time }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="mr-2 btn btn-primary">Change time</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="hidden" name="id" value="{{ $recipe->id }}">
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="card-text">
                        <h3>Edit tags</h3>

                        @foreach($recipe->tags as $tag)
                            <a href="/recipes/tags/{{ $tag->name }}"
                               class="badge badge-primary">{{ $tag->name }}</a>
                        @endforeach
                        {!! Form::open([
                'method' => 'PUT',
                'route' => ['recipe.update', $recipe->id],
                'enctype' => 'multipart/form-data'
                ]) !!}
                        <div class="form-group">
                            <tags-input v-model="availableTags"
                                        element-id="tags"
                                        :typeahead="true">
                            </tags-input>
                            <button type="submit" class="btn btn-primary mt-2">Change tags</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h2 class="card-title">Ingredients</h2>
                    <div class="card-text">
                        <ul>
                            @foreach ($recipe->ingredients as $ingredient)
                                <li>
                                    {{ $ingredient->name }}, {{ $ingredient->quantity }}
                                    <a href="/ingredient/{{ $ingredient->id }}/destroy" class="text-danger pull-right"
                                       title="Remove {{ $ingredient->name }}">
                                        <i class="fal fa-trash"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        {!! Form::open([
                        'method' => 'PUT',
                        'route' => ['recipe.update', $recipe->id],
                        'enctype' => 'multipart/form-data'
                        ]) !!}
                        <ingredients-component></ingredients-component>
                        <button type="submit" class="btn btn-primary mt-2">Change ingredients</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection