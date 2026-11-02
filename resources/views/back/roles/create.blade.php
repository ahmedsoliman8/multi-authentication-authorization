@extends('back.master')
@section('title','Role Page')
@section('content')

    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Create Role </span></h4>

    </div>


    <form action="{{ route('back.roles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Role Name</label>

            <input type="text"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}"
                   placeholder="Enter role name">

            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <hr>

        <h5>Select Permissions</h5>

        <div class="row">
            <div class="form-check mb-3">
                <input type="checkbox"
                       class="form-check-input"
                       id="select-all">

                <label class="form-check-label fw-bold" for="select-all">
                    Select All Permissions
                </label>
            </div>
            @forelse($permissions as $permission)
                <div class="col-md-4 mb-2">
                    <div class="form-check">
                        <input
                            type="checkbox"
                            name="permissions[]"
                            value="{{ $permission->id }}"
                            class="form-check-input permission-checkbox"
                            id="permission_{{ $permission->id }}"
                            @checked(in_array(
                                $permission->id,
                                old('permissions', [])
                            ))
                        >

                        <label class="form-check-label"
                               for="permission_{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                </div>
            @empty
                <p>No permissions available.</p>
            @endforelse
        </div>

        @error('permissions')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary mt-3">
            Save Role
        </button>
    </form>

    <script>
        const selectAll = document.getElementById('select-all');

        const permissions = document.querySelectorAll(
            '.permission-checkbox'
        );

        selectAll.addEventListener('change', function () {
            permissions.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        permissions.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                selectAll.checked = [...permissions].every(
                    item => item.checked
                );
            });
        });
    </script>

@endsection
