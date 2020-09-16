@extends('layouts.app')

@section('title', $title ?? 'Products')

@section('content')
    @if($items->count() >=1)
        <div class="product-section section mt-90 mb-90">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-product-wrap grid row justify-content-center">
                            @foreach($items as $item)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10 text-center">
                                    <div class="ee-product">
                                        <div class="image">
                                            <a href="{{ route('category.item', [$category->slug, $item->slug]) }}" class="img">
                                                <img src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="category-title">
                                                <h5 class="title"><a href="{{ route('category.item', [$category->slug, $item->slug]) }}">{{ $item->name }}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-30 justify-content-center">
                            <div class="col-md-4">
                                <ul class="pagination">
                                    <li class="@if($items->currentPage()==1) d-none @endif"><a href="{{ $items->previousPageUrl() }}"><i class="fas fa-angle-left"></i>{{ __("Back") }}</a></li>
                                    @if($items->currentPage() > 2)
                                        <li><a href="{{ $items->url($items->currentPage()-2) }}">{{ $items->currentPage()-2 }}</a></li>
                                    @endif
                                    @if($items->currentPage() > 1)
                                        <li><a href="{{ $items->url($items->currentPage()-1) }}">{{ $items->currentPage()-1 }}</a></li>
                                    @endif
                                    <li class="@if($items->currentPage()) active @endif"><a href="#">{{ $items->currentPage() }}</a></li>
                                    @if(($items->lastPage() - $items->currentPage()) >= 1)
                                        <li><a href="{{ $items->url($items->currentPage()+1) }}">{{ $items->currentPage()+1 }}</a></li>
                                    @endif
                                    @if(($items->lastPage() - $items->currentPage()) >= 2)
                                        <li><a href="{{ $items->url($items->currentPage()+2) }}">{{ $items->currentPage()+2 }}</a></li>
                                    @endif
                                    <li class="@if($items->currentPage()==$items->lastPage()) d-none @endif"><a href="{{ $items->nextPageUrl() }}">{{ __("Next") }}<i class="fas fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="track-order-section section mt-90 mb-50">
            <div class="container">
                <div class="row align-items-center">
                    <div class="track-order-title text-center col-12 mb-80">
                        <h2>Sorry! No items found for this page.</h2>
                        <p>If you're looking for some products which are not here! Please contact to service provider at <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.name') }}</a> </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('header')
    @parent
@endsection

@section('stylesheets')@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
