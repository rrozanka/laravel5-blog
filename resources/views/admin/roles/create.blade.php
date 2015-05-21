@extends('admin')

@section('breadcrumbs')
    <h1>
        Roles

        <i class="fa fa-angle-right"></i>

        <small>
            Create New Role
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
            <i class="fa fa-plus"></i>

            Create New Role
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::open(['route' => 'admin.roles.store']) !!}
        @include('admin.roles.partials.form', ['submitButtonText' => 'Add Role'])
    {!! Form::close() !!}
@stop