@extends('layouts.app', ['title' => 'User registration'])

@section('meta-data')
@parent
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/select2-material.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/flatpicker/css/flatpickr.min.css')}}">
@endsection

@section('breadcrumb')
<x-breadcrumb pagename="Users">
    <x-slot name="content">
        <li class="list-inline-item"><a href="{{route('user.index')}}">Users</a>&nbsp;<i class="fa fa-angle-right"></i></li>
        <li class="list-inline-item">Update user</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('main-content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="card-head">
                <header>Update user</header>
            </div>
            <div class="card-body">
                <form method="POST" id="form" action="{{ route('user.update', $user->id) }}">
                    @include('includes.auth.register')
                    @method('PUT')
                    <div class="col-lg-6 p-t-20">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input id="admin-password" type="password" name="admin-password" class="mdl-textfield__input" data-rule-required="true">
                            <label for="admin-password" class="mdl-textfield__label">Type your password<span class="d-none text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="form-group p-t-20 text-center custom-mt-form-group">
                        <button class="btn btn-primary btn-block account-btn" type="submit">{{ __('Register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.js') }}"></script>
<script src="{{ asset('assets/plugins/flatpicker/js/flatpicker.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts/material-select-list.js') }}"></script>
<script src="{{ asset('assets/js/register-page.js') }}"></script>
@endsection