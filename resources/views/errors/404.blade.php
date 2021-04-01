@extends('layouts.auth')

@section('content')
<form class="form-404">
    <span class="login100-form-logo">
        <img alt="" src="{{ asset('assets/img/logo-2.png') }}">
    </span>
    <span class="form404-title p-b-34 p-t-27">
        Error 404
    </span>
    <p class="content-404">The page you are looking for does't exist or an other error occurred.</p>
    <div class="container-login100-form-btn">
        <a href="/" class="login100-form-btn">
            Go to home page
        </a>
    </div>
</form>
@endsection