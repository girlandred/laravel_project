@extends('layouts.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="grid">

    @foreach ($posts as $post)
        <div class="container-fluid">
            <div class="content col-12">
                <div class="row justify-content-center">
                    <img src="{{ asset('images/' . $post->image_path) }}" alt="">
                    <h2 class="text-gray-700 font-bold text-5xl pb-4">
                        {{ $post->title }}
                    </h2>

                    <span class="text-gray-500">
                        {{ __('main.owner') }} <span
                            class="font-bold italic text-gray-800">{{ $post->user->name }}</span>{{ __('main.created_at') }}
                        {{ date('jS M Y', strtotime($post->updated_at)) }}
                    </span>
                    @if (isset(Auth::user()->id))
                    <a href="{{ route('posts.show', $post->id) }}"
                        class="text-gray-700 italic hover:text-gray-900">{{ __('main.show') }}</a>
                        @endif
                        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                        <span class="float-right">
                            <a href="{{ route('posts.edit', $post->id) }}"
                                class=" text-gray-700 italic hover:text-gray-900">
                                {{ __('main.edit') }}
                            </a>
                        </span>

                        <span class="float-right">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit">
                                        {{ __('main.delete') }}
                                    </button>
                                </div>
                            </form>
                        </span>
                    @endif
                </div>

                </div>
            </div>

    @endforeach
</div>


    {{ $posts->links() }}

@endsection
