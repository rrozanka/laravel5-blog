@extends('admin')

@section('breadcrumbs')
    <h1>
        Role Permissions

        <i class="fa fa-angle-right"></i>

        <small>
            Role Permission: {{ $role->name }}
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
        <li>
            <a href="{{ URL::route('admin.roles.edit', $role->id) }}">
                <i class="fa fa-edit"></i> Edit Role
            </a>
        </li>
        <li class="active">
            <i class="fa fa-list"></i> Role Permissions
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::open(['route' => ['admin.roles.permissions.store', $role->id]]) !!}
        <div class="col-sm-12">
            <a class="btn btn-info btn-xs bulk-action-toggle" href="#" data-action="check">
                <i class="fa fa-check"></i> Check All
            </a>

            <a class="btn btn-danger btn-xs bulk-action-toggle" href="#" data-action="uncheck">
                <i class="fa fa-times"></i> Uncheck All
            </a>
        </div>

        @foreach($permissions as $permission)
            <div class="form-group col-sm-4">
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('permissions[]', $permission->id, ($role->perms()->find($permission->id)) ? true : null) !!}

                        {!! $permission->name !!}
                    </label>
                </div>
            </div>
        @endforeach

        <div class="form-group col-sm-12">
            {!! Form::submit('Save Role Permissions', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@stop