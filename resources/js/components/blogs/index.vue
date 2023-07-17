<template>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    @can('create-blog')
                    <a class="btn btn-icon btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="New" href="{{ route('blogs.create') }}">
                        <i data-feather="plus-circle"></i>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover border-primary table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Content</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                    <div class="pagination">
                        {!! $blogs->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>