@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="content col-12">
        <div class="row justify-content-center">
            <div class="mb-3">
                <h1 class="text-6xl">
                    {{ $post->title }}
                </h1>
            </div>
            <div class="mb-3">
                <span class="text-gray-500">
                    {{ __('main.owner') }} <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>{{ __('main.created_at') }}
                    {{ date('jS M Y', strtotime($post->updated_at)) }}
                </span>
            </div>
                <img src="{{ asset('image/' . $post->image_path) }}" alt="">
            <div class="mb-3">
                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                    {{ $post->content }}
                </p>
            </div>
        </div>

    </div>
@endsection
