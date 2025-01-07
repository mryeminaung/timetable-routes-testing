@extends('layout.app')

@props(['faculties'])

@section('title', 'Faculty List')

@section('content')
    <div class="table-responsive my-5">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="">Faculty List</h3>
            <a class="btn btn-success" href="{{ route('faculties.export-excel') }}">Export Excel</a>
        </div>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
