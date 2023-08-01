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
                    <a class="btn btn-icon btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip" data-bs-placement="top" title="New" href="#">
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
        <livewire:category-component />
    </div>

@endsection
