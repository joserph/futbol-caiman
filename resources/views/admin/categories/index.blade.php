@extends('layouts.admin.app')
@section('title') Category List @stop
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
              <h4 class="me-2 mb-3 mb-md-0">Category list</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @can('create-category')
                    <a class="btn btn-icon btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="New" href="{{ route('admin.categories.create') }}">
                        <i data-feather="plus-circle"></i>
                    </a>
                @endcan
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dot">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category list</li>
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
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                <tr>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->description }}</td>
                                    <td class="text-center text-uppercase">
                                        @if ($item->active == 1)
                                            <span class="badge border border-primary text-primary">Publicado</span>
                                        @else
                                            <span class="badge border border-warning text-warning">Borrador</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @can('edit-user')
                                        <a href="{{ route('admin.categories.edit', $item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="btn btn-icon btn-outline-warning btn-xs">
                                            <i data-feather="edit"></i>
                                        </a>
                                        @endcan

                                        @can('delete-user')
                                        {!! Form::open(['route' => ['admin.categories.destroy', $item->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                                            {{ Form::button('<i data-feather="trash"></i> ' . '', ['type' => 'submit', 'data-bs-toggle' => 'tooltip', 'data-bs-placement' => 'top', 'title' => 'Delete', 'class' => 'btn btn-icon btn-outline-danger btn-xs', 'onclick' => 'return confirm("¿Seguro de eliminar el color?")']) }}
                                        {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex">
                            {!! $categories->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
