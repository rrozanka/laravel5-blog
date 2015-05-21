@extends('admin')

@section('breadcrumbs')
    <h1>
        Articles

        <i class="fa fa-angle-right"></i>

        <small>
            Create New Article
        </small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::route('admin.articles.index') }}">
                <i class="fa fa-newspaper-o"></i> Articles
            </a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i>

            Create New Article
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::open(['route' => 'admin.articles.store']) !!}
        @include('admin.articles.partials.form', ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}
@stop