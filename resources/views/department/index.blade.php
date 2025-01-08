@extends('layout.app')

@props(['departments', 'noOfDepartment'])

@section('title', 'Department List')

@section('content')
    <div class="table-responsive">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <h3>Total Departments: {{ $noOfDepartment }}</h3>

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-start align-items-center">
                <form class="border" action="{{ route('faculties.import-excel') }}" method="post" id="excel-import"
                    enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input type="file" class="form-control" name="myFile" id="myFile" />
                </form>
                <button form="excel-import" class="btn btn-success ms-3" type="submit">Import Data</button>
            </div>
            <div class="">
                <a class="btn btn-warning" href="{{ route('faculties.export-excel') }}">Export As Excel File</a>
                <a class="btn btn-primary" href="{{ route('faculties.create') }}">Add New Department</a>
            </div>
        </div>
        <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Department Code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr class="">
                        <td scope="row">{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->dept_code }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('departments.edit', $department->id) }}">Edit</a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $departments->links() }}
    </div>
@endsection
