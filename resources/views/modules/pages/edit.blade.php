@extends('layouts.app')

@section('title', 'Editing ' . $page->name)

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('page.edit', $page) }}
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
                'method' => 'PATCH',
                'route' => ['page.update', $page->id],
                'enctype' => 'multipart/form-data',
                'class' => 'form-inline'
                ]) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" class="hidden" name="id" value="{{ $page->id }}">
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" value="{{ $page->name}}">
                        <div class="input-group-append">
                            <button type="submit" class="mr-2 btn btn-primary">Change name</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

                {!! Form::open([
                'method' => 'PATCH',
                'route' => ['page.update', $page->id],
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
                    <textarea type="text" class="form-control" id="text" name="text" placeholder="{{ $page->content }}" rows="4" maxlength="400">{{ $page->content }}</textarea>
                </div>
                <input type="hidden" class="hidden" name="id" value="{{ $page->id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection