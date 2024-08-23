@component('masterView::admin.master.index')
<div class="col-12 col-md-4 mx-auto card">
    <div class="card-header">تنظیمات کلینیک</div>
    <div class="card-body">
        <form method="post" action="{{route('admin.clinic.coach.setting')}}">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="coaching_student_count">تعداد جلسات دانشجویی: <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="coaching_student_count" name="coaching_student_count" value="{{!is_null($settings->where('setting','coaching_student_count')->first())?$settings->where('setting','coaching_student_count')->first()->value:'' }}" />
                </div>
                <div class="form-group col-md-12">
                    <label for="coaching_student_fi">قیمت هر جلسه دانشجویی:<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="coaching_student_fi" name="coaching_student_fi" value="{{!is_null($settings->where('setting','coaching_student_fi')->first())?$settings->where('setting','coaching_student_fi')->first()->value:'' }}" />
                    <small>قیمت به تومان می باشد</small>
                </div>
                <div class="form-group col-md-12">
                    <label for="coaching_duration_time">مدت زمان هر جلسه کوچینگ:<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="coaching_duration_time" name="coaching_duration_time" value="{{!is_null($settings->where('setting','coaching_duration_time')->first())?$settings->where('setting','coaching_duration_time')->first()->value:'' }}" />
                    <small> به دقیقه می باشد به عنوان مثال 60 دقیقه</small>
                </div>

                <button class="btn btn-success">ذخیره</button>
            </div>
        </form>
    </div>
</div>
@endcomponent
