@component("masterView::admin.master.index")

    <div class="col-md-8 mx-auto ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">اضافه کردن نوع دوره</h5>
            </div>
            <div class="card-body">
                <form method="post"  action="{{route('admin.course.coursetype.update',['CourseType'=>$CourseType->shortlink])}}" >
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label for="type">نوع دوره</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{old('type',$CourseType->type)}}" />
                        <small>نباید تکراری باشد</small>
                        @error('type')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="shortlink">شورت لینک</label>
                        <input type="text" class="form-control" id="shortlink" name="shortlink" value="{{old('shortlink',$CourseType->shortlink)}}" />
                        <small>نباید تکراری باشد</small>
                        @error('shortlink')
                        <p class="text text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">وضعیت</label>
                        <select id="status" class="form-control p-0" name="status" value="{{old('status',$CourseType->status)}}">
                            <option selected value="NULL">انتخاب کنید</option>
                            <option value="1" {{old('status',$CourseType->status)==1?"selected":''}}>نمایش</option>
                            <option value="0" {{old('status',$CourseType->status)==0?"selected":''}}>عدم نمایش</option>
                        </select>
                        @error('status')
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
@endcomponent
