@component("masterView::admin.master.index")
    @slot('headerScript')
        <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.css" />
        <link href="/dashboard/plugins/datatables/jquery.dataTables_themeroller.css" />
    @endslot
    <div class="col-12">
        <div class="card">
            <div class="card-header">بخش بندی دوره ها</div>
            <div class="card-body table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>دسته بندی</th>
                            <th>وضعیت</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courseTypes as $courseType)
                            <tr>
                                <td>{{$courseType->type}}</td>
                                <td>
                                    {{($courseType->status==1)?"فعال":"غیرفعال"}}
                                </td>
                                <td>
                                    <a href="{{route('admin.course.coursetype.edit',['CourseType'=>$courseType->shortlink])}}" class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="post" action="{{route('admin.course.coursetype.delete',['CourseType'=>$courseType->shortlink])}}" onsubmit="return window.confirm('آیا از حذف دسته بندی اطمینان دارید؟')">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger">
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
