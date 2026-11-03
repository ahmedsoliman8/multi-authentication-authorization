@extends('back.master')
@section('title','User Page')
@section('content')

    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users </span></h4>
        @if(permission(['add_user']))
            <div class="page-title-right">

                <a href="{{ route('back.users.create') }}"
                   class="btn btn-primary btn-sm">
                    Create

                </a>

            </div>
        @endif
    </div>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Users</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @forelse($users as $user)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $loop->iteration }}</strong></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>

                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-vertical-center"></i>
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    @if(permission(['edit_user']))
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                    @endif
                                    @if(permission(['delete_user']))
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        ><i class="bx bx-trash me-1"></i> Delete</a
                                        >
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            No users found.
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>

@endsection
