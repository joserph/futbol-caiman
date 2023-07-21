@extends('layouts.admin.app')
@section('title') User List @stop
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
              <h4 class="me-2 mb-3 mb-md-0">User list</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @can('create-user')
                    <a class="btn btn-icon btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="New" href="{{ route('users.create') }}">
                        <i data-feather="plus-circle"></i>
                    </a>
                @endcan
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dot">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">User list</li>
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
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->email }}</td>
                                    <td class="text-center text-uppercase">
                                        @if (!empty($item->getRoleNames()))
                                            @foreach ($item->getRoleNames() as $rolName)
                                                <span class="badge text-bg-light">{{ $rolName }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @can('edit-user')
                                        <a href="{{ route('users.edit', $item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="btn btn-icon btn-outline-warning btn-xs">
                                            <i data-feather="edit"></i>
                                        </a>
                                        @endcan
                                        
                                        @can('delete-user')
                                        {!! Form::open(['route' => ['users.destroy', $item->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                                            {{ Form::button('<i data-feather="trash"></i> ' . '', ['type' => 'submit', 'data-bs-toggle' => 'tooltip', 'data-bs-placement' => 'top', 'title' => 'Delete', 'class' => 'btn btn-icon btn-outline-danger btn-xs', 'onclick' => 'return confirm("¿Seguro de eliminar el color?")']) }}
                                        {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection