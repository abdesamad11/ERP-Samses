@extends('layouts.style')

@section('content')
<div class="col-md-6">
    <div class="p-4">
        <div class="auth-logo text-center mb-4"><img src="../../dist-assets/images/logo.png" alt=""></div>
        <h1 class="mb-3 text-18">
            {{ __('Reset Password') }}
        </h1>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">
                    {{ __('E-Mail Address') }}
                </label>
                <input id="email" type="email" class="form-control   form-control-rounded  @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <button class="btn btn-primary btn-block btn-rounded mt-3">
                {{ __('Reset Password') }}
            </button>
        </form>

    </div>
</div>
<div class="col-md-6 text-center" style="background-size: cover;background-image: url(../../dist-assets/images/photo-long-3.jpg)">
    <div class="pr-3 auth-right"><a class="btn btn-outline-primary btn-outline-email btn-block btn-icon-text btn-rounded" href="signup.html"><i class="i-Mail-with-At-Sign"></i> Sign up with Email</a><a class="btn btn-outline-primary btn-outline-google btn-block btn-icon-text btn-rounded"><i class="i-Google-Plus"></i> Sign in with Google</a><a class="btn btn-outline-primary btn-outline-facebook btn-block btn-icon-text btn-rounded"><i class="i-Facebook-2"></i> Sign in with Facebook</a></div>
</div>
@endsection
