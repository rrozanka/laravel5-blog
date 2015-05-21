@extends('admin')

@section('breadcrumbs')
    <h1>
        Users

        <i class="fa fa-angle-right"></i>

        <small>
            Create New User
        </small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::route('admin.users.index') }}">
                <i class="fa fa-users"></i> Users
            </a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i>

            Create New User
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::open(['route' => 'admin.users.store']) !!}
        @include('admin.users.partials.form', ['submitButtonText' => 'Add User'])
    {!! Form::close() !!}
@stop