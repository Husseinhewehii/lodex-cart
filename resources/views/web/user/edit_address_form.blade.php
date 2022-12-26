
<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
<div class="form-row">
    <div class="col-md-6">
        <label for="Street">{{ trans('street') }}</label>
        <input type="text" class="form-control" value="{{  $address->street }}" name="street" id="street" placeholder="{{ trans('street') }}"
               required="">
    </div>
    <div class="col-md-6">
        <label for="building">{{ trans('building') }}</label>
        <input type="text" class="form-control" value="{{ $address->building }}" name="building" id="building" placeholder="{{ trans('building') }}"
               required="">
    </div>
    <div class="col-md-6">
        <label for="floor">{{ trans('floor') }}</label>
        <input type="text" class="form-control" value="{{ $address->floor}}" name="floor" id="floor" placeholder="{{ trans('floor') }}"
               required="">
    </div>
    <div class="col-md-6">
        <label for="apartment">{{ trans('apartment') }}</label>
        <input type="text" class="form-control" value="{{ $address->apartment }}" name="apartment" id="apartment" placeholder="{{ trans('apartment') }}"
               required="">
    </div>
    <div class="col-md-6">
        <div class="form-group ">
            <div class="form-group overflow-hidden">
                <label for="city_id">{{trans('city')}} *</label>
                <select name="city_id"  class="form-control select2 w-100" id="city_id">
                    <option value="">{{ trans('select') }} {{ trans('country') }}</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id}}" {{ $selectedCity == $location->id ? "selected":null }}>{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group col-md-6" @if(!old('city_id') && !count($regions))style="visibility: hidden"@endif id="div_region">
        <div class="form-group overflow-hidden">
            <label for="region_id">{{trans('region')}}</label>
            <select name="region_id"  class="form-control select2 w-100" id="region_id">
                <option value="">{{ trans('select_city') }}</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id}}" {{ $selectedRegion == $region->id ? "selected":null }}>{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-6" @if(!old('region_id') && !count($districts))style="visibility: hidden"@endif id="div_district">
        <div class="form-group overflow-hidden">
            <label for="district_id">{{ trans('select') }} {{ trans('district') }}</label>
            <select name="district_id"  class="form-control select2 w-100" id="district_id">
                @foreach($districts as $district)
                    <option value="{{ $district->id}}" {{ $selectedDistrict == $district->id ? "selected":null }}>{{ $district->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-12" >
        <button class="btn btn-sm btn-solid" type="submit">{{ trans('save') }} {{ trans('settings') }}</button>
    </div>
</div>
