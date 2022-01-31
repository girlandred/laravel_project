@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="content col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ __('main.problems_with_input') }}
                    {{-- <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul> --}}
                </div>
            @endif

            <div class="w-4/5 m-auto pt-20">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('main.title') }}</label>
                        <input type="text" name="title" id="title" value="{{ $post->title }}"
                            class="text-input form-control">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">{{ __('main.content') }}</label>
                        <textarea type="text" name="content" id="content"
                            class="text-input form-control">{{ $post->content }}</textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">{{ __('main.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
