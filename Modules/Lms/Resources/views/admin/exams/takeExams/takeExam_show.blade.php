@component('masterView::admin.master.index')
    <div class="col-12">
        <div class="card border">
            <div class="card-header">لیست جواب های  <a href="{{route('admin.user.profile',['User'=>$ExamTake->user->id])}}" >{{$ExamTake->user->fname.' '.$ExamTake->user->lname}}</a> برای {{$ExamTake->exam->exam}}</div>
            <div class="card-body table-responsive">
                <table class="table table-striped" id="example">
                    <thead>
                    <tr class="text-center">
                        <th>ردیف</th>
                        <th>سوال</th>
                        <th>نمره </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($ExamTake->exam->questions->where('is_question',1) as $question)
                        <tr class="text-center">
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <b>
                                    <img src="/icons/question-chat-svgrepo-com.svg" width="25px">
                                    {{$question->title}}
                                </b>
                                @foreach($question->answers as $answer)

                                    <p class="m-0 @if(($answer->result_user->count()>0)) bg-warning @endif ">
                                        @if($answer->is_correct)
                                            <img src="/icons/correct-success-tick-svgrepo-com.svg" width="25px">
                                        @else
                                            <img src="/icons/wrong-mark-svgrepo-com.svg" width="25px">
                                        @endif

                                        {{--
                                        @if(($answer->result_user->count()>0))
                                            {{('###'.$answer->result_user->where('user_id',$ExamTake->user_id)->first()['user_id'])}}
                                        @endif
                                        --}}
                                        {{$answer->title}}

                                    </p>
                                @endforeach

                            </td>
                            <td>{{$question->score}}</td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endcomponent
