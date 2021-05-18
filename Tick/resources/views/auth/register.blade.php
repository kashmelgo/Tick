@extends('layouts.app2')

@section('header')
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto pt-1"><a href="/">Tick</a></h1>

    </div>
  </header>
@endsection

@section('signup-page')
    <div id="signup-page" class="container" >
        <div class="row">
            <div class="col-4 my-auto" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{asset('images/step1.png')}}" alt="" class="w-100 img-fluid animated">
            </div>
            <div class="col-8 my-auto"  data-aos="fade-up" data-aos-delay="200">
                <div class="card signup-credentials">
                    <div class="card-header">{{ __('Create Account : User Credentials') }}</div>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card-body">
                            <div class="signup-credentials-form">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="e.g. Username123" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="example@gmail.com" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-footer">
                                <div class="footer-buttons">
                                    <a href="{{route('login')}}" class="btn signup-credentials-instead-btn">Login Instead</a>
                                    <button type="submit" class="btn signup-credentials-confirm-btn">{{ __('Proceed') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
