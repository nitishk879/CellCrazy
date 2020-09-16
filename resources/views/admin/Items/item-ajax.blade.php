@isset($service)
    <!---   In case your are going to sell your product   --->
    <div class="form-group">
        <label for="productCategories">Categories</label>
        <select class="custom-select custom-select-sm select2" multiple="multiple" id="productCategories" name="categories[]" data-placeholder="Select Categories" style="width: 100%;">
            @foreach($service->categories as $category)
                <option value="{{ $category->id }}"
                        @if(collect(old('categories'))->contains($category->id)) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
@endisset
@isset($tester)
    <div class="form-group">
        <label for="productNetworks">Networks</label>
        <select class="custom-select custom-select-sm select2" multiple="multiple" id="productNetworks" name="networks[]" data-placeholder="Select Memories" style="width: 100%;">
            @foreach($service->networks as $network)
                <option value="{{ $network->id }}"
                        @if(collect(old('networks'))->contains($network->id)) selected @endif
                        @if(collect($item->networks->pluck('id'))->contains($network->id)) selected @endif>{{ $network->name }}</option>
            @endforeach
        </select>
    </div>
    <!---   In case your are going to sell your product   --->
    <!---   In both cases you've to choose service type for the product   --->
    <div class="form-group">
        <label for="productConditions">Conditions</label>
        <select class="custom-select custom-select-sm select2" multiple="multiple" id="productConditions" name="conditions[]" data-placeholder="Select Conditions" style="width: 100%;">
            @foreach($service->conditions as $condition)
                <option value="{{ $condition->id }}"
                        @if(collect(old('conditions'))->contains($condition->id)) selected @endif
                        @if(collect($item->conditions->pluck('id'))->contains($condition->id)) selected @endif>{{ $condition->name }}</option>
            @endforeach
        </select>
    </div>
    <!---   In both cases you've to choose service type for the product   --->
@endisset
