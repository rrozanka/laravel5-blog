@extends('admin')

@section('breadcrumbs')
    <h1>
        Users

        <i class="fa fa-angle-right"></i>

        <small>
            Edit User: {{ $user->name }}
        </small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::route('admin.users.index') }}">
                <i class="fa fa-users"></i> Users
            </a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i>

            Edit User
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['admin.users.update', $user->id]]) !!}
        @include('admin.users.partials.form', ['submitButtonText' => 'Edit User'])
    {!! Form::close() !!}
@stop