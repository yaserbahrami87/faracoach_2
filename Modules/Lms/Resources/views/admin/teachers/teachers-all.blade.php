@component("masterView::admin.master.index")
    @slot('headerScript')
        <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.css" />
        <link href="/dashboard/plugins/datatables/jquery.dataTables_themeroller.css" />
    @endslot
    <div class="col-12">
        <div class="card">
            <div class="card-header">لیست اساتید</div>
            <div class="card-body table-responsive">
                <table class="table" id="myTable">
                    <thead>
                    <tr>
                        <th>مشخصات</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)

                        <tr>
                            <td>{{$teacher->user->fname.' '.$teacher->user->lname}}</td>
                            <td>
                                {{($teacher->status==1)?"فعال":"غیرفعال"}}
                            </td>
                            <td>
                                <a href="{{route('admin.course.teacher.edit',['Teacher'=>$teacher->id])}}" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.course.teacher.delete',['Teacher'=>$teacher->id])}}" onsubmit="return window.confirm('آیا از حذف استاد اطمینان دارید؟')">
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
