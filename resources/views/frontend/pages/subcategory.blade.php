@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        @if (count($products) > 0)
            @foreach ($products as $product)
                <div class="col-md-4 mt-3 mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <!-- Product price-->
                                {{ $product->price }} Tk
                                <p>
                                    {{ $product->short_description }}
                                </p>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="{{ route('product', [$product->id]) }}">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        @endif
    </div>
@endsection
