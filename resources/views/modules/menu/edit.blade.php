@extends('layouts.app')

@section('title', 'Editing ' . $menu->name)

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('menus.edit', $menu) }}
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
                'method' => 'PATCH',
                'route' => ['menus.update', $menu],
                'enctype' => 'multipart/form-data'
                ]) !!}
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name of this menu</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" value="{{ $menu->name}}">
                                <div class="input-group-append">
                                    <button type="submit" class="mr-2 btn btn-primary">Change name</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        Elements in this menu
                        <div class="form-group">
                            <ul class="list-unstyled">
                                @foreach($menu->elements as $element)
                                    <li>
                                        @include('modules.menu.partials.detach')
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        Elements not in this menu
                        <div class="form-group">
                            <ul class="list-unstyled">
                                @foreach($attachables as $element)
                                    <li>
                                        @include('modules.menu.partials.attach')
                                    </li>
                                @endforeach
                            </ul>
                            {{ $attachables->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection