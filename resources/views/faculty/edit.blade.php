@props(['faculty', 'roles', 'departments'])

@extends('layout.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="mt-3">Edit Faculty</h2>
    <hr>
    <form action="{{ route('faculties.update', $faculty) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" name="name" value="{{ old('name') ?? $faculty->name }}"
                    id="name">
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" value="{{ old('email') ?? $faculty->email }}" name="email"
                    id="email" placeholder="name@miit.edu.com">
            </div>

            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="***********">
            </div>

            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" class="form-control" value="{{ old('phone') ?? $faculty->phone_number }}"
                    name="phone_number" id="phone" placeholder="09-123456789">
            </div>

            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select" id="gender">
                    <option {{ old('gender') == 'Male' ? 'selected' : '' }} value="Male">Male</option>
                    <option {{ old('gender') == 'Female' ? 'selected' : '' }} value="Female">Female</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="role" class="form-label">Role</label>
                <select name="role_id" class="form-select" id="role">
                    @foreach ($roles as $role)
                        <option {{ old('role_id', $faculty->role_id) == $role->id ? 'selected' : '' }}
                            value="{{ $role->id }}">
                            {{ $role->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label for="department" class="form-label">Department</label>
                <select name="department_id" class="form-select" id="department">
                    @foreach ($departments as $department)
                        <option {{ old('department_id', $faculty->department_id) == $department->id ? 'selected' : '' }}
                            value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <label for="profilePic" class="form-label">
                    Profile Image
                </label>
                <input class="form-control" name="profilePic" type="file" id="profilePic">
                @if ($faculty->image)
                    <img class="img-thumbnail rounded w-25" src="{{ $faculty->image->url }}" alt="{{ $faculty->name }}"
                        class="img-thumbnail">
                @endif
            </div>

        </div>
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('faculties.index') }}" class="btn btn-primary">Cancel</a>
            <button type="submit" class="ms-3 btn btn-primary">Update</button>
        </div>
    </form>
@endsection
