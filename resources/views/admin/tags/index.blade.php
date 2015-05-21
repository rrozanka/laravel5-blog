@extends('admin')

@section('breadcrumbs')
    <h1>
        Tags

        <i class="fa fa-angle-right"></i>

        <small>
            List
        </small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::route('admin.tags.index') }}">
                <i class="fa fa-tags"></i> Tags
            </a>
        </li>
        <li class="active">
            <i class="fa fa-list"></i>

            List
        </li>
    </ol>
@stop

@section('content')
    @if(Entrust::can(Helper::getActionByRoute('admin.tags.create')))
        <a class="btn btn-success margin-bottom-15" href="{{ URL::route('admin.tags.create') }}">
            <i class="fa fa-plus"></i> Add New Tag
        </a>
    @endif

    <table class="table table-bordered table-striped dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>
                        @if(Entrust::can(Helper::getActionByRoute('admin.tags.edit')))
                            <a class="btn btn-primary btn-xs" href="{{ URL::route('admin.tags.edit', $row->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        @endif

                        @if(Entrust::can(Helper::getActionByRoute('admin.tags.destroy')))
                            {!! Form::open(['class' => 'form-delete', 'method' => 'DELETE', 'route' => ['admin.tags.destroy', $row->id]]) !!}
                                <button class="btn btn-danger btn-xs" type="submit">
                                    <i class="fa fa-remove"></i>
                                </button>
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.table').dataTable({
                aoColumnDefs: [
                    { sWidth: '75px', aTargets: [0] },
                    { sWidth: '100px', bSortable: false, aTargets: [-1] }
                ]
            });
        });
    </script>
@stop