@extends('layouts.app', ['title' => 'Groups'])

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
        <li class="active"> Groups</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('main-content')
<div class="row">
    <div class="col-sm-12">
        <x-cart-box cartHeader="Group list">
            <x-slot name="cartBody">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="btn-group">
                            <a class="btn btn-info btn-rounded" data-toggle="modal" data-target="#create-item"><i class="fa fa-plus"></i>Create group</a>

                        </div>
                    </div>
                </div>
                <div class="table-scrollable">
                    <x-table tableId="group-table">
                        <x-slot name="thead">
                            <th># </th>
                            <th>Name </th>
                            <th>Users quantity</th>
                            <th>Action</th>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach($groups as $group)
                            <tr data-item-id="{{$group->id}}">
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$group->name}}</td>
                                <td>{{$group->user_count}}</td>
                                <td>
                                    <div class="dropdown dropdown-action">
                                        <a href="{{route('group.show', $group->id)}}" class="btn btn-success btn-xs">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a data-group="{{$loop->index}}" data-target="edit-item" data-url="{{route('group.update', $group->id)}}" title="Edit" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button data-url="{{route('group.destroy', $group->id)}}" data-toggle="modal" data-target="delete-item" title="Delete" class="btn delete btn-danger btn-xs delete">
                                            <i class="fa fa-trash-o "></i>
                                        </button>
                                    </div>
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
<x-crud-modals createModalTitle="Create new group" editModalTitle="Edit group" deleteModalTitle="Delete group">
    <x-slot name="createModalBody">
        <form action="{{ route('group.store') }}" id="create-group">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input class="mdl-textfield__input" data-rule-required="true" data-rule-maxLength="255" id="group-name" name="group-name" type="text" />
                <label class="mdl-textfield__label" for="group-name" class="control-label">Group name <span class="text-danger">*</span></label><i class="bar"></i>
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary btn-lg">Create group</button>
            </div>
        </form>
    </x-slot>
    <x-slot name="editModalBody">
        <form id="edit-group">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                <input class="mdl-textfield__input" data-rule-required="true" data-rule-maxLength="255" id="edit-group-name" name="group-name" type="text" />
                <label class="mdl-textfield__label" for="group-name" class="control-label">Group name <span class="text-danger">*</span></label><i class="bar"></i>
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary btn-lg">Edit group</button>
            </div>
        </form>
    </x-slot>
    <x-slot name="deleteModalBody">
        <x-delete-form formId="delete-group" />
    </x-slot>
</x-crud-modals>
@endsection

@section('scripts')
@parent
<script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
<script>
    var items = @json($groups);

    var deleteUrl = "{{route('group.destroy', "id")}}";
    var updateUrl = "{{route('group.update', "id")}}";
</script>

<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/group-page.js') }}"></script>`
@endsection