@extends('layout.app')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
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
                <form action="{{ route('uploading') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="mb-3"> 
                        <label for="formFile" class="form-label">
                            <h3>Uploading File to S3 Bucket</h3>
                        </label>
                        <input class="form-control" name="myfile" type="file" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
@endsection
