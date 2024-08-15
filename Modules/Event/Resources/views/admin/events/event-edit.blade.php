@component('masterView::admin.master.index')
    <div class="col-12 col-md-6 mx-auto card">
            <div class="card-header">
                <h4>ایجاد رویداد جدید</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.event.update',['event'=>$event->shortlink])}}"  >
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label for="event">موضوع رویداد<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="event" name="event" value="{{old('event',$event->event)}}"  autocomplete="off"/>
                        @error('event')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="shortlink">لینک اختصاصی<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="shortlink" name="shortlink" value="{{old('shortlink',$event->shortlink)}}" autocomplete="off" />
                        <small class="d-block">لینک اختصاصی نباید تکراری باشد</small>
                        <small>لینک اختصاصی باید انگلیسی باشد</small>
                        @error('shortlink')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="user_id">برگزارکننده/برگزار کننده ها<span class="text-danger">*</span></label>
                        <div class="row">
                            @foreach($organizers as $organizer)
                                <div class="col-md-3">

                                    <div class="custom-control custom-checkbox image-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="organizer{{$organizer->id}}" name="eventorganizer_id[]" value="{{$organizer->id}}" @if($event->eventOrganizers->where('user_id',$organizer->user_id)->first()) checked @endif >
                                        <label class="custom-control-label text-center" for="organizer{{$organizer->id}}">

                                            @if(is_null($organizer->user->personal_image))
                                                <img src="/images/users/default-avatar.png" width="115px" height="115px">
                                            @else
                                                <img src="/documents/users/{{$organizer->user->personal_image}}" width="115px" height="115px">
                                            @endif
                                                {{($organizer->user->lname)?$organizer->user->fname.' '.$organizer->user->lname:$organizer->user->tel}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        @error('eventorganizer_id')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror


                    </div>


                    <div class="form-group">
                        <label for="description">توضیح کوتاه<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="description" name="description" value="{{old('description',$event->description)}}" />
                        <small>حداکثر 150 کارکتر</small>
                        @error('description')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="capacity">ظرفیت<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="capacity" name="capacity" value="{{old('capacity',$event->capacity)}}"  />
                        <small class="text-muted">در صورت نامحدود بودن عدد 1- را وارد کنید</small>
                        @error('capacity')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fi">قیمت (تومان):<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="fi" name="fi" value="{{old('fi',$event->fi)}}"  />
                        <small class="text-muted">در صورت رایگان بودن عدد 0 را وارد و یا هیچ عددی وارد نکنید</small>
                        @error('fi')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="capacity">نوع رویداد <span class="text-danger">*</span></label>
                            <div class="form-check  form-check-inline" >
                                <input class="form-check-input ml-3 type" type="radio" name="type" id="type1" value="1" @if($event->type==1) checked @endif />
                                <label class="form-check-label p-0" for="type1">
                                    حضوری
                                </label>

                                <input class="form-check-input ml-3 type" type="radio" name="type" id="type2" value="2" @if($event->type==2) checked @endif />
                                <label class="form-check-label p-0" for="type2">
                                    آنلاین
                                </label>
                            </div>
                            @error('type')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group" id="address1">
                        <label for="address">آدرس/لینک<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" value="{{old('address',$event->address)}}" />
                        @error('address')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">آدرس عکس شاخص<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" id="image_label" class="form-control" name="image"
                                           aria-label="Image" aria-describedby="button-image" value="{{old('image',$event->image)}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-image" name="image">انتخاب پوستر</button>
                                    </div>
                                </div>
                                <small class="text-muted">فایل های مجاز: JPG و PNG و حداکثر اندازه مجاز: 600KB</small>
                            </div>
                            @error('image')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="custom-file">
                                <label for="video">آدرس ویدئو</label>
                                <input type="text" class="form-control" id="video" name="video" value="{{old('video',$event->video)}}"/>
                                <small>آدرس ویدئو در یکی از پلتفرمهای اشتراک ویدئو مانند آپارات ، یوتیوب و ...</small>
                                @error('video')
                                    <p class="text text-danger" role="alert">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">تاریخ شروع رویداد<span class="text-danger">*</span></label>
                                <input type="text" class="dateInput form-control" id="start_date" name="start_date"  autocomplete="off"  value="{{old('start_date',$event->start_date)}}"/>
                                <small class="text-muted">به عنوان مثال: 1403/01/01</small>
                                @error('start_date')
                                    <p class="text text-danger" role="alert">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="start_date">ساعت شروع رویداد<span class="text-danger">*</span></label>
                                <input type="text" class="time_fa form-control time" id="start_time" name="start_time"  autocomplete="off" value="{{old('start_time',$event->start_time)}}" />
                                <small class="text-muted">به عنوان مثال: 12:12</small>
                                @error('start_time')
                                    <p class="text text-danger" role="alert">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date">تاریخ پایان رویداد<span class="text-danger">*</span></label>
                                <input type="text" class="dateInput form-control" id="end_date" name="end_date"  autocomplete="off" value="{{old('end_date',$event->end_date)}}" />
                                <small class="text-muted">به عنوان مثال: 1403/01/01</small>
                                @error('end_date')
                                    <p class="text text-danger" role="alert">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_time">ساعت پایان رویداد<span class="text-danger">*</span></label>
                                <input type="text" class="time_fa form-control time" id="end_time" name="end_time"  autocomplete="off" value="{{old('end_time',$event->end_time)}}" />
                                <small class="text-muted">به عنوان مثال: 12:12</small>
                                @error('end_time')
                                    <p class="text text-danger" role="alert">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="duration">مدت رویداد<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="duration" name="duration"  autocomplete="off" value="{{old('duration',$event->duration)}}" />
                                <small class="text-muted">مدت زمان رویداد به عنوان مثال: یک ساعت و نیم</small>
                                @error('duration')
                                    <p class="text text-danger" role="alert">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="expire_date">تاریخ پایان ثبت نام<span class="text-danger">*</span></label>
                                <input type="text" class="dateInput form-control" id="expire_date" name="expire_date"  autocomplete="off" value="{{old('expire_date',$event->expire_date)}}" />
                                <small class="text-muted">به عنوان مثال: 1403/01/01</small>
                                @error('expire_date')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <a class="btn btn-outline-secondary d-block mb-2" data-toggle="collapse" href="#collapseEventText" role="button" aria-expanded="false" aria-controls="collapseEventText">
                            توضیحات رویداد <span class="text-danger">*</span>
                        </a>
                        <div class="collapse" id="collapseEventText">
                            <div class="card card-body">
                                <textarea class="form-control" id="event_text" name="event_text">{{old('event_text',$event->event_text)}}</textarea>
                            </div>
                            @error('event_text')
                                <p class="text text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group">
                        <a class="btn btn-outline-secondary d-block mb-2" data-toggle="collapse" href="#collapseheading" role="button" aria-expanded="false" aria-controls="collapseheading">
                            سرفصلها
                        </a>
                        <div class="collapse" id="collapseheading">
                            <div class="card card-body">
                                <textarea class="form-control" id="heading" name="heading">{{old('heading',$event->heading)}}</textarea>
                            </div>
                        </div>
                        @error('heading')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a class="btn btn-outline-secondary d-block mb-2" data-toggle="collapse" href="#collapsecontacts" role="button" aria-expanded="false" aria-controls="collapsecontacts">
                            مخاطبین
                        </a>
                        <div class="collapse" id="collapsecontacts">
                            <div class="card card-body">
                                <textarea class="form-control" id="contacts" name="contacts">{{old('contacts',$event->contacts)}}</textarea>
                            </div>
                        </div>
                        @error('contacts')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a class="btn btn-outline-secondary d-block mb-2" data-toggle="collapse" href="#collapsefaq" role="button" aria-expanded="false" aria-controls="collapsefaq">
                            سوالات متداول
                        </a>
                        <div class="collapse" id="collapsefaq">
                            <div class="card card-body">
                                <textarea class="form-control" id="faq" name="faq">{{old('faq',$event->faq)}}</textarea>
                            </div>
                        </div>
                        @error('faq')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a class="btn btn-outline-secondary d-block mb-2" data-toggle="collapse" href="#collapselinks" role="button" aria-expanded="false" aria-controls="collapselinks">
                            راه های ارتباطی
                        </a>
                        <div class="collapse" id="collapselinks">
                            <div class="card card-body">
                                <textarea class="form-control" id="links" name="links">{{old('links',$event->links)}}</textarea>
                            </div>
                        </div>
                        @error('links')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">بروزرسانی رویداد</button>
                </form>
            </div>
    </div>
@slot('footerScript')
    <script>
        $('#end_date').change(function(){
            if($(this).val()<$('#start_date').val())
            {
                alert('تاریخ درج شده با شروع دوره مطابقت ندارد');
                $(this).val('');
            }
        });
        $('#expire_date').change(function(){
            if($(this).val()>$('#start_date').val())
            {
                alert('تاریخ درج شده با شروع دوره مطابقت ندارد');
                $(this).val('');
            }
        });
    </script>

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
        CKEDITOR.replace( 'event_text',
            {
                language:'fa',
                filebrowserImageBrowseUrl: '/file-manager/ckeditor'
            });

        CKEDITOR.replace( 'heading',
            {
                language:'fa',
                filebrowserImageBrowseUrl: '/file-manager/ckeditor'
            });
        CKEDITOR.replace( 'contacts',
            {
                language:'fa',
                filebrowserImageBrowseUrl: '/file-manager/ckeditor'
            });

        CKEDITOR.replace( 'faq',
            {
                language:'fa',
                filebrowserImageBrowseUrl: '/file-manager/ckeditor'
            });

        CKEDITOR.replace( 'links',
            {
                language:'fa',
                filebrowserImageBrowseUrl: '/file-manager/ckeditor'
            });


    </script>
@endslot
@endcomponent
