@component('masterView::admin.master.index')
    <div class="col-12 col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">ویرایش سوال <a href="{{route('admin.course.exam.questions',['Exam'=>$Exam])}}">{{$Exam->exam}}</a> </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.course.exam.question.update',['Exam'=>$Exam,'ExamQuestion'=>$ExamQuestion])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}

                    <div class="form-group">

                        <label for="title">سوال مورد نظر را وارد کنید<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title',$ExamQuestion->title)}}">
                        @error('title')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    @foreach($ExamQuestion->answers as $answer)
                        <div class="form-group">
                            <label for="answer{{$loop->iteration}}">گرینه {{$loop->iteration}}:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="answer{{$loop->iteration}}" name="answer{{$loop->iteration}}" value="{{old('answer'.$loop->iteration,$answer->title)}}">
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label class="form-check-label" for="correct">جواب صحیح:<span class="text text-danger">*</span></label>
                        @error('correct')
                            <p class="text text-danger" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    @foreach($ExamQuestion->answers as $answer)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="correct" id="radio_answer{{$loop->iteration}}" value="{{$loop->iteration}}" @if(old('correct',$answer->is_correct)==1) checked @endif >
                            <label class="form-check-label" for="radio_answer{{$loop->iteration}}">گزینه {{$loop->iteration}}</label>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label for="title">نمره سوال:<span class="text-danger">*</span></label>
                        <input type="number" min="0" max="100" class="form-control" id="score" name="score" value="{{old('score',$ExamQuestion->score)}}">
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
