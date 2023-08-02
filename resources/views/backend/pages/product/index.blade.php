@extends('backend.layouts.master')

@section('title', 'Products')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    @if (Session::has('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <h4>All Products</h4>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('product.create') }}" class="btn btn-outline-secondary">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Description</th>
                                <th>Short Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Description</th>
                                <th>Short Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $product->image) }}" width="50"
                                                alt="{{ $product->name }}">
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->subcategory->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->short_description }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', [$product->id]) }}"
                                                class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $product->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                {{ $product->name }}
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you want to delete this product?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <form action="{{ route('product.delete', [$product->id]) }}"
                                                                method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
