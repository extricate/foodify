@extends('layouts.app')

@section('title', 'Login')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('user.login') }}
    </div>
@endsection



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-lg-5 mb-lg-5">
                <div class="card-group">
                    <div class="card d-none d-lg-block mt-3" style="background-image: url('{{ $recipe->getFirstMedia()->getUrl() }}'); background-size: cover;
                            background-position: center;">
                    </div>
                    <div class="card card-login p-3 mt-3">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" class="p-lg-3">
                                @csrf
                                <div class="form-group">
                                    <label for="email"
                                           class="form-label small font-weight-bold">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required autofocus
                                           placeholder="E-mail">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password"
                                           class="form-label small font-weight-bold">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                           class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <a href="{{ route('password.request') }}" class="small font-weight-bold">Forgot your
                                        password?</a>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <hr>
                                    <div class="text-center">
                                        <strong class="small font-weight-bold">
                                            Not yet registered?
                                        </strong><br>
                                        <a class="btn-link font-weight-bold" href="{{ route('register') }}">
                                            {{ __('Register a free account!') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary btn-circle">
                                        <i class="fal fa-sign-in"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
