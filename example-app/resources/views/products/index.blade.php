@extends('layouts.layout')

@section('content')
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
                    <th>{{ __('main.title') }}</th>
                    <th>{{ __('main.vendor') }}</th>
                    <th>{{ __('main.country') }}</th>
                    <th>{{ __('main.quantity') }}</th>
                    <th width="280px">{{ __('main.action') }}</th>
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
                                        href="{{ route('products.show', $product->id) }}">{{ __('main.show') }}</a>
                                    <a class="btn btn-primary"
                                        href="{{ route('products.edit', $product->id) }}">{{ __('main.edit') }}</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">{{ __('main.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $products->links() }}

        </div>
    </div>
@endsection
