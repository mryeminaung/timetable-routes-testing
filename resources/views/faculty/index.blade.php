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

        <div class="d-flex justify-content-between align-items-center">
            <h3 class="">Faculty List</h3>
            <div class="d-flex">
                <a class="btn btn-warning" href="{{ route('faculties.export-excel') }}">Export As Excel File</a>
                <form class="ms-3" action="{{ route('faculties.import-excel') }}" method="post">
                    @csrf
                    @method('post')
                    <button class="btn btn-success" type="submit">Import Data</button>
                </form>
            </div>
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
        {{ $faculties->links() }}
    </div>
@endsection
