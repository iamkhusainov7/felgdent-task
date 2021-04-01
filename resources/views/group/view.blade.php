@extends('layouts.app', ['title' => 'Group users'])

@section('meta-data')
@parent
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/select2-material.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}">
@endsection

@section('breadcrumb')
<x-breadcrumb pagename="Groups">
    <x-slot name="content">
        <li class="list-inline-item"> <a href="{{route('group.index')}}">Groups</a>&nbsp;<i class="fa fa-angle-right"></i></li>
        <li class="active"> {{$group->name}}</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('main-content')
<div class="row">
    <div class="col-sm-12">
        <x-cart-box cartHeader="User list">
            <x-slot name="cartBody">
                <div class="row">
                    <div class="table-scrollable">
                        <x-table tableId="user-table">
                            <x-slot name="thead">
                                <th></th>
                                <th> Full name </th>
                                <th> Account type </th>
                                <th> Acoount email </th>
                            </x-slot>
                            <x-slot name="tbody">
                                @foreach($group->users as $user)
                                <tr class="odd gradeX">
                                    <td class="patient-img">
                                        <img src="{{asset("assets/img/user1.png")}}" alt="">
                                    </td>
                                    <td>{{$user->firstname}} {{$user->surname}}</td>
                                    <td class="left">{{$user->role}}</td>
                                    <td class="left">{{$user->email}}</td>
                                </tr>
                                @endforeach
                            </x-slot>
                        </x-table>
                    </div>
            </x-slot>
        </x-cart-box>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
@endsection