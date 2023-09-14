{{-- @extends('layouts.app')
@section('content')
    <div class="col-12">
        <h1>Show Product</h1>
    </div>
    <div class="col-12">
        <a name="" id="" class="btn btn-primary" href="{{ route('product.index') }}" role="button">Back</a>
    </div>
    <div class="col-12">
        <img src="{{ $product->image }}" class="img-fluid rounded-top" alt="">
    </div>
    <div class="col-12">
        <h2>{{ $product->name }}</h2>
    </div>
    <div class="col-12">{{ $product->details }}</div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Show Product</h1>

                <div class="text-center">
                    <img src="{{ $product->image }}" class="img-fluid rounded-top" alt="Product Image">
                </div>

                <h2 class="text-center mt-3">{{ $product->name }}</h2>

                <div class="text-center">{{ $product->details }}</div>

                <div class="text-center mt-3">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
