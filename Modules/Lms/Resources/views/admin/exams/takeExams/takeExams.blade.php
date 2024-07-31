@component('masterView::admin.master.index')
    @slot('headerScript')
        <link href="/dashboard/plugins/dataTables2/css/dataTables.dataTables.css" rel="stylesheet" />
    @endslot

    <div class="col-12 table-responsive">
        <div class="card">
            <div class="card-header">لیست جواب آزمون ها</div>
            <div class="card-body">
            <table class="table table-striped" id="example">
                <thead>
                    <tr class="text-center">
                        <th></th>
                        <th>شرکت کننده</th>
                        <th>آزمون</th>
                        <th>نمره</th>
                        <th>وضعیت</th>
                        <th>نمایش آزمون</th>
                        <th>تغییر وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($ExamTakes as $Examtake)

                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a href="{{route('admin.user.profile',['User'=>$Examtake->user->id])}}">{{$Examtake->user->fname.' '.$Examtake->user->lname}}</a>
                            </td>
                            <td>{{$Examtake->exam->exam}}</td>
                            <td>{{$Examtake->score}} از {{$Examtake->exam->pass}}</td>

                            @if($Examtake->status==0)
                                <td class="text-danger">
                                    رد شده
                                </td>
                            @elseif($Examtake->status==1)
                                <td class="text-warning">
                                    قبول در انتظار تایید
                                </td>
                            @elseif($Examtake->status==2)
                                <td class="text-success">
                                    قبول
                                </td>
                            @endif
                            <td>
                                <a href="{{route('admin.course.exam.take.show',['ExamTake'=>$Examtake->id])}}" class="btn btn-success">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.course.exam.take.update',['ExamTake'=>$Examtake->id])}}">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="submit">اعمال</button>
                                        </div>
                                        <select class="custom-select" id="status" name="status">
                                            <option selected disabled>انتخاب کنید</option>
                                            <option value="0" @if($Examtake->status==0) selected @endif >رد شده</option>
                                            <option value="1" @if($Examtake->status==1) selected @endif >قبول در انتظار تایید</option>
                                            <option value="2" @if($Examtake->status==2) selected @endif >قبول شده</option>
                                        </select>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @slot('footerScript')
        <script src="/dashboard/plugins/dataTables2/js/dataTables.js"></script>
        <script>
            $("#example").DataTable();
        </script>
    @endslot
@endcomponent
