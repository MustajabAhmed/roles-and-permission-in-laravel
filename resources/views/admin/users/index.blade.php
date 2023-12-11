@extends('admin.layouts.master')

@section('title', __('Users'))

@section('css')
@include('admin.layouts.datatables-css')
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1', __('Customer Management'))
@slot('title', __('Users'))
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ __('User List') }}</h5>
            </div>
            <div class="card-body">
                <table id="users-table" class="display table table-bordered dt-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{__('#ID')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Created at')}}</th>
                            <th>{{__('Role')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
@include('admin.layouts.datatables-js')
<script type="text/javascript">
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{!! route('admin.users.datatable') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'role', name: 'role', searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        order: [[0, 'asc']],
        columnDefs: [ 
            { targets:['_all'], className: "desktop" },
            { targets:[0,1,2,3,5], className: "tablet" },
            { targets:[0,3,5], className: "mobile" }
        ]
    });
</script>
@endsection
