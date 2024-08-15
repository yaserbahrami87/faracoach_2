@component("masterView::admin.master.index")

<div class="col-12 col-md-8 mx-auto">
    <div class="card">
    <div class="card-body">

        <div class="card-header">
            <h5 class="card-title">بروزرسانی دوره {{$Course->course}}</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.course.update',['Course'=>$Course->shortlink])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="course">نام دوره: <span class="text text-danger">*</span></label>
                            <input type="text" class="form-control" id="course" name="course" value="{{old('course',$Course->course)}}"/>
                            @error('course')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="shortlink">لینک کوتاه:<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control" id="shortlink" name="shortlink" value="{{old('shortlink',$Course->shortlink)}}" />
                            @error('shortlink')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">نوع دوره:<span class="text text-danger">*</span></label>
                            <select id="type" class="form-control p-0 @error('courseType_id') is-invalid @enderror" name="courseType_id">
                                <option selected disabled>انتخاب کنید</option>
                                @foreach($CourseTypes as $item)
                                    <option value="{{$item->id}}" @if($item->id==old('courseType_id',$Course->courseType_id)) selected @endif >{{$item->type}}</option>
                                @endforeach

                            </select>
                            @error('type')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="duration">مدت زمان دوره (ساعت):<span class="text text-danger">*</span></label>
                            <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{old('duration',$Course->duration)}}" />
                            <small>مدت دوره به ساعت باید وارد شود به عنوان مثال 120 </small>
                            @error('duration')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="duration_date">مدت دوره (روز/هفته/ماه):<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control @error('duration_date') is-invalid @enderror" id="duration_date" name="duration_date" value="{{old('duration_date',$Course->duration_date)}}" />
                            <small>طول مدت دوره باید وارد شود به عنوان مثال: 6 ماه </small>
                            @error('duration_date')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="count_students">حداکثر ظرفیت دوره:<span class="text text-danger">*</span></label>
                            <input type="number" class="form-control @error('count_students') is-invalid @enderror" id="count_students" name="count_students" value="{{old('count_students',$Course->count_students)}}" />
                            @error('count_students')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="course_days">روزهای برگزاری دوره:<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control @error('course_days') is-invalid @enderror" id="course_days" name="course_days" value="{{old('course_days',$Course->course_days)}}" />
                            @error('course_days')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="time_fa">ساعت برگزاری دوره:<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control time_fa" id="time_fa" name="course_times" value="{{old('course_times',$Course->course_times)}}"/>
                            @error('course_times')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>پوستر دوره:<span class="text text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" id="image_label" class="form-control" name="image" aria-label="Image" aria-describedby="button-image" value="{{old('image',$Course->image)}}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image" name="image">انتخاب پوستر</button>
                                </div>
                                @error('image')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="teacher">مدرس/مدرس ها<span class="text-danger">*</span></label>
                            <div class="row">
                                @foreach($Teachers as $item)
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox image-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="teacher{{$item->id}}" name="teacher[]" value="{{$item->id}}" @if($Course->teachers->where('user_id',$item->user_id)->first()) checked @endif >
                                            <label class="custom-control-label text-center" for="teacher{{$item->id}}">

                                                @if(is_null($item->user->personal_image))
                                                    <img src="/images/users/default-avatar.png" width="60px" height="60px">
                                                @else
                                                    <img src="/documents/users/{{$item->user->personal_image}}" width="60px" height="60px">
                                                @endif
                                                {{($item->user->lname)?$item->user->fname.' '.$item->user->lname:$item->user->tel}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            @error('teacher')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="start">تاریخ شروع دوره:<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control dateInput" id="start" name="start" value="{{old('start',$Course->start)}}" />
                            @error('start')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="end">تاریخ اتمام دوره:<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control dateInput" id="end" name="end" value="{{old('end',$Course->end)}}" />
                            @error('end')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exam">تاریخ آزمون:<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control dateInput" id="exam" name="exam" value="{{old('exam',$Course->exam)}}"/>
                            @error('exam')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fi">هزینه دوره (تومان):<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control @error('fi') is-invalid @enderror" id="fi" name="fi" value="{{old('fi',$Course->fi)}}" />
                            @error('fi')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fi_off"> هزینه دوره با تخفیف (تومان):<span class="text text-danger">*</span></label>
                            <input type="text" class="form-control @error('fi_off') is-invalid @enderror" id="fi_off" name="fi_off" value="{{old('fi_off',$Course->fi_off)}}" />
                            @error('fi_off')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="prepayment"> حداقل مبلغ پرداخت دوره (تومان):<span class="text text-danger">*</span></label>
                            <input type="number" class="form-control @error('prepayment') is-invalid @enderror" id="prepayment" name="prepayment" value="{{old('prepayment',$Course->prepayment)}}" />
                            <small class="text-dark">مربوط به دوره های قسطی</small>
                            @error('prepayment')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="peymant_off"> میزان تخفیف پرداخت نقدی (%):<span class="text text-danger">*</span></label>
                            <input type="number" class="form-control @error('peymant_off') is-invalid @enderror" id="peymant_off" name="peymant_off" value="{{old('peymant_off',$Course->peymant_off)}}" />
                            <small class="text-dark">مربوط به دوره های قسطی</small>
                            @error('peymant_off')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label for="type_peymant_id">شرایط پرداخت:<span class="text text-danger">*</span></label>
                            <select id="type_peymant_id" class="form-control p-0 @error('type_peymant_id') is-invalid @enderror" name="type_peymant_id">
                                <option selected disabled>انتخاب کنید</option>
                                <option value="1" {{1==old('type_peymant_id',$Course->type_peymant_id)?'selected':''}} >نقدی</option>
                                <option value="2" {{2==old('type_peymant_id',$Course->type_peymant_id)?'selected':''}}>قسطی</option>
                                <option value="3" {{3==old('type_peymant_id',$Course->type_peymant_id)?'selected':''}}>هر دو</option>
                            </select>
                            @error('type_peymant_id')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ckeditor">توضیحات دوره:<span class="text text-danger">*</span></label>
                    <textarea id="ckeditor" name="infocourse" class="ckeditor">{{old('infocourse',$Course->infocourse)}}</textarea>
                    @error('infocourse')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>
    </div>
</div>

@slot('footerScript')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }
    </script>


    <script src="/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js"></script>
    <script>
        $('.dateInput').simpleMask({
            'mask': ['####/##/##','####/##/##']
        });

        $('.time_fa').simpleMask({
            'mask': ['##:##','##:##']
        });
    </script>

    <script src="/dashboard/plugins/ckeditor4/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor',
            {
                language:'fa',
                filebrowserImageBrowseUrl: '/file-manager/ckeditor'
            });
    </script>
    <script>
        window.addEventListener('plugins',()=>
        {
            let head = document.getElementsByTagName('HEAD')[0];

            let link = document.createElement('script');
            link.src = '/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js';
            head.appendChild(link);

            $('.dateInput').simpleMask({
                'mask': ['####/##/##','####/##/##']
            });

            $('.time_fa').simpleMask({
                'mask': ['##:##','##:##']
            })
        });
    </script>
@endslot

@endcomponent
