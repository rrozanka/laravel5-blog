@extends('admin')

@section('breadcrumbs')
    <h1>
        Articles

        <i class="fa fa-angle-right"></i>

        <small>
            Edit Article: {{ $article->title }}
        </small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::route('admin.articles.index') }}">
                <i class="fa fa-newspaper-o"></i> Articles
            </a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i>

            Edit Article
        </li>
    </ol>
@stop

@section('content')
    @include('errors.list')

    {!! Form::model($article, ['method' => 'PATCH', 'route' => ['admin.articles.update', $article->id]]) !!}
        @include('admin.articles.partials.form', ['submitButtonText' => 'Edit Article'])
    {!! Form::close() !!}
@stop