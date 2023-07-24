@extends('layouts.admin.app')
@section('title') Post List @stop
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
            <h4 class="me-2 mb-3 mb-md-0">Post list</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @can('create-post')
                    <a class="btn btn-icon btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="New" href="{{ route('posts.create') }}">
                        <i data-feather="plus-circle"></i>
                    </a>
                @endcan
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dot">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="Post">User list</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive pt-3">
                        <table class="table table-hover border-light table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Extract</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Published Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                <tr>
                                    <td class="text-center">{{ Str::limit($item->title, 25) }}</td>
                                    <td class="text-center">{{ Str::limit($item->extract, 10) }}</td>
                                    <td class="text-center">
                                        @if ($item->active == 1)
                                            <span class="badge border border-primary text-primary">Publicado</span>
                                        @else
                                            <span class="badge border border-warning text-warning">Borrador</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->published_date }}</td>
                                    <td class="text-center">
                                        @can('show-post')
                                        <a href="{{ route('posts.show', $item) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Show" class="btn btn-icon btn-outline-primary btn-xs">
                                            <i data-feather="eye"></i>
                                        </a>
                                        @endcan
                                        @can('edit-post')
                                        <a href="{{ route('posts.edit', $item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="btn btn-icon btn-outline-warning btn-xs">
                                            <i data-feather="edit"></i>
                                        </a>
                                        @endcan

                                        @can('delete-post')
                                        {!! Form::open(['route' => ['posts.destroy', $item->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                                            {{ Form::button('<i data-feather="trash"></i> ' . '', ['type' => 'submit', 'data-bs-toggle' => 'tooltip', 'data-bs-placement' => 'top', 'title' => 'Delete', 'class' => 'btn btn-icon btn-outline-danger btn-xs', 'onclick' => 'return confirm("¿Seguro de eliminar el color?")']) }}
                                        {!! Form::close() !!}
                                        @endcan

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {!! $posts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
