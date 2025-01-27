@extends('layout.app')

@props(['faculties', 'noOfFaculty'])

@section('title', 'Faculty List')

@section('content')
    <div class="table-responsive">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <h3>Total Faculties: {{ $noOfFaculty }}</h3>

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
                <a class="btn btn-primary" href="{{ route('faculties.create') }}">Add New Faculty</a>
            </div>
        </div>
        <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    {{-- <th scope="col">Gender</th> --}}
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Role</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faculties as $faculty)
                    <tr class="">
                        <td scope="row">{{ $faculty->id }}</td>
                        <td>{{ $faculty->name }}</td>
                        {{-- <td>{{ $faculty->gender }}</td> --}}
                        <td>{{ $faculty->email }}</td>
                        <td>{{ $faculty->phone_number }}</td>
                        <td>{{ $faculty->role->title }}</td>
                        <td>{{ $faculty->department->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('faculties.edit', $faculty->id) }}">Edit</a>
                            <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $faculties->links() }}
    </div>
@endsection
