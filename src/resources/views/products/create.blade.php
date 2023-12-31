@extends('layouts.app')

@section('content')
    <div class="container pt-3">
        <div class="text-end mb-3">
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary me-2">Products</a>
        </div>
        <h1 class="mb-3">Create New Product</h1>
        <form method='POST' action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-2">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : null }}" id="name" placeholder="Name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : null }}" id="description" placeholder="Description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" name="price" value="{{ old('price') }}" class="form-control {{ $errors->has('price') ? 'is-invalid' : null }}" id="price" placeholder="Price">
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : null }}" id="image" placeholder="Image">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col text-end">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection