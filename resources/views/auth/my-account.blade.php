@extends('layouts.app', ['title' => 'My account'])

@section('meta-data')
@parent
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumb')
<x-breadcrumb pagename="My account">
    <x-slot name="content">
        <li class="active">My account</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('main-content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="card-head">
                <header>My account</header>
            </div>
            <div class="card-body">
                <form method="POST" id="form" action="{{ route('account.update') }}">
                    @include('includes.auth.account')
                    @method('PUT')
                    <div class="form-group p-t-20 text-center custom-mt-form-group">
                        <button class="btn btn-primary btn-block account-btn" type="submit">Edit</button>
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
<script src="{{ asset('assets/plugins/flatpicker/js/flatpicker.min.js') }}"></script>
<script src="{{ asset('assets/js/myaccount-page.js') }}"></script>
@endsection