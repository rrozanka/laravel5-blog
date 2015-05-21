@extends('admin')

@section('breadcrumbs')
    <h1>
        Categories

        <i class="fa fa-angle-right"></i>

        <small>
            Edit Category: {{ $category->name }}
        </small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::route('admin.categories.index') }}">
                <i class="fa fa-folder"></i> Categories
            </a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i>

            Edit Category
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::model($category, ['method' => 'PATCH', 'route' => ['admin.categories.update', $category->id]]) !!}
        @include('admin.categories.partials.form', ['submitButtonText' => 'Edit Category'])
    {!! Form::close() !!}
@stop