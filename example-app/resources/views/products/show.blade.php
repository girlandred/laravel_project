@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="content col-12">
            <div class="mb-3">
                <strong>{{ __('Title:') }}</strong>
                {{ $product ->title }}
            </div>
            <div class="mb-3">
                <strong>{{ __('Vendor:') }}</strong>
                {{ $product ->vendor }}
            </div>
            <div class="mb-3">
                <strong>{{ __('Country:') }}</strong>
                {{ $product ->country }}
            </div>
            <div class="mb-3">
                <strong>{{ __('Quantity:') }}</strong>
                {{ $product ->quantity }}
            </div>
        </div>

    </div>
@endsection
