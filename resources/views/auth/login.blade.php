@extends('layouts')

@section('header')
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@endsection 

@section('content')
<div class="login-container">
    <div>
            <div class="login-form-container">
                <h1>{{ __('Login') }}</h1>

                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div class="login-email-form">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password">{{ __('Password') }}</label>

                            <div class="login-password-form">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class="login-check-remember">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="submit-container">
                                <button class="btn-login-submit" type="submit">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
