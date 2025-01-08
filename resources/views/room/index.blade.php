@extends('layout.app')

@props(['rooms', 'noOfRoom'])

@section('title', 'Classroom List')

@section('content')
    <div class="table-responsive">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <h3>Total Rooms: {{ $noOfRoom }}</h3>
        
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
                <a class="btn btn-primary" href="{{ route('faculties.create') }}">Add New Room</a>
            </div>
        </div>
        <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr class="">
                        <td scope="row">{{ $room->id }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->capacity }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('rooms.edit', $room->id) }}">Edit</a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $rooms->links() }}
    </div>
@endsection
