@extends('layout.app')

@props(['faculties'])

@section('title', 'Faculty List')

@section('content')
    <div class="table-responsive my-5">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h3 class="">Faculty List</h3>

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
            <a class="btn btn-warning" href="{{ route('faculties.export-excel') }}">Export As Excel File</a>
        </div>
        <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Role</th>
                    <th scope="col">Department</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faculties as $faculty)
                    <tr class="">
                        <td scope="row">{{ $faculty->id }}</td>
                        <td>{{ $faculty->name }}</td>
                        <td>{{ $faculty->gender }}</td>
                        <td>{{ $faculty->email }}</td>
                        <td>{{ $faculty->phone_number }}</td>
                        <td>{{ $faculty->role->title }}</td>
                        <td>{{ $faculty->department->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $faculties->links() }}
    </div>
@endsection
