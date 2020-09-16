@extends('adminlte::page')

@section('title', $title ?? 'Item')

@section('content_header')
    <h1>{{ $title ?? 'Item' }}</h1>
@stop

@section('content')
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="buy-tab" data-toggle="tab" href="#buy" role="tab" aria-controls="buy" aria-selected="false">Buy Attributes</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="sell-tab" data-toggle="tab" href="#sell" role="tab" aria-controls="sell" aria-selected="false">Sell Attributes</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="buyPrice-tab" data-toggle="tab" href="#buyPrice" role="tab" aria-controls="buyPrice" aria-selected="false">Buy Variations</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="sellPrice-tab" data-toggle="tab" href="#sellPrice" role="tab" aria-controls="sellPrice" aria-selected="false">Sell Variations</a>
            </li>
        </ul>
        <div class="tab-content pt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form class="needs-validation" novalidate action="{{ route('admin.items.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row pt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="titleProduct">Product Title</label>
                                <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" id="titleProduct" placeholder="Enter Product Title" value="{{ $item->name ?? old('name') ?? '' }}">
                                @error('name')
                                <div class="invalid-tooltip">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="productType">Choose Type</label>
                                <select id="productType" name="type" class="custom-select @error('type') is-invalid @enderror custom-select-sm select2" style="width: 100%;">
                                    <option selected="selected">Choose Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}" @if($item->type->id==$type->id) selected @endif @if(old('type')==$type->id) selected @endif>{{ $type->name }}</option>
                                    @endforeach
                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="productBrand">Choose Brand</label>
                                <select id="productBrand" name="brand" class="custom-select @error('brand') is-invalid @enderror custom-select-sm select2" style="width: 100%;">
                                    <option selected="selected">Choose Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" @if($item->brand->id==$brand->id) selected @endif @if(old('brand')==$brand->id) selected @endif>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="summerNote1">Short Description</label>
                                <textarea class="form-control @error('short_desc') is-invalid @enderror" id="summerNote1" name="short_desc" rows="3">{{ $item->short_desc ?? old("short_desc") ?? '' }}</textarea>
                                @error('short_desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="summerNote">Long Description</label>
                                <textarea class="form-control @error('long_desc') is-invalid @enderror" id="summerNote" name="long_desc" rows="12">{{ $item->long_desc ?? old("long_desc") ?? '' }}</textarea>@error('long_desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                                    <label class="custom-file-label" for="customFile">{{ $item->image ?? old('image') ?? 'Choose Image' }}</label>
                                </div>
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row pt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                <form class="buy-attributes-form" action="{{ route("admin.item.sync", $item->id) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="productMemories">Memories</label>
                                <select class="custom-select custom-select-sm select2" multiple="multiple" id="productMemories" name="memories[]" data-placeholder="Select Memories" style="width: 100%;">
                                    @foreach($memories as $memory)
                                        <option value="{{ $memory->id }}"
                                                @if(collect(old('memories'))->contains($memory->id)) selected @endif
                                                @if(collect($item->memories->pluck('id'))->contains($memory->id)) selected @endif>{{ $memory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productCategories">{{ $services[0]->name }} Categories</label>
                                <select class="custom-select custom-select-sm select2" id="productCategories" multiple="multiple" name="categories[]" data-placeholder="Select Categories" style="width: 100%;">
                                    <option value="">--Choose--</option>
                                    @foreach($services[0]->categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if(collect(old('categories'))->contains($category->id)) selected @endif
                                                @if(collect($item->categories->pluck('id'))->contains($category->id)) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productConditions">{{ __('Buy Conditions') }}</label>
                                <select class="custom-select custom-select-sm select2" id="productConditions" multiple="multiple" name="conditions[]" data-placeholder="Select Conditions" style="width: 100%;">
                                    <option value="">--Choose--</option>
                                    @foreach($services[0]->categories as $category)
                                        @foreach($category->conditions as $condition)
                                            <option value="{{ $condition->id }}"
                                                    @if(collect(old('conditions'))->contains($condition->id)) selected @endif
                                                    @if(collect($item->conditions->pluck('id'))->contains($condition->id)) selected @endif>{{ $condition->name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-outline-success" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="sell" role="tabpanel" aria-labelledby="sell-tab">
                <form class="sell-attributes-form" action="{{ route("admin.item.sync", $item->id) }}" method="post">
                    @csrf
                    <div class="form-row">
                        @if($item->type->id!=2)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="productMemories">Memories</label>
                                    <select class="custom-select custom-select-sm select2" multiple="multiple" id="productMemories" name="memories[]" data-placeholder="Select Memories" style="width: 100%;">
                                        @foreach($memories as $memory)
                                            <option value="{{ $memory->id }}" @if(collect(old('memories'))->contains($memory->id)) selected @endif
                                            @if(collect($item->memories->pluck('id'))->contains($memory->id)) selected @endif>{{ $memory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productCategories">{{ $services[1]->name }} Categories</label>
                                <select class="custom-select custom-select-sm select2" id="productCategories" multiple="multiple" name="categories[]" data-placeholder="Select Categories" style="width: 100%;">
                                    <option value="">--Choose--</option>
                                    @foreach($services[1]->categories as $category)
                                        <option value="{{ $category->id }}" @if(collect(old('categories'))->contains($category->id)) selected @endif
                                        @if(collect($item->categories->pluck('id'))->contains($category->id)) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productConditions">{{ __('Sell Conditions') }}</label>
                                <select class="custom-select custom-select-sm select2" id="productConditions" multiple="multiple" name="conditions[]" data-placeholder="Select Conditions" style="width: 100%;">
                                    <option value="">--Choose--</option>
                                    @foreach($services[1]->categories as $category)
                                        @foreach($category->conditions as $condition)
                                            <option value="{{ $condition->id }}"
                                                    @if(collect(old('conditions'))->contains($condition->id)) selected @endif
                                                    @if(collect($item->conditions->pluck('id'))->contains($condition->id)) selected @endif>{{ $condition->name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="productNetworks">{{ __('Network') }}</label>
                                <select class="custom-select custom-select-sm select2" id="productNetworks" multiple="multiple" name="networks[]" data-placeholder="Select Networks" style="width: 100%;">
                                    <option value="">--Choose--</option>
                                    @foreach($networks as $network)
                                        <option value="{{ $network->id }}"
                                                @if(collect(old('networks'))->contains($network->id)) selected @endif
                                                @if(collect($item->networks->pluck('id'))->contains($network->id)) selected @endif>{{ $network->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-outline-success" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            @if($buyers->count()!==0)
                <div class="tab-pane fade" id="buyPrice" role="tabpanel" aria-labelledby="buyPrice-tab">
                    <form class="add-buy-prices" method="post" action="{{ route("admin.prices.store") }}">
                        @csrf
                        <table class="table table-striped" id="Buyers only">
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Category</th>
                                <th>Memory</th>
                                <th>Condition</th>
                                <th>Regular Price</th>
                                <th>Offer Price</th>
                                <th>Discount Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($buyers as $buyer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <input type="hidden" name="item" value="{{ $item->id }}" />
                                    <td>{{ $buyer->category->name }}<input type="hidden" name="category[]" value="{{ $buyer->category->id }}" /></td>
                                    <td>{{ $buyer->memory->name }}<input type="hidden" name="memory[]" value="{{ $buyer->memory->id }}" /></td>
                                    <td>{{ $buyer->condition['name'] }}<input type="hidden" name="condition[]" value="{{ $buyer->condition->id }}" /></td>
                                    <td><input type="text" class="form-control form-control-sm" name="regular[]" value="{{ $buyer->price->regular ?? '' }}"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="sales[]" value="{{ $buyer->sales ?? '' }}"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="discount[]" value="{{ $buyer->discount ?? '' }}"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            @elseif(Session::has('refurbishes'))
                <div class="tab-pane fade" id="buyPrice" role="tabpanel" aria-labelledby="buyPrice-tab">
                    <form class="add-buy-prices" method="post" action="{{ route("admin.prices.store") }}">
                        @csrf
                        <table class="table table-striped" id="session">
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Category</th>
                                <th>Memory</th>
                                <th>Condition</th>
                                <th>Regular Price</th>
                                <th>Offer Price</th>
                                <th>Discount Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Session::has('brandNew'))
                                @foreach(Session::get('brandNew') as $buyer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <input type="hidden" name="item" value="{{ $item->id }}" />
                                        <td>{{ $buyer[0]['name'] }}<input type="hidden" name="category[]" value="{{ $buyer[0]['id'] }}" /></td>
                                        <td>{{ $buyer[1]['name'] }}<input type="hidden" name="memory[]" value="{{ $buyer[1]['id'] }}" /></td>
                                        <td>{{ $buyer[2]['name'] }}<input type="hidden" name="condition[]" value="{{ $buyer[2]['id'] }}" /></td>
                                        <td><input type="text" class="form-control form-control-sm" name="regular[]" value="{{ old('regular') ?? '' }}"></td>
                                        <td><input type="text" class="form-control form-control-sm" name="sales[]" value="{{ old('sales') ?? '' }}"></td>
                                        <td><input type="text" class="form-control form-control-sm" name="discount[]" value="{{ old('discount') ?? '' }}"></td>
                                    </tr>
                                @endforeach
                            @endif
                            @foreach(Session::get('refurbishes') as $buyer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <input type="hidden" name="item" value="{{ $item->id }}" />
                                    <td>{{ $buyer[0]['name'] }}<input type="hidden" name="category[]" value="{{ $buyer[0]['id'] }}" /></td>
                                    <td>{{ $buyer[1]['name'] }}<input type="hidden" name="memory[]" value="{{ $buyer[1]['id'] }}" /></td>
                                    <td>{{ $buyer[2]['name'] }}<input type="hidden" name="condition[]" value="{{ $buyer[2]['id'] }}" /></td>
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
            @else
                <div class="tab-pane fade" id="buyPrice" role="tabpanel" aria-labelledby="buyPrice-tab">
                    <p>You don't have any price for any variants please add attributes first.</p>
                </div>
            @endif

            @if($sellers->count()!==0)
                <div class="tab-pane fade" id="sellPrice" role="tabpanel" aria-labelledby="sellPrice-tab">
                    <form class="add-sell-prices" method="post" action="{{ route("admin.prices.store") }}">
                        @csrf
                        <table class="table table-striped" data-key="no-session:sell">
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                @if($item->type->id!==2)
                                    <th>Memory</th>
                                @endif
                                <th>Condition</th>
                                <th>Network</th>
                                <th>Regular Price</th>
                                <th>Offer Price</th>
                                <th>Discount Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sellers as $seller)
                                <tr>
                                    <td>{{ $loop->iteration }}<input type="hidden" name="category[]" value="{{ $seller->category->id }}" /></td>
                                    <input type="hidden" name="item" value="{{ $item->id }}" />
                                    @if($item->type->id==2)
                                        <td>{{ $seller->condition->name ?? '-' }}<input type="hidden" name="condition[]" value="{{ $seller->condition->id ?? '' }}" /></td>
                                        <td>{{ $seller->network->name ?? '-' }}<input type="hidden" name="network[]" value="{{ $seller->network->id ?? '' }}" /></td>
                                    @else
                                        <td>{{ $seller->memory->name ?? '-' }}<input type="hidden" name="memory[]" value="{{ $seller->memory->id ?? '' }}" /></td>
                                        <td>{{ $seller->condition->name ?? '-' }}<input type="hidden" name="condition[]" value="{{ $seller->condition->id ?? '' }}" /></td>
                                        <td>{{ $seller->network->name ?? '-' }}<input type="hidden" name="network[]" value="{{ $seller->network->id ?? '' }}" /></td>
                                    @endif
                                    <td><input type="text" class="form-control form-control-sm" name="regular[]" value="{{ $seller->price->regular ?? '' }}"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="sales[]" value="{{ $seller->price->sales ?? '' }}"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="discount[]" value="{{ $seller->price->discount ?? '' }}"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12">
                            <button class="btn btn-outline-success" type="submit">Save Selling</button>
                        </div>
                    </form>
                </div>
            @elseif(Session::has('freshens'))
                <div class="tab-pane fade" id="sellPrice" role="tabpanel" aria-labelledby="sellPrice-tab">
                    <form class="add-sell-prices" method="post" action="{{ route("admin.prices.sell") }}">
                        @csrf
                        <table class="table table-striped" data-key="session" >
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                @if($item->type->id!==2)
                                    <th>Memory</th>
                                @endif
                                <th>Condition</th>
                                <th>Network</th>
                                <th>Regular Price</th>
                                <th>Offer Price</th>
                                <th>Discount Rate</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach(Session::get('freshens') as $seller)
                                <tr>
                                    <td>{{ $loop->iteration }}<input type="hidden" name="category[]" value="{{ $seller[0]['id'] }}" /></td>
                                    <input type="hidden" name="item" value="{{ $item->id }}" />
                                    @if($item->type->id==2)
                                        <td>{{ $seller[1]['name'] ?? '' }}<input type="hidden" name="network[]" value="{{ $seller[1]['id'] ?? '' }}" /></td>
                                        <td>{{ $seller[2]['name'] ?? '-' }}<input type="hidden" name="condition[]" value="{{ $seller[2]['id'] ?? null }}" /></td>
                                    @else
                                        <td>{{ $seller[1]['name'] }}<input type="hidden" name="memory[]" value="{{ $seller[1]['id'] }}" /></td>
                                        <td>{{ $seller[2]['name'] }}<input type="hidden" name="network[]" value="{{ $seller[2]['id'] }}" /></td>
                                        <td>{{ $seller[3]['name'] ?? '-' }}<input type="hidden" name="condition[]" value="{{ $seller[3]['id'] ?? null }}" /></td>
                                    @endif
                                    <td><input type="text" class="form-control form-control-sm" name="regular[]" value="{{ old('regular') ?? '' }}"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="sales[]" value="{{ old('sales') ?? '' }}"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="discount[]" value="{{ old('discount') ?? '' }}"></td>
                                    <td><</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12">
                            <button class="btn btn-outline-success" type="submit">Save Sale</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="tab-pane fade" id="sellPrice" role="tabpanel" aria-labelledby="sellPrice-tab">
                    <p>You don't have any price for any variants please add attributes first.</p>
                </div>
            @endif
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
