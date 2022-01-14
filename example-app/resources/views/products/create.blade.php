@extends('products.layout')

@section('content')
    <div class="container">

        <div class="row">
            <div class="content col-12">
                {{-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div> --}}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="content col-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="text-input form-control">
                            </div>
                            <div class="mb-3">
                                <label for="vendor" class="form-label">Vendor</label>
                                <input type="text" name="vendor" id="vendor" class="text-input form-control">
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" name="country" id="country" class="text-input form-control">
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="text-input form-control">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
