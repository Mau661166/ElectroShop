@extends('layouts.app')

@section('content')
<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div> <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                        <div class="login-form">
                            <form action="{{ route('login') }}" method="post">
                @csrf
                                <div class="form-group">
                                    <label>{{ __('E-Mail Address') }}</label>
                                    <input class="au-input au-input--full  @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" name="email" placeholder="Email">
@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                
</div>
                               

                 <div class="form-group">
                                    <label>{{ __('Password') }}</label>
                                    <input class="au-input au-input--full @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                                
@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
</div>
                                <div class="login-checkbox">
                                    <label>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" value=" {{ old('remember') ? 'checked' : '' }}"> {{ __('Remember Me') }}
                                    </label>
                                    
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">{{ __('Login') }}</button>
@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
