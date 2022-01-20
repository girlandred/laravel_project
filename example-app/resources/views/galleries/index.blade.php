@extends('layouts.layout')

@section('content')

    <div class="modal fade" id="demo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" id="img_upload" enctype="multipart/form-data">

                    <div class="modal-body">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="text-input form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label> Select a file</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="content col-12">
                    @if ($message = Session::get('success'))
                        <div id="alert" class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <button data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#demo"> Add
                                    Image</button>
                            </div>
                        </div>
                    </div>
                    <ul class="grid">
                        @foreach ($galleries as $gallery)
                            <li>

                                <figure class="grid__figure">
                                    <a href="{{ asset('image/' . $gallery->image_path) }}" class="fancybox"
                                        data-title="{{ $gallery->title }}" data-id="{{ $gallery->id }}"
                                        data-fancybox="all">
                                        <img src="{{ asset('images/' . $gallery->image_path) }}" height="100%"
                                            width="100%" alt="">
                                        <h2 class="text-gray-700 font-bold text-5xl pb-4">
                                            {{ $gallery->title }}
                                        </h2>
                                    </a>


                                </figure>
                            </li>

                        @endforeach


                    </ul>


                </div>
            </div>
        </div>

        {{ $galleries->links() }}

    @endsection
