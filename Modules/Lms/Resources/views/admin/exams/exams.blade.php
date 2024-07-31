@component('masterView::admin.master.index')
    <div class="col-12 table-responsive">
        <div class="card">
            <div class="card-header">لیست آزمون ها</div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th>نام آزمون</th>
                        <th>تعداد سوال</th>
                        <th>نمره قبولی</th>
                        <th>تعداد سوالات</th>
                        <th>ایجاد کننده</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    @foreach($exams as $exam)
                        <tr>
                            <td>{{$exam->exam}}</td>
                            <td>{{$exam->questions->count()}}</td>
                            <td>{{$exam->pass}}</td>
                            <td>
                                <a href="{{route('admin.course.exam.questions',['Exam'=>$exam->exam])}}" class="btn btn-outline-primary">سوالات</a>
                            </td>
                            <td></td>
                            <td>
                                <a href="{{route('admin.course.exam.edit',['Exam'=>$exam->exam])}}" >
                                    <img src="/icons/edit-svgrepo-com.svg" width="30px" />
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.course.exam.delete',['Exam'=>$exam->exam])}}" onsubmit="return window.confirm('آیا از حذف آزمون اطمینان دارید؟')" >
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-outline-danger" type="submit">
                                        <i class="bi bi-trash3-fill"></i>
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

