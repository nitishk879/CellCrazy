@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <!-- Brands Section Start -->
    <div class="brands-section section mt-90">
        <div class="container">
            <div class="row mb-90">
                <div class="brand-slider col">
                    @foreach($brands as $brand)
                        <div class="brand-item col">
                            <a href="{{ route("brands.show", $brand->slug) }}"><img src="{{ asset("storage/brands/{$brand->image}") }}" alt="{{ $brand->name }}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Brands Section End -->
@endsection

@section('stylesheets')@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
