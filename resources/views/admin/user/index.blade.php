@extends('layouts.app', ['title' => "Users"])

@section('meta-data')
@parent
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}">
@endsection

@section('breadcrumb')
<x-breadcrumb pagename="User">
    <x-slot name="content">
        <li class="list-inline-item">Users</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('main-content')
<div class="row">
    <div class="col-sm-12">
        <x-cart-box cartHeader="User list">
            <x-slot name="cartBody">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="btn-group">
                            <a href="{{route('register')}}" class="btn btn-info btn-rounded"><i class="fa fa-plus"></i>Add user</a>
                        </div>
                    </div>
                </div>
                <div class="table-scrollable">
                    <x-table tableId="user-table">
                        <x-slot name="thead">
                            <th></th>
                            <th> Full name </th>
                            <th> Account type </th>
                            <th> Acoount email </th>
                            <th>Created at</th>
                            <th> Is active </th>
                            <th> Action </th>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td class="patient-img">
                                    <img src="{{asset("assets/img/user1.png")}}" alt="">
                                </td>
                                <td>{{$user->firstname}} {{$user->surname}}</td>
                                <td class="left">{{$user->role}}</td>
                                <td class="left">{{$user->email}}</td>
                                <td>
                                    <a href="mailto:{{$user->email}}">
                                        {{$user->created_at}}
                                    </a>
                                </td>
                                <td>
                                    {{$user->is_active ? 'Yes' : 'No'}}
                                </td>
                                <td>
                                    <a href="{{route('user.update', $user->id)}}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <button data-url="{{route('user.destroy', $user->id)}}" data-target="#delete-item" class="btn delete btn-danger btn-xs">
                                        <i class="fa fa-trash-o "></i>
                                    </button>
                                </td>
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

@section('modal-windows')
<x-modal-dialog modalId="delete-item" modalTitle="Are you sure you want to delete user?">
    <x-slot name="modalBody">
        <x-delete-form formId="delete-user" />
    </x-slot>
</x-modal-dialog>
@endsection

@section('scripts')
@parent
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/user-page.js') }}"></script>
@endsection