@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="content col-12">
            <div class="mb-3">
                <h1 class="text-6xl">
                    {{ $post->title }}
                </h1>
            </div>
            {{-- <div class="w-4/5 m-auto pt-20"> --}}
            <div class="mb-3">
                <span class="text-gray-500">
                    By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on
                    {{ date('jS M Y', strtotime($post->updated_at)) }}
                </span>
            </div>
            <div class="crop">
                <img src="{{ asset('images/' . $post->image_path) }}" alt="">
            </div>
            <div class="mb-3">
                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                    {{ $post->content }}
                </p>
            </div>
        </div>

    </div>
@endsection
