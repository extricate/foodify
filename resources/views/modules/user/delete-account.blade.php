@extends('layouts.app')

@section('title', 'Delete your account')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('settings.delete-account') }}
    </div>
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col-12">
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <h1 class="card-title">Delete your account</h1>
                    <div class="card-text">
                        Dear {{ auth()->user()->name }}, we're sad to see you go but respect your choice. One last
                        confirmation to make sure it's really you that wants to delete this account. Please enter your
                        current password to confirm you want us to delete your account.</a>
                    </div>
                    <div class="row justify-content-around">
                        <div class="col-lg-8">
                            <div class="card m-md-3">
                                <div class="card-body">
                                    {!! Form::open([
                                        'method' => 'POST',
                                        'route' => ['settings.delete-user.confirm'],
                                        'enctype' => 'multipart/form-data'
                                    ]) !!}
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                        <label for="current-password" class="control-label">Your password</label>
                                        <input id="current-password" type="password"
                                               class="form-control {{ $errors->has('current-password') ? ' is-invalid' : '' }}"
                                               name="current-password" required>

                                        @if ($errors->has('current-password'))
                                            <span class="help-block invalid-feedback">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="current-password-confirm" class="control-label">Confirm your
                                            password</label>
                                        <input id="current-password-confirm" type="password" class="form-control"
                                               name="current-password_confirmation" required>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-danger">
                                            Permanently delete my account
                                            <i class="fal fa-arrow-right"></i>
                                        </button>

                                        <a href="{{ route('settings.index') }}" class="btn btn-primary m-2">Cancel <i
                                                    class="fal fa-times"></i></a>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection