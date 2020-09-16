@extends('adminlte::page')

@section('title', $title ?? 'Item')

@section('content_header')
    <h1>{{ $title ?? 'Item' }}</h1>
@stop

@section('content')
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">View Price</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="buyPrice-tab" data-toggle="tab" href="#buyPrice" role="tab" aria-controls="buyPrice" aria-selected="false">Buy Price</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="sellPrice-tab" data-toggle="tab" href="#sellPrice" role="tab" aria-controls="sellPrice" aria-selected="false">Sell Price</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form class="" method="post" action="{{ route("admin.prices.store") }}">
                    @csrf
                    <table class="table table-striped" data-key="no-session:Buy">
                        <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Memory</th>
                            <th>Condition</th>
                            <th>Regular Price</th>
                            <th>Offer Price</th>
                            <th>Discount Rate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($item->prices as $price)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <input type="hidden" name="item" value="{{ $item->id }}" />
                                <td>{{ $price[0]['name'] }}<input type="hidden" name="memory[]" value="{{ $price[0]['id'] }}" /></td>
                                <td>{{ $price[1]['name'] }}<input type="hidden" name="condition[]" value="{{ $price[1]['id'] }}" /></td>
                                <td><input type="text" class="form-control form-control-sm" name="regular[]" value="{{ old('regular') ?? '' }}"></td>
                                <td><input type="text" class="form-control form-control-sm" name="sales[]" value="{{ old('sales') ?? '' }}"></td>
                                <td><input type="text" class="form-control form-control-sm" name="discount[]" value="{{ old('discount') ?? '' }}"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>

