@extends('frontend.layouts.master')

@section('title', 'Home')

@section('content')
    <div class="slider">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.pexels.com/photos/3851005/pexels-photo-3851005.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/65175/pexels-photo-65175.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/17470374/pexels-photo-17470374/free-photo-of-orilla-del-mar-a-vista-de-dron.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="py-5">
        <div class="row">
            <h3 class="text-center py-3">Latest Product</h3>
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('images/' . $product->image) }}"
                                alt="{{ $product->name }}" />
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
    </div>
@endsection
