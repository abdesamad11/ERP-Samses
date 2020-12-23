@extends('layouts.style')

@section('content')

<div class="col-md-6">
    <div class="p-4">
        <div class="auth-logo text-center mb-4">
        <img src="../../dist-assets/images/logo.png" alt=""></div>
        <h1 class="mb-3 text-18"> {{ __('Login') }}</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
     <label for="email">{{ __('E-Mail Address') }}</label>
     <input  id="email" type="email" class="form-control form-control-rounded  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
     @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input class="form-control form-control-rounded"   id="password" type="password" class="form-control  form-control-rounded   @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                 @enderror
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn btn-rounded btn-primary btn-block mt-2">
                {{ __('Login') }}
            </button>
        </form>
        @if (Route::has('password.request'))
        <div class="mt-3 text-center"><a class="text-muted" href="{{ route('password.request') }}">
            <u>
                {{ __('Forgot Your Password?') }}

            </u></a>

         </div>
        @endif

    </div>
</div>
<div class="col-md-6 text-center" style="background-size: cover;background-image: url(../../dist-assets/images/photo-long-3.jpg)">
    <div class="pr-3 auth-right">
      <a class="btn btn-rounded btn-outline-google btn-block btn-icon-text"><i class="i-Google-Plus"></i> Sign up with Google</a><a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook"><i class="i-Facebook-2"></i> Sign up with Facebook</a></div>
</div>


@endsection
