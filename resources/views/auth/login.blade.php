@extends('layouts.frontend.master',['title' => 'Login', 'description' => 'Login'])

@section('content')
<section class="bradcamp_section">
    <div style="background-image: url('frontend/img/banner.jpg')" class="bradcamp-image">
        <div class="pad">
          
        </div>
    </div>
</section>
    <section class="login_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="login_padding">
                                    <div class="row justify-content-center mb-3">
                                        {{-- <label for="email" class="col-md-4 col-form-label text-md-end email_text">{{ __('Email Address') }}</label> --}}
    
                                        <div class="col-md-8">
                                            <input id="email" type="email"
                                                class="login_input form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus placeholder="Enter Your Email*">
    
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="row justify-content-center mb-3">
                                        {{-- <label for="password" class="col-md-4 col-form-label text-md-end pass_text">{{ __('Password') }}</label> --}}
    
                                        <div class="col-md-8">
                                            <input id="password" type="password"
                                                class="login_input form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password*">
    
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="row justify-content-center mb-3">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input " type="checkbox" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }} style="background: red">
    
                                                <label class="form-check-label forget_pass_text" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>                                            
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            @if (Route::has('password.request'))
                                                <a class="forget_pass_text" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
    
                                    <div class="row justify-content-center mb-0">
                                        <div class="col-md-8">
                                            <button type="submit" class="form-control btn login_btn">
                                                {{ __('Login') }}
                                            </button>                                        
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
