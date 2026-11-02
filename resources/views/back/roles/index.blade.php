@extends('back.master')
@section('title','Role Page')
@section('content')

    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">roles </span></h4>
        <div class="page-title-right">

            <a href="{{ route('back.roles.create') }}"
               class="btn btn-primary btn-sm">
                Create

            </a>

        </div>
    </div>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">roles</h5>
        <div class="table-responsive text-nowrap">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @forelse($roles as $role)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $loop->iteration }}</strong></td>
                        <td>{{$role->name}}</td>

                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">


                                    <a href="{{ route('back.roles.edit', $role->id) }}"
                                       class="dropdown-item">
                                        <i class="bx bx-edit-alt me-1"></i>
                                        Edit
                                    </a>

                                    <a class="dropdown-item" href="javascript:void(0);"
                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                    >
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            No roles found.
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $roles->links() }}
            </div>
        </div>
    </div>

@endsection
