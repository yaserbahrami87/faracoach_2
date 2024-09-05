@component('masterView::user.master.index')
    <div class="col-12 col-md-4 mx-auto card">
        <div class="card-header">تنظیمات کلینیک</div>
        <div class="card-body">
            <form method="post" action="{{route('user.clinic.coach.setting.update')}}">
                {{csrf_field()}}
                <div class="form-row">
                    @php
                        $counseling=NULL;
                        $coaching=NULL;
                        $test=NULL;
                    @endphp
                    @foreach(Auth::user()->request_portals->where('status',2)->where('type','coach_service_request') as $item )
                            @if($item->clinicCategoriesRequestPortal->first()->parent_category->parent_category->where('title','خدمات')->first())
                            @if(!$counseling)
                                <div class="form-group col-md-12">
                                    <label for="counseling_fi">قیمت هر جلسه مشاوره: <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="counseling_fi" name="counseling_fi" value="{{!is_null($settings_coaching->where('setting','counseling_fi')->first())?$settings_coaching->where('setting','counseling_fi')->first()->value:'' }}" />
                                    <small>قیمت به تومان می باشد</small>
                                </div>
                            @endif
                            @php
                                $counseling=true;
                            @endphp
                        @endif
                        @if($item->clinicCategoriesRequestPortal->first()->parent_category->parent_category->where('title','آزمون')->first())
                            @if(!$test)
                                <div class="form-group col-md-12">
                                    <label for="test_fi">قیمت هر خدمات: <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="test_fi" name="test_fi" value="{{!is_null($settings_coaching->where('setting','test_fi')->first())?$settings_coaching->where('setting','test_fi')->first()->value:'' }}" />
                                    <small>قیمت به تومان می باشد</small>
                                </div>
                            @endif
                            @php
                                $test=true;
                            @endphp
                        @endif
                        @if($item->clinicCategoriesRequestPortal->first()->parent_category->parent_category->where('title','کوچینگ')->first())
                            @if(!$coaching)
                                <div class="form-group col-md-12">
                                    <label for="coaching_fi">قیمت هر جلسه کوچینگ: <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="coaching_fi" name="coaching_fi" value="{{!is_null($settings_coaching->where('setting','coaching_fi')->first())?$settings_coaching->where('setting','coaching_fi')->first()->value:'' }}" />
                                    <small>قیمت به تومان می باشد</small>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="coaching_student" id="coaching_student" {{!is_null($settings_coaching->where('setting','coaching_student')->first())?$settings_coaching->where('setting','coaching_student')->first()->value?'checked':'' :''}}  >
                                        <label class="form-check-label" for="coaching_student">
                                            جلسه دانشجویی برگزار میکنم
                                        </label>
                                    </div>

                                    <small class="text-muted">قیمت هر جلسه دانشجویی {{number_format($settings->where('setting','coaching_student_fi')->first()->value) }} تومان می باشد</small>
                                </div>
                            @endif
                            @php
                                $coaching=true;
                            @endphp
                        @endif
                    @endforeach

                    <div class="form-group col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="meeting_today" name="meeting_today" {{!is_null($settings_coaching->where('setting','meeting_today')->first())?$settings_coaching->where('setting','meeting_today')->first()->value?'checked':'' :''}}  >
                            <label class="form-check-label" for="meeting_today">
                                کاربر روز جاری بتواند رزرو جلسه داشته باشد
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="type_holding">نوع برگزاری جلسه:<span class="text-danger">*</span></label>
                        <select class="form-control" id="type_holding" name="type_holding">
                            <option disabled selected>انتخاب کنید</option>
                            <option value="1" {{!is_null($settings_coaching->where('setting','type_holding')->first())?$settings_coaching->where('setting','type_holding')->first()->value==1?'selected':'' :''}}>آنلاین</option>
                            <option value="2" {{!is_null($settings_coaching->where('setting','type_holding')->first())?$settings_coaching->where('setting','type_holding')->first()->value==2?'selected':'' :''}} >حضوری</option>
                            <option value="3" {{!is_null($settings_coaching->where('setting','type_holding')->first())?$settings_coaching->where('setting','type_holding')->first()->value==3?'selected':'' :''}} >هر دو</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="online_platforms">پلتفرم های جلسات آنلاین: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="online_platforms" name="online_platforms" value="{{!is_null($settings_coaching->where('setting','online_platforms')->first())?$settings_coaching->where('setting','online_platforms')->first()->value:'' }}" />
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address">آدرس جلسات حضوری: </label>
                        <input type="text" class="form-control" id="address" name="address" value="{{!is_null($settings_coaching->where('setting','address')->first())?$settings_coaching->where('setting','address')->first()->value:'' }}" />
                    </div>

                    <button class="btn btn-success">ذخیره</button>
                </div>
            </form>
        </div>
    </div>
@endcomponent
