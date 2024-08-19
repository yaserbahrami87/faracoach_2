<div class="row">
    <div class="col-md-6 pl-1">
        <div class="form-group">
            <label>استان</label>
            <select class="custom-select {{!is_null(Auth::user()->state_id)?'is-valid':''}}"  name="state_id" id="state" wire:model.lazy="state">
                <option selected disabled>استان را انتخاب کنید</option>
                @foreach ($states as $item)
                    <option value="{{$item->id}}" {{(old('state_id',Auth::user()->state_id)==$item->id)?'selected':''}} >{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6 px-1">
        <div class="form-group">
            <label>شهر</label>
            <select class="custom-select {{!is_null(Auth::user()->city_id)?'is-valid':''}}" name="city_id" id="city">
                @foreach($cities as $city)
                    <option value="{{$city->id}}" {{Auth::user()->city_id==$city->id?'selected':''}} >{{$city->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
