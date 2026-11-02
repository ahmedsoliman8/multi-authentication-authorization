@extends('back.master')
@section('title','Admin Page Create')
@section('content')

    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Create Admin </span></h4>

    </div>



    <form action="{{ route('back.admins.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="form-control">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   class="form-control">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password"
                   name="password"
                   class="form-control">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">
                Confirm Password
            </label>

            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Confirm Password"
            >

            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Role</label>

            <select name="role" class="form-control">
                <option value="">Select Role</option>

                @foreach($roles as $role)
                    <option value="{{ $role->name }}"
                        @selected(old('role') == $role->name)>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>

            @error('role')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">
            Create Admin
        </button>
    </form>

@endsection
