@slot('headerScript')
    <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
    <link href="/dashboard/plugins/datatables/jquery.dataTables_themeroller.css" rel="stylesheet" />
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endslot

    <div class="card col-12 table-responsive" >
        <div class="card-header">        لیست رویدادها    </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th></th>
                    <th>رویداد</th>
                    <th>تاریخ رویداد</th>
                    <th>ساعت رویداد</th>
                    <th>برگزار کننده</th>
                    <th>فعال/غیرفعال</th>
                    <th>وضعیت</th>
                    <th>ویرایش</th>
                    <th> شرکت کننده ها</th>

                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>

                @foreach($events as $item)

                    <tr>
                        <td>
                            <a href="{{asset('/event/'.$item->shortlink)}}">
                                <img src="{{$item->image}}" class="img-circle"  width="50px" height="50px"/>
                            </a>
                        </td>
                        <td>
                            <a href="{{asset('/event/'.$item->shortlink)}}">
                                {{$item->event}}
                            </a>
                        </td>
                        <td>
                            <a href="{{asset('/event/'.$item->shortlink)}}">
                                {{$item->start_date}}
                            </a>
                        </td>
                        <td>
                            <a href="{{asset('/event/'.$item->shortlink)}}">
                                {{$item->start_time}}
                            </a>
                        </td>
                        <td>
                            @foreach($item->eventOrganizers as $organizer)
                                <p>{{$organizer->user->fname.' '.$organizer->user->lname}}</p>
                            @endforeach
                        </td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" title="{{$item->shortlink}}"  wire:change="changeStatus('{{$item->shortlink}}')" {{($item->status==1)?'checked':''}}  />
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            @if(\App\Services\JalaliDate::get_jalaliNow()<=$item->expire_date)
                                در حال ثبت نام
                            @else
                                برگزار شد
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/admin/event/{{$item->shortlink}}/edit" class="btn btn-warning" title="ویرایش رویداد" >
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/admin/event/{{$item->shortlink}}/users" class="btn btn-success" title="افراد شرکت کننده ها" >
                                <i class="bi bi-people-fill" ></i>
                            </a>
                        </td>

                        <td class="text-center">
                            <form method="post" action="/admin/event/{{$item->shortlink}}" onsubmit="return confirm('آیا از حذف رویداد مطمئن هستید؟');">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button  class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
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

