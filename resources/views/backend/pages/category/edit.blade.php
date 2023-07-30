@extends('backend.layouts.master')

@section('title', 'Update Category')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4>Update Category</h4>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">Categories</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', [$category->id]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('name')
                                    is-invalid
                                @enderror"
                                    id="name" name="name" value="{{ $category->name }}">
                                @error('name')
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
