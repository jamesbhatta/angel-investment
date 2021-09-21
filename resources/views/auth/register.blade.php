@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="text-center mb-3">
                <a href="/" class="navbrand">
                    <img src="https://zero-kamal.github.io/Angel/img/logo.png" style="max-height: 90px; filter: invert(1);" alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="card shadow-sm">
                <div class="card-body p-4 md:p-5">

                    <div class="mb-4">
                        <h4 class="h4-responsive text-center">Get Started Now</h4>
                        <p class="text-center px-5">It’s easy to create a pitch using our online form. Your pitch can be in front of our investors before you know it.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="radio-investor" value="investor" @if(request('role') == 'investor') checked @endif> 
                                        <label class="form-check-label" for="radio-investor">I'm an Investor</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="radio-entrepreneur" value="entrepreneur" @if(request('role') == 'entrepreneur') checked @endif>
                                        <label class="form-check-label" for="radio-entrepreneur">I'm an Entrepreneur</label>
                                    </div>
                                </div>
                            </div>
                            @error('type')
                            <small class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <select name="country_id" class="form-select py-3 @error('country_id') is-invalid @enderror">
                                <option value="">Select your country</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                                <option value="">Other</option>
                            </select>
                            @error('country_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="policy-checkbox">
                                <label class="form-check-label" for="policy-checkbox" style="font-size: .9rem;">
                                    I certify that I agree to the website's Privacy Policy, Terms and Conditions and Refund Policy; and I understand it is my responsibility to do due diligence on any investor I meet via this platform.
                                </label>
                            </div>
                        </div>

                        <div class="mb-3 mb-0">
                            <button type="submit" class="btn btn-primary py-3 w-100">
                                {{ __('Create New Account') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
