@component('masterView::admin.master.index')
    @slot('headerScript')
        <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
        <link href="/dashboard/plugins/datatables/jquery.dataTables_themeroller.css" rel="stylesheet" />
    @endslot

    <div class="col-12">
        <div class="card">
            <div class="card-header">لیست شرکننده های {{$event->event}}</div>
            <div class="card-body">
                <a  class="btn btn-primary mb-3" href="{{route('admin.event.participant.create',['event'=>$event->shortlink])}}">اضافه کردن شرکت کننده</a>
                <!-- DataTables -->
                <table id="example" class="table table-bordered table-striped" wire:loading.remove >
                    <thead>
                        <tr>
                            <th></th>
                            <th>نام و نام خانوادگی</th>
                            <th>شماره همراه</th>
                            <th>تاریخ</th>
                            <th>ساعت</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody >

                    @foreach($event->participants as $participant)

                        <tr>
                            <td>
                                @if(is_null($participant->user->personal_image))
                                    <img src="/images/users/default-avatar.png" width="50px" height="50px" class="rounded-circle" />
                                @else
                                    <img src="/documents/users/{{$user->personal_image}}" width="50px" height="50px" class="rounded-circle" />
                                @endif
                            </td>
                            <td>{{$participant->user->fname.' '.$participant->user->lname}}</td>
                            <td dir="ltr">
                                <a href="{{route('admin.user.profile',['User'=>$participant->user->id])}}" target="_blank">{{$participant->user->tel}}</a>
                            </td>
                            <td>{{$participant->date_fa}}</td>
                            <td>{{$participant->time_fa}}</td>
                            <td>
                                <form method="post" action="{{route('admin.event.participant.destroy',['EventParticipants'=>$participant->id])}}" onsubmit="return window.confirm('آیا از حذف این کاربر مطمئن هستید؟')">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-sm btn-danger">حذف</button>
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
                            <th>تاریخ</th>
                            <th>ساعت</th>
                            <th>حذف</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @slot('footerScript')
        <script src="/dashboard/plugins/datatables/jquery.dataTables.js"></script>
        <script src="/dashboard/plugins/datatables/dataTables.bootstrap4.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
    @endslot

@endcomponent

