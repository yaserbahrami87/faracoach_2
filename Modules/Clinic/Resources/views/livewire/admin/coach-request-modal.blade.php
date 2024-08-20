<div class="row p-3"  >
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="count_meeting">تعداد ساعت سابقه برگزاری جلسات:<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="count_meeting"  value="{{$coach->count_meeting}}"  disabled   />
                    </div>
                    <div class="col-12 col-md-6 form-group">

                        <label for="coachType">سطح:<span class="text-danger">*</span></label>

                        <select class="form-control" id="coachType"  disabled  >
                            <option selected value="NULL">انتخاب کنید</option>
                            @foreach($coachTypes as $coachType)
                                <option value="{{$coachType->id}}" {{$coach->coach_type_id==$coachType->id?'selected':''}}  >{{$coachType->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12   form-group">

                        <label for="coachCategory">گرایش های کوچ:<span class="text-danger">*</span></label>

                        @foreach($coach->coachcategories as $coachCategory)

                            <span class="border border-1 p-2">{{$coachCategory->category}}</span>
                        @endforeach

                    </div>

                </div>
                <div class="form-group">
                    <label for="education_background">سوابق تحصیلی <span class="text-danger">*</span></label>
                    <p   id="education_background" name="education_background"    >{!! $coach->education_background !!}</p>
                </div>
                <div class="form-group">
                    <label for="certificates">گواهینامه ها <span class="text-danger">*</span></label>
                    <p>{!! $coach->certificates !!}</p>
                </div>
                <div class="form-group">
                    <label for="experience">سوابق کاری <span class="text-danger">*</span></label>
                    <p>{!!$coach->experience!!}</p>
                </div>
                <div class="form-group">
                    <label for="skills">مهارت ها <span class="text-danger">*</span></label>
                    <p>{!! $coach->skills !!}</p>
                </div>
                <div class="form-group">
                    <label for="researches">سوابق علمی </label>
                    <p>{!! $coach->researches !!}</p>
                </div>

            </div>
        </div>
    </div>

</div>
