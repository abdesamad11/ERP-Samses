@extends('layouts.style')

@section('content')
<div class="col-md-6 text-center" style="background-size: cover;background-image: url(../../dist-assets/images/photo-long-3.jpg)">
    <div class="pl-3 auth-right">
        <div class="auth-logo text-center mt-4"><img src="../../dist-assets/images/logo.png" alt=""></div>
        <div class="flex-grow-1"></div>
        <div class="w-100 mb-4"><a class="btn btn-outline-primary btn-block btn-icon-text btn-rounded" href="signin.html"><i class="i-Mail-with-At-Sign"></i> Sign in with Email</a><a class="btn btn-outline-google btn-block btn-icon-text btn-rounded"><i class="i-Google-Plus"></i> Sign in with Google</a><a class="btn btn-outline-facebook btn-block btn-icon-text btn-rounded"><i class="i-Facebook-2"></i> Sign in with Facebook</a></div>
        <div class="flex-grow-1"></div>
    </div>
</div>
<div class="col-md-6">
    <div class="p-4">
        <h1 class="mb-3 text-18">{{ __('Register') }}</h1>
        <form action="{{ route('register') }}" method="POST">
                @csrf
            <div class="form-group">
                <label for="username">{{ __('Name') }}</label>
               <input id="username" type="text" class="form-control   form-control-rounded  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >

            @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
             @enderror

            </div>
            <div class="form-group">
                <label for="email">
                    {{ __('E-Mail Address') }}
                </label>
                <input id="email" type="email"   class="form-control    form-control-rounded           @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"         >

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="password">
                    {{ __('Password') }}
                </label>
                <input
                id="password" type="password"
                class="form-control form-control-rounded      @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"

                >
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="repassword">
                    {{ __('Confirm Password') }}
                </label>
                <input  id="repassword" type="password"
                class="form-control form-control-rounded" name="password_confirmation" required autocomplete="new-password" >

            </div>
            <button class="btn btn-primary btn-block btn-rounded mt-3"> {{ __('Register') }}</button>
        </form>
    </div>
</div>






@endsection
