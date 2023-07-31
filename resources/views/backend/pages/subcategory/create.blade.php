@extends('backend.layouts.master')

@section('title', 'Create Subcategory')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4>Create Subcategory</h4>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('subcategory.index') }}" class="btn btn-outline-secondary">Subcategories</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('subcategory.store') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select
                                    class="form-select @error('category_id')
                                is-invalid
                                @enderror"
                                    name="category_id">
                                    <option value="">Select Category</option>
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('category_id')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('name')
                                    is-invalid
                                @enderror"
                                    id="name" name="name" placeholder="Enter Name...">
                                @error('name')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
