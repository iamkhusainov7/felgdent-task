@extends('layouts.auth')

@section('content')
<form class="form-404">
    <span class="login100-form-logo">
        <img alt="" src="{{ asset('assets/img/logo-2.png') }}">
    </span>
    <span class="form404-title p-b-34 p-t-27">
        Error 403
    </span>
    <p class="content-404">Oops, You do not have permition to this route/action.</p>
    <div class="container-login100-form-btn">
        <a href="/" class="login100-form-btn">
            Go to home page
        </a>
    </div>
</form>
@endsection