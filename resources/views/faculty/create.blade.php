@props(['roles', 'departments'])

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

    <form action="{{ route('faculties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" class="form-control" name="name" id="name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="name@miit.edu.com">
        </div>

        <div class="mb-3 d-none">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="password"
                placeholder="***********">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="phone" class="form-control" name="phone_number" id="phone" placeholder="09-123456789">
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-select" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="profilePic" class="form-label">
                Profile Image
            </label>
            <input class="form-control" name="profilePic" type="file" id="profilePic">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role_id" class="form-select" id="role">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <select name="department_id" class="form-select" id="department">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
