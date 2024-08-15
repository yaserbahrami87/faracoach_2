@component("masterView::admin.master.index")
    @slot('headerScript')
        <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
        <link href="/dashboard/plugins/datatables/jquery.dataTables_themeroller.css" rel="styleshee" />
    @endslot
    <div class="col-12">
        <div class="card">
            <div class="card-header">لیست دوره ها</div>
            <div class="card-body table-responsive">
                <table class="table" id="myTable">
                    <thead>
                    <tr>
                        <th>نام دوره</th>
                        <th>مدرس/مدرسین</th>
                        <th>تعداد دانشجو</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Courses as $Course)
                        <tr>
                            <td>{{$Course->course}}</td>
                            <td>
                                @foreach($Course->teachers as $teacher)
                                   <p>{{$teacher->user->fname.' '.$teacher->user->lname}}</p>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('admin.course.students.course',['Course'=>$Course->shortlink])}}" class="btn btn-outline-primary">{{$Course->students->count()}}</a>

                            </td>
                            <td>
                                {{($Course->status==1)?"فعال":"غیرفعال"}}
                            </td>
                            <td>
                                <a href="{{route('admin.course.edit',['Course'=>$Course->shortlink])}}" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.course.delete',['Course'=>$Course->shortlink])}}" onsubmit="return window.confirm('آیا از حذف استاد اطمینان دارید؟')">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-outline-danger">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
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
        <script src="/dashboard/plugins/datatables/jquery.dataTables.js"></script>
        <script src="/dashboard/plugins/datatables/dataTables.bootstrap4.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            } );
        </script>
    @endslot
@endcomponent
