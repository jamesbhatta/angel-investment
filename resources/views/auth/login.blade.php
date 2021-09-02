@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center mb-3">
                <a href="/" class="navbrand">
                    <img src="https://zero-kamal.github.io/Angel/img/logo.png" style="max-height: 90px; filter: invert(1);" alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="card shadow-sm">

                <div class="card-body p-4 md:p-5">

                    <div class="mb-4">
                        <h4 class="h4-responsive text-center">Login</h4>
                        <p class="text-center px-5">Log in now to get full access.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <input id="email" type="email" class="form-control p-3 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="password" type="password" class="form-control p-3 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="mb-3 mb-0">
                            <button type="submit" class="btn btn-primary w-100 py-3">
                                {{ __('Login') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3" style="font-size: .8rem;">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif

                @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    {{ __('Not registered yet? Click here to signup') }}
                </a>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
