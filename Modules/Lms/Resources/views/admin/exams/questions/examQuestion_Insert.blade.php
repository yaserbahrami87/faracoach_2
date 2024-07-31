@component('masterView::admin.master.index')
    <div class="col-12 col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">ایجاد سوال<a href="{{route('admin.course.exam.questions',['Exam'=>$Exam])}}">{{$Exam->exam}}</a></div>
            <div class="card-body">
                <form method="post" action="{{route('admin.course.exam.question.insert',['Exam'=>$Exam])}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="title">سوال مورد نظر را وارد کنید<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        @error('title')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="answer1">گرینه اول:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="answer1" name="answer1" value="{{old('answer1')}}">
                        @error('answer1')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="answer2">گرینه دوم:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="answer2" name="answer2" value="{{old('answer2')}}">
                        @error('answer2')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="answer3">گرینه سوم:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="answer3" name="answer3" value="{{old('answer3')}}">
                        @error('answer3')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="answer4">گرینه چهارم:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="answer4" name="answer4" value="{{old('answer4')}}">
                        @error('answer4')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-check-label" for="correct">جواب صحیح:<span class="text text-danger">*</span></label>
                        @error('correct')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="correct" id="radio_answer1" value="1" @if(old('correct')==1) checked @endif >
                        <label class="form-check-label" for="radio_answer1">گزینه اول</label>

                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="correct" id="radio_answer2" value="2" @if(old('correct')==2) checked @endif>
                        <label class="form-check-label" for="radio_answer2">گزینه دوم</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="correct" id="radio_answer3" value="3" @if(old('correct')==3) checked @endif>
                        <label class="form-check-label" for="radio_answer3">گزینه سوم</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="correct" id="radio_answer4" value="4" @if(old('correct')==4) checked @endif>
                        <label class="form-check-label" for="radio_answer4">گزینه چهارم</label>
                    </div>
                    <div class="form-group">
                        <label for="title">نمره سوال:<span class="text-danger">*</span></label>
                        <input type="number" min="0" max="100" class="form-control" id="score" name="score" value="{{old('score')}}">
                        @error('score')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <button class="btn btn-success d-block mt-3" type="submit">ذخیره سوال</button>
                </form>
            </div>
        </div>

    </div>
@endcomponent
