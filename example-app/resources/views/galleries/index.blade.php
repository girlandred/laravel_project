@extends('layouts.layout')

@section('content')
    <div class="modal fade" id="demo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('main.add')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" id="img_upload" enctype="multipart/form-data">

                    <div class="modal-body">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">@lang('main.title')</label>
                            <input type="text" name="title" id="title" class="text-input form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>@lang('main.select')</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('main.close')</button>
                        <button type="submit" id="submit" class="btn btn-primary">@lang('main.save')</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            {{ __('main.problems_with_input') }}
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

                                <button data-bs-toggle="modal" class="btn btn-primary"
                                    data-bs-target="#demo">@lang('main.add')</button>
                            </div>
                        </div>
                    </div>
                    <ul class="grid">



                    </ul>


                </div>
            </div>
        </div>
    @endsection
