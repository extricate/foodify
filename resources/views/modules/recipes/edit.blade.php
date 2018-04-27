@extends('layouts/app')

@section('title', 'Editing ' . $recipe->name)

@php $foodplan = auth()->user()->food_plan(); @endphp

@section('submenu')
    {{ Breadcrumbs::render('recipes.edit', $recipe) }}
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
                {!! Form::open([
                'method' => 'PATCH',
                'route' => ['recipe.update', $recipe->id],
                'enctype' => 'multipart/form-data',
                'class' => 'form-inline'
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
                <div class="card-body form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" value="{{ old('image') }}">
                    <button type="submit" class="btn btn-primary">Change image</button>
                </div>
                {!! Form::close() !!}

                {!! Form::open([
                'method' => 'PATCH',
                'route' => ['recipe.update', $recipe->id],
                'enctype' => 'multipart/form-data',
                'class' => 'form-inline'
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

                <div class="card-body form-group">
                    <textarea type="text" rows="1" class="form-control card-title h1 primary"
                              name="name">{{ $recipe->name }}</textarea>
                    <input type="hidden" class="hidden" name="id" value="{{ $recipe->id }}">
                    <button type="submit" class="btn btn-primary">Change name</button>
                </div>
                {!! Form::close() !!}

                {!! Form::open([
                'method' => 'PATCH',
                'route' => ['recipe.update', $recipe->id],
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
            @if ($recipe->author()->id == auth()->user()->id || auth()->user()->isAdmin())
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <a class="btn btn-primary" href="{{ $recipe->path() }}">Exit edit mode</a>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        @foreach($recipe->tags as $tag)
                            <a href="/recipes/tags/{{ $tag->name }}"
                               class="badge badge-primary">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        Ingredients
                    </h2>
                    <ul>
                        @foreach ($recipe->ingredients() as $ingredient)
                            <li>{{ $ingredient->name }}, {{ $ingredient->quantity }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection