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

                    <table class="table table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Vendor</th>
                            <th>Country</th>
                            <th>Quantity</th>
                            <th width="280px">Action</th>
                        </thead>
                        <tbody>

                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->vendor }}</td>
                                    <td>{{ $product->country }}</td>
                                    <td>{{ $product->quantity }}</td>

                                    <td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            <a class="btn btn-primary"
                                                href="{{ route('products.show', $product->id) }}">Show</a>
                                            <a class="btn btn-primary"
                                                href="{{ route('products.edit', $product->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $products->links() }}

                </div>
            </div>
        </div>
    @endsection