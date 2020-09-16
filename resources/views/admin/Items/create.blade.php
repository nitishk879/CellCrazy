@extends('adminlte::page')

@section('title', $title ?? 'Item')

@section('content_header')
    <h1>{{ $title ?? 'Item' }}</h1>
@stop

@section('content')
    <div class="card-body">
        <form class="" action="{{ route('admin.items.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basic Information</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="buy-tab" data-toggle="tab" href="#buy" role="tab" aria-controls="buy" aria-selected="false">Buy Attributes</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="sell-tab" data-toggle="tab" href="#sell" role="tab" aria-controls="sell" aria-selected="false">Sell Attributes</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="form-row pt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="titleProduct">Product Title</label>
                                <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" id="titleProduct" placeholder="Enter Product Title" value="{{ old('name') ?? '' }}">
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
                                        <option value="{{ $type->id }}" @if(old('type')==$type->id) selected @endif>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="productBrand">Choose Brand</label>
                                <select id="productBrand" name="brand" class="custom-select @error('brand') is-invalid @enderror custom-select-sm select2" style="width: 100%;">
                                    <option selected="selected">Choose Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" @if(old('brand')==$brand->id) selected @endif>{{ $brand->name }}</option>
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
                                <textarea class="form-control @error('short_desc') is-invalid @enderror" id="summerNote1" name="short_desc" rows="3">{{ old("short_desc") ?? '' }}</textarea>
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
                                <textarea class="form-control @error('long_desc') is-invalid @enderror" id="summerNote" name="long_desc" rows="12">{{ old("long_desc") ?? '' }}</textarea>
                                @error('long_desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" value="{{ old('image') ?? '' }}" id="customFile">
                                    <label class="custom-file-label" for="customFile">{{ old('image') ?? 'Choose Image' }}</label>
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
                            <button type="submit" class="btn btn-outline-success">Save Product</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="productMemories">Memories</label>
                                <select class="custom-select custom-select-sm select2" multiple="multiple" id="productMemories" name="memories[]" data-placeholder="Select Memories" style="width: 100%;">
                                    @foreach($memories as $memory)
                                        <option value="{{ $memory->id }}" @if(collect(old('memories'))->contains($memory->id)) selected @endif>{{ $memory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productCategories">{{ $services[0]->name }}</label>
                                <select class="custom-select custom-select-sm select2" id="productCategories" multiple="multiple" name="categories[]" data-placeholder="Select Categories" style="width: 100%;">
                                    <option value="">--Choose--</option>
                                    @foreach($services[0]->categories as $category)
                                        <option value="{{ $category->id }}" @if(collect(old('categories'))->contains($category->id)) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productConditions">{{ __('Condition') }}</label>
                                <select class="custom-select custom-select-sm select2" id="productConditions" multiple="multiple" name="conditions[]" data-placeholder="Select Conditions" style="width: 100%;">
                                    <option value="">--Choose--</option>
                                    @foreach($services[0]->categories as $category)
                                        @foreach($category->conditions as $condition)
                                            <option value="{{ $condition->id }}" @if(collect(old('conditions'))->contains($condition->id)) selected @endif>{{ $condition->name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-outline-success" type="submit">Save</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="sell" role="tabpanel" aria-labelledby="sell-tab">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="productMemories">Memories</label>
                                <select class="custom-select custom-select-sm select2" multiple="multiple" id="productMemories" name="memories[]" data-placeholder="Select Memories" style="width: 100%;">
                                    @foreach($memories as $memory)
                                        <option value="{{ $memory->id }}" @if(collect(old('memories'))->contains($memory->id)) selected @endif>{{ $memory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productCategories">{{ $services[1]->name }}</label>
                                <select class="custom-select custom-select-sm select2" id="productCategories" multiple="multiple" name="categories" data-placeholder="Select Categories" style="width: 100%;">
                                    <option value="">--Choose--</option>
                                    @foreach($services[1]->categories as $category)
                                        <option value="{{ $category->id }}" @if(collect(old('categories'))->contains($category->id)) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productConditions">{{ __('Condition') }}</label>
                                <select class="custom-select custom-select-sm select2" id="productConditions" multiple="multiple" name="conditions" data-placeholder="Select Conditions" style="width: 100%;">
                                    <option value="">--Choose--</option>
                                    @foreach($services[1]->categories as $category)
                                        @foreach($category->conditions as $condition)
                                            <option value="{{ $condition->id }}" @if(collect(old('conditions'))->contains($condition->id)) selected @endif>{{ $condition->name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productNetworks">{{ __('Network') }}</label>
                                <select class="custom-select custom-select-sm select2" id="productNetworks" multiple="multiple" name="networks[]" data-placeholder="Select Networks" style="width: 100%;">
                                    <option value="">--Choose--</option>
                                    @foreach($networks as $network)
                                        <option value="{{ $network->id }}" @if(collect(old('networks'))->contains($network->id)) selected @endif>{{ $network->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-outline-success" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@section('right-sidebar')@stop
@section('css')@stop
@section('js')
    <script>
        $(function () {
            $('#summerNote').summernote();
            $('.select2').select2();
            bsCustomFileInput.init();
        });
        $('span#deleteUser').on('click', function (e) {
            var id = $(this).attr('data-id');
            var tr = $(this).closest("tr");
            var url = $(this).attr("action");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'delete',
                url:"/admin/users/"+id,
                success:function (data) {
                    tr.find('td').fadeOut(500, function () {
                        tr.remove();
                    });
                    Swal.fire({
                        title: 'Success!',
                        text: data,
                        icon: 'success',
                        confirmButtonText: 'Close'
                    })
                }
            });
        })
    </script>
@stop
@section('plugins.Sweetalert2', true)
@section('plugins.summerNote', true)
@section('plugins.Select2', true)
