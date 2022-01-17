@extends('layouts.layout')

@section('content')
    <div class="container">

        <div class="row">
            <div class="content col-12">

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

                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="text-input form-control">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea type="text" name="content" id="content" class="text-input form-control"></textarea>
                            </div>


                            <div class="bg-grey-lighter pt-15">
                                <label
                                    class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg tracking-wide uppercase border border-blue cursor-pointer">
                                    <span class="mt-2 text-base leading-normal">
                                        Select a file
                                    </span>
                                    <input type="file" name="image" class="hidden">
                                </label>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection
