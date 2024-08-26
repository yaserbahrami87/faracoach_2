@component('masterView::admin.master.index')
    <div class="col-12 col-md-6 card mx-auto">
        <div class="card-header">تنظیمات سایت</div>
        <div class="card-body">
            <form class="form-row" method="post" action="{{route('admin.setting.update')}}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group col-12">
                    <label for="address">آدرس: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" value="{{!is_null($setting->where('setting','address')->first())?$setting->where('setting','address')->first()->value:'' }}" />
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="tel">تلفن: <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="tel" name="tel" value="{{!is_null($setting->where('setting','tel')->first())?$setting->where('setting','tel')->first()->value:'' }}" />
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="telegram">تلگرام:<span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="telegram" name="telegram" value="{{!is_null($setting->where('setting','telegram')->first())?$setting->where('setting','telegram')->first()->value:'' }}" />
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="instagram">اینستاگرام:<span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="telegram" name="instagram" value="{{!is_null($setting->where('setting','instagram')->first())?$setting->where('setting','instagram')->first()->value:'' }}" />
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="youtube">یوتیوب:<span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="youtube" name="youtube" value="{{!is_null($setting->where('setting','youtube')->first())?$setting->where('setting','youtube')->first()->value:'' }}" />
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="aparat">آپارات:<span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="aparat" name="aparat" value="{{!is_null($setting->where('setting','aparat')->first())?$setting->where('setting','aparat')->first()->value:'' }}" />
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="linkedin">لینکدین:<span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{!is_null($setting->where('setting','linkedin')->first())?$setting->where('setting','linkedin')->first()->value:'' }}" />
                </div>
                <button class="btn btn-success" type="submit">بروزرسانی</button>

            </form>
        </div>
    </div>
@endcomponent
