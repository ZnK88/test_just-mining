@extends('layouts')

@section('header')
    <link rel="stylesheet" href="{{asset('assets/css/register.css')}}">
@endsection 
    
@section('content')

<div class="register-container">
    <div class="form-register-container">
        <div class="test">
            <h1>{{ __('Register') }}</h1>
            <div >
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <label for="name">{{ __('Name') }}</label>

                            <div class="name-container">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" >{{ __('E-Mail Address') }}</label>

                            <div class="email-container">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password">{{ __('Password') }}</label>

                            <div class="password-container">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <div class="password-container">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="submit-container">
                            <button class="btn-register-submit" type="submit">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>


@endsection

