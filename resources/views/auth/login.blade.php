@extends('layouts.auth')

@section('auth-page')
    <div class="col-md-6 mx-auto">
        <div class="auth-form-light text-left p-5">
            <div class="brand-logo">
                {{-- <img src="{{ asset('assets/images/logo.svg') }}"> --}}
                <h2>E-Handy Hires</h2>
            </div>

            <h6 class="font-weight-light">Sign in to continue.</h6>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="email" class="">{{ __('Email Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="">{{ __('Password') }}</label>


                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    {{-- <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
    
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group mb-0">
                        <div class="">
                            <button type="submit" class="btn btn-primary mb-3">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        @if (Route::has('password.request'))
                            <p class="text-center">
                                <a class="btn " href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </p>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
