@extends('layouts.layout')

@section('content')

    <div class="container">

        <div class="row">
            <div class="content col-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @foreach ($posts as $post)
                    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
                        <div>
                            <img src="{{ asset('images/' . $post->image_path) }}" alt="">
                        </div>
                        <div>
                            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                                {{ $post->title }}
                            </h2>

                            <span class="text-gray-500">
                                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on
                                {{ date('jS M Y', strtotime($post->updated_at)) }}
                            </span>

                            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                                {{ $post->content }}
                            </p>

                            <a href="{{ route('posts.show', $post->id) }}"
                                class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                                Keep Reading
                            </a>

                            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                                <span class="float-right">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                                        Edit
                                    </a>
                                </span>

                                <span class="float-right">
                                    <form action="/posts" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-primary">
                                            Delete
                                        </button>
                                    </form>
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
