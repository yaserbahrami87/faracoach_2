@component("masterView::admin.master.index")
    @slot('headerScript')
        <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.css" />
        <link href="/dashboard/plugins/datatables/jquery.dataTables_themeroller.css" />
    @endslot
    <div class="col-12">
        <div class="card">
            <div class="card-header">لیست دانشجوهای دوره {{$Course->course}} </div>
            <div class="card-body table-responsive">
                <table class="table" id="myTable">
                    <thead>
                    <tr>
                        <th>مشخصات</th>
                        <th>شماره همراه</th>
                        <th>تاریخ ثبت نام</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>
                        <th>حذف از دوره</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Course->students as $Student)

                        <tr>

                            <td>
                                {{$Student->user->fname.' '.$Student->user->lname}}
                            </td>
                            <td>
                                <a href="{{route('admin.user.profile',['User'=>$Student->user->id])}}" target="_blank">{{$Student->user->tel}}</a>
                            </td>
                            <td>{{$Student->date_fa.' '.$Student->time_fa}}</td>
                            <td>
                                {{($Student->get_status())}}
                            </td>
                            <td>
                                <a href="{{route('admin.course.student.edit',['Student'=>$Student->id])}}" class="btn btn-outline-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.course.student.delete',['Student'=>$Student->id])}}" onsubmit="return window.confirm('آیا از حذف دانشجو اطمینان دارید؟')">
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
