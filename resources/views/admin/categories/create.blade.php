@extends('admin')

@section('breadcrumbs')
    <h1>
        Categories

        <i class="fa fa-angle-right"></i>

        <small>
            Create New Category
        </small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::route('admin.categories.index') }}">
                <i class="fa fa-folder"></i> Categories
            </a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i>

            Create New Category
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::open(['route' => 'admin.categories.store']) !!}
        @include('admin.categories.partials.form', ['submitButtonText' => 'Add Category'])
    {!! Form::close() !!}
@stop