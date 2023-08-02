@extends('backend.layouts.master')

@section('title', 'Update Product')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4>Update Product</h4>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('product.index') }}" class="btn btn-outline-secondary">Products</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update', [$product->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('name')
                                    is-invalid
                                @enderror"
                                    id="name" name="name" value="{{ $product->name }}">
                                @error('name')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('price')
                                    is-invalid
                                @enderror"
                                    id="price" name="price" value="{{ $product->price }}">
                                @error('price')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="image" name="image">
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                    width="50" class="my-1">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select
                                    class="form-select @error('category_id')
                                    is-invalid
                                @enderror"
                                    name="category_id" id="category_id">
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                        @if ($category->id == $product->category_id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="subcategory_id" class="col-sm-2 col-form-label">Subcategory</label>
                            <div class="col-sm-10">
                                <select
                                    class="form-select @error('subcategory_id')
                                    is-invalid
                                @enderror"
                                    name="subcategory_id" id="subcategory_id">
                                    <option value="{{ $product->subcategory_id }}">{{ $product->subcategory->name }}
                                    </option>
                                </select>
                                @error('subcategory_id')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea
                                    class="form-control @error('description')
                                is-invalid
                                @enderror"
                                    name="description" id="description" rows="3">{{ $product->description }}</textarea>
                                @error('description')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <textarea
                                    class="form-control @error('short_description')
                                is-invalid
                                @enderror"
                                    name="short_description" id="short_description" rows="3">{{ $product->short_description }}</textarea>
                                @error('short_description')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
