@extends('admin')

@section('breadcrumbs')
    <h1>
        Tags

        <i class="fa fa-angle-right"></i>

        <small>
            Create New Tag
        </small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::route('admin.tags.index') }}">
                <i class="fa fa-tags"></i> Tags
            </a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i>

            Create New Tag
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::open(['route' => 'admin.tags.store']) !!}
        @include('admin.tags.partials.form', ['submitButtonText' => 'Add Tag'])
    {!! Form::close() !!}
@stop