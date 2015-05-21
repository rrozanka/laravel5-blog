@extends('admin')

@section('breadcrumbs')
    <h1>
        Roles

        <i class="fa fa-angle-right"></i>

        <small>
            Edit Role: {{ $role->name }}
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
            <i class="fa fa-edit"></i>

            Edit Role
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['admin.roles.update', $role->id]]) !!}
        @include('admin.roles.partials.form', ['submitButtonText' => 'Edit Role'])
    {!! Form::close() !!}
@stop