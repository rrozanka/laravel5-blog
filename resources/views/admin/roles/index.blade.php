@extends('admin')

@section('breadcrumbs')
    <h1>
        Roles

        <i class="fa fa-angle-right"></i>

        <small>
            List
        </small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::route('admin.users.index') }}">
                <i class="fa fa-users"></i> Users
            </a>
        </li>
        <li>
            <a href="{{ URL::route('admin.roles.index') }}">
                <i class="fa fa-cogs"></i> Roles
            </a>
        </li>
        <li class="active">
            <i class="fa fa-list"></i>

            List
        </li>
    </ol>
@stop

@section('content')
    @if(Entrust::can(Helper::getActionByRoute('admin.roles.create')))
        <a class="btn btn-success margin-bottom-15" href="{{ URL::route('admin.roles.create') }}">
            <i class="fa fa-plus"></i> Add New Role
        </a>
    @endif

    <table class="table table-bordered table-striped dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Display Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->display_name }}</td>
                    <td>{{ $row->description }}</td>
                    <td>
                        @if(Entrust::can(Helper::getActionByRoute('admin.roles.edit')))
                            <a class="btn btn-primary btn-xs" href="{{ URL::route('admin.roles.edit', $row->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        @endif

                        @if(Entrust::can(Helper::getActionByRoute('admin.roles.permissions.index')))
                            <a class="btn btn-info btn-xs" href="{{ URL::route('admin.roles.permissions.index', $row->id) }}">
                                <i class="fa fa-list"></i>
                            </a>
                        @endif

                        @if(Entrust::can(Helper::getActionByRoute('admin.roles.destroy')))
                            {!! Form::open(['class' => 'form-delete', 'method' => 'DELETE', 'route' => ['admin.roles.destroy', $row->id]]) !!}
                                <button class="btn btn-danger btn-xs" type="submit">
                                    <i class="fa fa-remove"></i>
                                </button>
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.table').dataTable({
                aoColumnDefs: [
                    { sWidth: '75px', aTargets: [0] },
                    { sWidth: '100px', bSortable: false, aTargets: [-1] }
                ]
            });
        });
    </script>
@stop