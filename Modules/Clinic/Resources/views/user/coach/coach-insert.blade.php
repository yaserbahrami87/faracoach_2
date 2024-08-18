@component('masterView::user.master.index')
    <div class="col-12 col-md-6 card mx-auto">
        <div class="card-header">درخواست همکاری به عنوان کوچ</div>
        <div class="card-body">
            <div class="alert alert-warning">
                فیلدهای ستاره دار اجباری هستند
            </div>
            <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{is_null(Auth::user()->coach)?' active':''}}" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">مرحله اول اطلاعات اولیه</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{!is_null(Auth::user()->coach)?' active':''}}" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">مرحله دوم خدمات قابل ارایه</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade {{is_null(Auth::user()->coach)?'show active':''}} pt-3" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card">
                        <div class="card-body">
                        @if(is_null(Auth::user()->coach))
                        <form method="post" action="{{route('user.clinic.coach.store')}}">
                            {{csrf_field()}}
                        @endif
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="count_meeting">تعداد ساعت سابقه برگزاری جلسات:<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="count_meeting" name="count_meeting" value="{{old('count_meeting',!is_null(Auth::user()->coach)?Auth::user()->coach->count_meeting:'')}}" {{!is_null(Auth::user()->coach)?'disabled':''}}  >
                                </div>
                                <div class="col-12 col-md-6 form-group">

                                    <label for="coachType">سطح:<span class="text-danger">*</span></label>

                                    <select class="form-control" id="coachType" name="coachType" {{!is_null(Auth::user()->coach)?'disabled':''}} >
                                        <option selected value="NULL">انتخاب کنید</option>
                                        @foreach($coachTypes as $coachType)
                                            <option value="{{$coachType->id}}" {{old('coachType',!is_null(Auth::user()->coach)?Auth::user()->coach->coach_type_id:'')==$coachType->id?'selected':''}}  >{{$coachType->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12   form-group">

                                    <label for="coachCategory">گرایش های کوچ:<span class="text-danger">*</span></label>
                                    <select class="form-control" id="coachCategory" name="coachCategory[]" multiple {{!is_null(Auth::user()->coach)?'disabled':''}}>
                                        @foreach($coachCategories as $coachCategory)
                                            <option value="{{$coachCategory->id}}"  @if(is_array(old('coachCategory',!is_null(Auth::user()->coach)?Auth::user()->coach->coachcategories->where('coachcategory_id',$coachCategory->id)->first():'')) && in_array($coachCategory->id, old('coachCategory',!is_null(Auth::user()->coach)?Auth::user()->coach->coachcategories->where('coachcategory_id',$coachCategory->id)->first():''))) selected @endif >{{$coachCategory->category}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="education_background">سوابق تحصیلی <span class="text-danger">*</span></label>
                                <textarea class="form-control trumbowyg" id="education_background" name="education_background" rows="3" {{!is_null(Auth::user()->coach)?'disabled':''}} >{{old('education_background',!is_null(Auth::user()->coach)?Auth::user()->coach->education_background:'')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="certificates">گواهینامه ها <span class="text-danger">*</span></label>
                                <textarea class="form-control trumbowyg" id="certificates" name="certificates" rows="3" {{!is_null(Auth::user()->coach)?'disabled':''}} >{{old('certificates',!is_null(Auth::user()->coach)?Auth::user()->coach->certificates:'')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="experience">سوابق کاری <span class="text-danger">*</span></label>
                                <textarea class="form-control trumbowyg" id="experience" name="experience" rows="3" {{!is_null(Auth::user()->coach)?'disabled':''}} >{{old('experience',!is_null(Auth::user()->coach)?Auth::user()->coach->experience:'')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="skills">مهارت ها <span class="text-danger">*</span></label>
                                <textarea class="form-control trumbowyg" id="skills" name="skills" rows="3" {{!is_null(Auth::user()->coach)?'disabled':''}} >{{old('skills',!is_null(Auth::user()->coach)?Auth::user()->coach->skills:'')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="researches">سوابق علمی </label>
                                <textarea class="form-control trumbowyg" id="researches" name="researches" rows="3" {{!is_null(Auth::user()->coach)?'disabled':''}}>{{old('researches',!is_null(Auth::user()->coach)?Auth::user()->coach->researches:'')}}</textarea>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="fi">قیمت هر جلسه:(تومان)<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="fi" name="fi" value="{{old('fi',!is_null(Auth::user()->coach)?Auth::user()->coach->fi:'')}}" {{!is_null(Auth::user()->coach)?'disabled':''}}>

                            </div>

                        @if(is_null(Auth::user()->coach))
                            <button type="submit" class="btn btn-outline-success">ذخیره اطلاعات</button>
                        </form>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{!is_null(Auth::user()->coach)?'show active':''}}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card">

                        <div class="card-body">
                            <livewire:clinic::user.coach.clinic-category />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @slot('footerScript')
        <script src="/dashboard/plugins/trumbowyg/dist/trumbowyg.min.js"></script>
        <link rel="stylesheet" href="/dashboard/plugins/trumbowyg/dist/ui/trumbowyg.min.css">


        <script>
            $('.trumbowyg').trumbowyg({
                lang:'fa',
                btns: [
                    ['undo', 'redo'], // Only supported in Blink browsers
                    ['formatting'],
                    ['strong', 'em', 'del'],
                    ['superscript', 'subscript'],
                    ['link'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat'],
                    ['fullscreen']
                ]
            });

        </script>

        <link href="/dashboard/plugins/multi-select-checkboxes/jquery.multiselect.css" rel="stylesheet" />
        <script src="/dashboard/plugins/multi-select-checkboxes/jquery.multiselect.js"></script>
        <script>
            $('select[multiple]').multiselect({
                columns: 2,
            });
        </script>
    @endslot
@endcomponent
