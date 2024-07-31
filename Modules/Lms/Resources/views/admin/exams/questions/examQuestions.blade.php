@component('masterView::admin.master.index')
    <div class="col-12">
        <div class="card">
            <div class="card-header">سوالات آزمون  <a href="{{route('admin.course.exam.questions',['Exam'=>$Exam->exam])}}">{{$Exam->exam}}</a> </div>
            <div class="card-body">
                <a href="{{route('admin.course.exam.question.create',['Exam'=>$Exam->exam])}}" class="btn btn-outline-primary mb-3">ایجاد سوال</a>
                <table class="table table-striped">
                    <tr class="text-center">
                        <th>ردیف</th>
                        <th>سوال</th>
                        <th>نمره </th>
                        <th>ویرایش </th>
                        <th>حذف </th>
                    </tr>

                    @foreach($Exam->questions->where('is_question',1) as $question)
                        <tr class="text-center">
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <b>
                                    <img src="/icons/question-chat-svgrepo-com.svg" width="30px" />
                                    {{$question->title}}
                                </b>
                                @foreach($question->answers as $answer)
                                    <p class="m-0 @if($answer->is_correct) text-success @else text-danger @endif">
                                        @if($answer->is_correct)
                                            <img src="/icons/correct-success-tick-svgrepo-com.svg" width="25px" />
                                        @else
                                            <img src="/icons/wrong-mark-svgrepo-com.svg" width="25px" />
                                        @endif
                                        {{$answer->title}}

                                    </p>
                                @endforeach

                            </td>
                            <td>{{$question->score}}</td>
                            <td>
                                <a href="{{route('admin.course.exam.question.edit',['Exam'=>$Exam->exam,'ExamQuestion'=>$question->id])}}">
                                    <img src="/icons/edit-svgrepo-com.svg" width="30px" />
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.course.exam.question.delete',['Exam'=>$Exam,'ExamQuestion'=>$question->id])}}" onsubmit="return window.confirm('آیا از حذف سوال اطمینان دارید؟')">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endcomponent
