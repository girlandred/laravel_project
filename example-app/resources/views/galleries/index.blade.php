@extends('layouts.layout')

@section('content')

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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">



                                <button data-bs-toggle="collapse" class="btn btn-primary" data-bs-target="#demo"> Add
                                    Image</button>

                                <div id="demo" class="collapse">
                                    <form action="{{ route('galleries.store') }}" method="POST" id="img_upload"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" name="title" id="title" class="text-input form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="bg-grey-lighter pt-15">
                                                <label
                                                    class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg tracking-wide uppercase border border-blue cursor-pointer">
                                                    <span class="mt-2 text-base leading-normal">
                                                        Select a file
                                                    </span>
                                                    <input type="file" name="image" class="hidden">
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>


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
                                        <img src="{{ asset('images/' . $gallery->image_path) }}" height="100%" width="100%" alt="">
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
