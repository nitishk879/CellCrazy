@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <!-- Compare Page Start -->
    <div class="page-section section mt-90 mb-90">
        <div class="container-fluid">
            <div class="row">
                @isset($items)
                    <div class="col-12">
                        <form action="#">
                            <div class="compare-table table-responsive">
                                <table class="table mb-0 table-striped">
                                    <tbody>
                                    <tr>
                                        <td class="first-column">Product</td>
                                        @foreach($items as $item)
                                            <td class="product-image-title">
                                                <a href="#" class="image"><img src="{{ asset("storage/products/{$item['item']['image']}") }}" alt="{{ $item['item']['name'] }}" style="max-width:160px;"></a>
                                                <a href="#" class="category">{{ $item['item']['category']['name'] }} {{ $item['item']['id'] }}</a>
                                                <a href="#" class="title">{{ $item['item']['name'] }}</a>
                                            </td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="first-column">Description</td>
                                        @foreach($items as $item)
                                            <td>{{ $item['item']['short_desc'] }}</td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="first-column">Price</td>
                                        @foreach($items as $item)
                                            <td><i class="fa fa-pound-sign"> </i>{{ $item['item']['price']['sales'] }}</td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="first-column">Category</td>
                                        @foreach($items as $item)
                                            <td>{{ $item['item']['category']['name'] }}</td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="first-column">Type</td>
                                        @foreach($items as $item)
                                            <td>{{ $item['item']['type']['name'] }}</td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="first-column">Stock</td>
                                        @foreach($items as $item)
                                            <td class="text-success">in stock</td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="first-column">Memory</td>
                                        @foreach($items as $item)
                                            <td>{{ $item['item']['price']['memory']['name'] }}</td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="first-column">Condition</td>
                                        @foreach($items as $item)
                                            <td>{{ $item['item']['price']['condition']['name'] }}</td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="first-column">Add to cart</td>
                                        @foreach($items as $item)
                                            <td class="pro-addtocart"><a href="#" data-id="{{ $item['item']['id'] }}" class="add-to-cart" tabindex="0"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a></td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="first-column">Delete</td>
                                        @foreach($items as $item)
                                            <td class="pro-remove"><a href="" data-id="{{ $item['item']['id'] }}" data-tooltip="Compare"><i class="fa fa-trash-o"></i></a></td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="first-column">Rating</td>
                                        @foreach($items as $item)
                                            <td class="pro-ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </td>
                                            @if($loop->iteration===5) @break @endif
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </form>

                    </div>
                @else
                    <div class="col-12">
                        <p>Sorry! There is no item to compare. Please choose at least two items.</p>
                    </div>
                @endisset
            </div>
        </div>
    </div>
    <!-- Compare Page End -->
@endsection

@section('stylesheets')@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
