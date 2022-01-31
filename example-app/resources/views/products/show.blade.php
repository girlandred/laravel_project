@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="content col-12">
            <div class="mb-3">
                <strong>{{ __('main.title') }}</strong>
                {{ $product ->title }}
            </div>
            <div class="mb-3">
                <strong>{{ __('main.vendor') }}</strong>
                {{ $product ->vendor }}
            </div>
            <div class="mb-3">
                <strong>{{ __('main.country') }}</strong>
                {{ $product ->country }}
            </div>
            <div class="mb-3">
                <strong>{{ __('main.quantity') }}</strong>
                {{ $product ->quantity }}
            </div>
        </div>

    </div>
@endsection
