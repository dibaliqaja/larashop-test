@extends('layouts.global')
@section('title_page','Add Product')
@section('content')

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Product Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="desc" class="col-md-4 col-form-label text-md-right">Description</label>

            <div class="col-md-6">
                <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" required>{{ old('desc') }}</textarea>

                @error('desc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

            <div class="col-md-6">
                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required min="0">

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button class="btn btn-primary">Add New</button>
                <a href="{{ route('products.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </form>

@endsection
