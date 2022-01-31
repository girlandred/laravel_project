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

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="content col-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('main.title') }}</label>
                                <input type="text" name="title" id="title" class="text-input form-control">
                            </div>
                            <div class="mb-3">
                                <label for="vendor" class="form-label">{{ __('main.vendor') }}</label>
                                <input type="text" name="vendor" id="vendor" class="text-input form-control">
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">{{ __('main.country') }}</label>
                                <input type="text" name="country" id="country" class="text-input form-control">
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">{{ __('main.quantity') }}</label>
                                <input type="text" name="quantity" id="quantity" class="text-input form-control">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">{{ __('main.submit') }}</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
