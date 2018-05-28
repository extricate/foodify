@extends('layouts.app')

@section('title', 'Register')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('user.register') }}
    </div>
@endsection



@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 mt-lg-5 mb-lg-5">
            <div class="card-group">
                <div class="card card-register p-3 mt-3">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name"
                                       class="form-label small font-weight-bold">{{ __('Name') }}</label>

                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="email"
                                       class="form-label small font-weight-bold">{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

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
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm"
                                       class="form-label small font-weight-bold">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <strong class="small font-weight-bold">
                                        Already an account?
                                    </strong><br>
                                    <a class="btn-link font-weight-bold" href="{{ route('login') }}">
                                        {{ __('Login instead') }}
                                    </a>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-circle">
                                    <i class="fal fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card d-none d-lg-block mt-3" style="background-image: url('{{ $recipe->getFirstMedia()->getUrl() }}'); background-size: cover;
                             background-position: center;"></div>
            </div>
        </div>
    </div>
@endsection
