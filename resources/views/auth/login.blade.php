@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
    @csrf
    <span class="login100-form-logo">
        <img alt="" src="{{ asset('assets/img/logo-2.png') }}">
    </span>
    <span class="login100-form-title p-b-34 p-t-27">
        Log in
    </span>
    <div class="wrap-input100 validate-input @error('password') alert-validate @enderror" data-validate="@error('password') {{$message}} @enderror">
        <input id="email" class="input100" value="{{ old('email') }}" required="required" required autocomplete="email" autofocus name="email" type="email" />
        <span class="focus-input100" data-placeholder="&#xf207;"></span>
        @error('email')
        <span class="d-block invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="wrap-input100 validate-input @error('password') alert-validate @enderror" data-validate="@error('password') {{$message}} @enderror">
        <input id="password" class="input100" type="password" name="password" required="required" autocomplete="current-password" />
        <span class="focus-input100" data-placeholder="&#xf191;"></span>
        @error('password')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="contact100-form-checkbox">
        <input class="input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="label-checkbox100" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            {{ __('Login') }}
        </button>
    </div>
</form>
@endsection