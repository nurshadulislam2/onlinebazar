@extends('frontend.layouts.master')

@section('title', $category->name)

@section('content')
    <h2 class="text-center my-3">{{ $category->name }}</h2>

    <div class="row">
        @foreach ($subcategories as $sub)
            <div class="col-md-4 mb-3">
                <a href="{{ route('subcategory', $sub->id) }}">
                    <div class="card">
                        <div class="card-body text-center">
                            {{ $sub->name }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@endsection
