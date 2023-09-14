@extends('layouts.app')
@section('content')
    <div class="col-12 mb-3">
        <h1>Add New Product</h1>
    </div>
    <div class="col-12 mb-3">
        <a name="" id="" class="btn btn-primary" href="{{ route('products.index') }}" role="button">Back</a>
    </div>
    <div class="col-12 mb-3">
        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name">Name :</label>
                <input type="text" class="form-control" name="name" placeholder="Name"
                    value="{{ old('name', $product->name) }}">
                <div class="mt-1">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="details">Details :</label>
                <textarea name="details" id="" cols="30" rows="10" placeholder="Details" class="form-control">{{ old('details', $product->details) }}</textarea>
                <div class="mt-1">
                    @error('details')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="image">Image :</label>
                <input type="file" name="image" class="form-control">
                <div class="mt-1 mb-3">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if (old('image', $product->image))
                    <p class="mb-1">Previously uploaded image:</p>
                    <img src="{{ old('image', $product->image) }}" alt="Previously uploaded image" width="150"
                        class="mb-1">
                @endif
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
