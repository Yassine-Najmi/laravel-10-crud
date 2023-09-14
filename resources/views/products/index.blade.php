{{-- @extends('layouts.app')
@section('content')
    <div class="col-12 mb-3">
        <h1>Laravel 10 CRUD with Image Upload Example from scratch</h1>
    </div>
    <div class="col-4 mb-3 ">
        <div class="d-grid gap-2 ">
            <a name="" id="" class="btn btn-success" href="{{ route('product.create') }}" role="button">Create
                New
                Product</a>
        </div>
    </div>
    <div class="col-12">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $index++ }}</th>
                        <td><img src="{{ $product->image }}" alt="" srcset="" width="70px"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->details }}</td>
                        <td>
                            <a name="" id="" class="btn btn-info"
                                href="{{ route('product.show', ['product' => $product->id]) }}" role="button">Show</a>
                            <a name="" id="" class="btn btn-primary"
                                href="{{ route('product.edit', ['product' => $product->id]) }}" role="button">Edit</a>
                            <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    href="{{ route('product.destroy', ['product' => $product->id]) }}">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-3">Laravel 10 CRUD with Image Upload</h1>
        <div class="mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td><img src="{{ $product->image }}" alt="Product Image" width="100px"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->details }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3 m-5">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
