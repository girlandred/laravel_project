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
                    <div class="card">
                        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
                            <div class="crop">
                                <img src="{{ asset('images/' . $post->image_path) }}" alt="">
                            </div>
                            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                                {{ $post->title }}
                            </h2>

                            <span class="text-gray-500">
                                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on
                                {{ date('jS M Y', strtotime($post->updated_at)) }}
                            </span>

                            <a href="{{ route('posts.show', $post->id) }}"
                                class="text-gray-700 italic hover:text-gray-900">Show </a>

                            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                                <span class="float-right">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class=" text-gray-700 italic hover:text-gray-900">
                                        Edit
                                    </a>
                                </span>

                                <span class="float-right">
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                            <button class="btn btn-primary" type="submit">
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection
