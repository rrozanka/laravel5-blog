@extends('admin')

@section('breadcrumbs')
    <h1>
        Tags

        <i class="fa fa-angle-right"></i>

        <small>
            Edit Tag: {{ $tag->name }}
        </small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::route('admin.tags.index') }}">
                <i class="fa fa-tags"></i> Tags
            </a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i>

            Edit Tag
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::model($tag, ['method' => 'PATCH', 'route' => ['admin.tags.update', $tag->id]]) !!}
        @include('admin.tags.partials.form', ['submitButtonText' => 'Edit Tag'])
    {!! Form::close() !!}
@stop