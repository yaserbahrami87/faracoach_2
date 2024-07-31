<div wire:init="loadStudents" class="table-responsive col-12" >
    <div class="card">
        <div class="card-header">لیست دانشجویان</div>
        <div class="card-body">
            <div class="row">

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>دسته بندی:</label>
                        <select class="form-control select2" style="width: 100%;" wire:model.change="course">
                            <option value="NULL" selected>انتخاب کنید</option>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->course}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>وضعیت:</label>
                        <select class="form-control select2" style="width: 100%;" wire:model.change="status_selected">
                            <option value="NULL" selected>انتخاب کنید</option>
                            @foreach($status as $key=>$item)
                                <option value="{{$key}}">{{$item}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>


        @if($readyToLoad)
            <!-- DataTables -->
                <table id="example1" class="table table-bordered table-striped" wire:loading.remove >
                    <thead>
                    <tr>
                        <th></th>
                        <th>نام و نام خانوادگی</th>
                        <th>شماره همراه</th>
                        <th>دوره</th>
                        <th>تاریخ ثبت نام</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody >

                    @foreach($students as $student)
                        <tr>
                            <td>
                                @if(is_null($student->user->personal_image))
                                    <img src="/images/users/default-avatar.png" width="50px" height="50px" class="rounded-circle" />
                                @else
                                    <img src="/images/users/{{$student->user->personal_image}}" width="50px" height="50px" class="rounded-circle" />
                                @endif
                            </td>
                            <td>{{$student->user->fname.' '.$student->user->lname}}</td>
                            <td dir="ltr">
                                <a href="{{route('admin.user.profile',$student->user->id)}}">{{$student->user->tel}}</a>
                            </td>
                            <td>
                                {{$student->course->course}}
                            </td>
                            <td>
                                {{$student->date_fa}}
                            </td>
                            <td>
                                {{$student->get_status()}}
                            </td>
                            <td>
                                <a href="{{route('admin.course.student.edit',['Student'=>$student->id])}}" class="btn btn-outline-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.course.student.delete',['Student'=>$student->id])}}" onsubmit="return window.confirm('آیا از حذف دانشجو اطمینان دارید؟')">
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
                    <tfoot>
                    <tr>
                        <th></th>
                        <th>نام و نام خانوادگی</th>
                        <th>شماره همراه</th>
                        <th>دوره</th>
                        <th>تاریخ ثبت نام</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    </tfoot>
                </table>
            @else
                <svg  class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
                    <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
                    <circle cx="170" cy="170" r="135" stroke="#404041"/>
                    <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
                    <circle cx="170" cy="170" r="85" stroke="#404041"/>
                </svg>
            @endif

            <div wire:loading >
                <svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
                    <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
                    <circle cx="170" cy="170" r="135" stroke="#404041"/>
                    <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
                    <circle cx="170" cy="170" r="85" stroke="#404041"/>
                </svg>
            </div>
        </div>
        </div>
    </div>



<script>
    window.addEventListener('dataTable',()=>
    {
        let head = document.getElementsByTagName('HEAD')[0];

        let link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = '/dashboard/plugins/dataTables2/css/dataTables.dataTables.css';
        head.appendChild(link);

        let link2 = document.createElement('link');
        link2.rel = 'stylesheet';
        link2.href = '/dashboard/plugins/datatables/jquery.dataTables_themeroller.css';
        head.appendChild(link2);

        let link3 = document.createElement('link');
        link3.rel = 'stylesheet';
        link3.href = '/dashboard/plugins/datatables/dataTables.bootstrap4.css';
        head.appendChild(link3);

        let link1 = document.createElement('script');
        link1.src='/dashboard/plugins/datatables/jquery.dataTables.js';
        head.appendChild(link1);

        $("#example1").DataTable();
    });
</script>


