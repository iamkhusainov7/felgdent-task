@extends('layouts.app', ['title' => 'Dashboard'])

@section('breadcrumb')
<x-breadcrumb pagename="Dashboard">
    <x-slot name="content">
        <li class="list-inline-item"> Dashboard</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}">
@endsection

@section('main-content')

@section('scripts')
@parent
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        const table = $('table').DataTable();
    })
</script>
@endsection