{{--            <div class="tab-pane fade" id="buyPrice" role="tabpanel" aria-labelledby="buyPrice-tab">--}}
{{--                <form class="" method="post" action="{{ route("admin.prices.store") }}">--}}
{{--                    @csrf--}}
{{--                    @if(Session::has('buy_attributes'))--}}
{{--                        <table class="table table-striped" data-key="session:buy">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Sr.</th>--}}
{{--                                <th>Category</th>--}}
{{--                                <th>Memory</th>--}}
{{--                                <th>Condition</th>--}}
{{--                                <th>Regular Price</th>--}}
{{--                                <th>Offer Price</th>--}}
{{--                                <th>Discount Rate</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach(Session::get('buy_attributes') as $variant)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $loop->iteration }}</td>--}}
{{--                                    <td>{{ $variant[1]['name'] }}<input type="hidden" name="category" value="{{ $variant[1]['name'] }}"></td>--}}
{{--                                    <input type="hidden" name="item" value="{{ $variant[0] }}" />--}}
{{--                                    <td>{{ $variant[2]['name'] }}<input type="hidden" name="memory[]" value="{{ $variant[2]['id'] }}" /></td>--}}
{{--                                    <td>{{ $variant[3]['name'] }}<input type="hidden" name="condition[]" value="{{ $variant[3]['id'] }}" /></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="regular[]" value="{{ old('regular') ?? '' }}"></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="sales[]" value="{{ old('sales') ?? '' }}"></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="discount[]" value="{{ old('discount') ?? '' }}"></td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    @else--}}
{{--                        <table class="table table-striped" data-key="no-session:Buy">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Sr.</th>--}}
{{--                                <th>Memory</th>--}}
{{--                                <th>Condition</th>--}}
{{--                                <th>Regular Price</th>--}}
{{--                                <th>Offer Price</th>--}}
{{--                                <th>Discount Rate</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($buyers as $variant)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $loop->iteration }}--}}
{{--                                        <select class="custom-select select2" name="category">--}}
{{--                                            @foreach($services[0]->categories as $category)--}}
{{--                                                <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </td>--}}
{{--                                    <input type="hidden" name="item" value="{{ $item->id }}" />--}}
{{--                                    <td>{{ $variant[0]['name'] }}<input type="hidden" name="memory[]" value="{{ $variant[0]['id'] }}" /></td>--}}
{{--                                    <td>{{ $variant[1]['name'] }}<input type="hidden" name="condition[]" value="{{ $variant[1]['id'] }}" /></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="regular[]" value="{{ old('regular') ?? '' }}"></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="sales[]" value="{{ old('sales') ?? '' }}"></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="discount[]" value="{{ old('discount') ?? '' }}"></td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    @endif--}}
{{--                    <button type="submit" class="btn btn-success">Save</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="tab-pane fade" id="sellPrice" role="tabpanel" aria-labelledby="sellPrice-tab">--}}
{{--                <form class="" method="post" action="{{ route("admin.prices.store") }}">--}}
{{--                    @csrf--}}
{{--                    @if(Session::has('sell_attributes'))--}}
{{--                        <table class="table table-striped" data-key="session:sell">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Sr.</th>--}}
{{--                                <th>Memory</th>--}}
{{--                                <th>Condition</th>--}}
{{--                                <th>Network</th>--}}
{{--                                <th>Regular Price</th>--}}
{{--                                <th>Offer Price</th>--}}
{{--                                <th>Discount Rate</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach(Session::get('sell_attributes') as $variant)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $loop->iteration }}</td>--}}
{{--                                    <td>{{ $variant[1]['name'] }}<input type="hidden" name="category" value="{{ $variant[1]['id'] }}" /></td>--}}
{{--                                    <input type="hidden" name="item" value="{{ $item->id }}" />--}}
{{--                                    <td>{{ $variant[2]['name'] }}<input type="hidden" name="memory[]" value="{{ $variant[2]['id'] }}" /></td>--}}
{{--                                    <td>{{ $variant[3]['name'] }}<input type="hidden" name="condition[]" value="{{ $variant[3]['id'] }}" /></td>--}}
{{--                                    <td>{{ $variant[4]['name'] }}<input type="hidden" name="network[]" value="{{ $variant[4]['id'] }}" /></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="regular[]" value="{{ old('regular') ?? '' }}"></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="sales[]" value="{{ old('sales') ?? '' }}"></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="discount[]" value="{{ old('discount') ?? '' }}"></td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    @else--}}
{{--                        <table class="table table-striped" data-key="no-session:sell">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Sr.</th>--}}
{{--                                <th>Memory</th>--}}
{{--                                <th>Condition</th>--}}
{{--                                <th>Network</th>--}}
{{--                                <th>Regular Price</th>--}}
{{--                                <th>Offer Price</th>--}}
{{--                                <th>Discount Rate</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($variants as $variant)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $loop->iteration }}<input type="hidden" name="category" value="4" /></td>--}}
{{--                                    <input type="hidden" name="item" value="{{ $item->id }}" />--}}
{{--                                    <td>{{ $variant[0]['name'] }}<input type="hidden" name="memory[]" value="{{ $variant[0]['id'] }}" /></td>--}}
{{--                                    <td>{{ $variant[1]['name'] }}<input type="hidden" name="condition[]" value="{{ $variant[1]['id'] }}" /></td>--}}
{{--                                    <td>{{ $variant[2]['name'] }}<input type="hidden" name="network[]" value="{{ $variant[2]['id'] }}" /></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="regular[]" value="{{ old('regular') ?? '' }}"></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="sales[]" value="{{ old('sales') ?? '' }}"></td>--}}
{{--                                    <td><input type="text" class="form-control form-control-sm" name="discount[]" value="{{ old('discount') ?? '' }}"></td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    @endif--}}
{{--                    <div class="col-md-12">--}}
{{--                        <button class="btn btn-outline-success" type="submit">Save</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
    </div>
@stop
@section('right-sidebar')
    <span class="badge-info badge">{{ Auth::user()->id }}</span>
@stop
@section('css')
    {{--    <link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop
@section('js')
    <script src="{{ asset("admin/dashboard.js") }}"></script>
    <script>
        $(function () {
            $('#summerNote').summernote();
            $('.select2').select2();
        });
    </script>
@stop
@section('plugins.Sweetalert2', true)
@section('plugins.summerNote', true)
@section('plugins.Select2', true)
