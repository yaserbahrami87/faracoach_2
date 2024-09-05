@component('masterView::user.master.index')
    @slot('headerScript')
        <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
        <link href="/dashboard/plugins/datatables/jquery.dataTables_themeroller.css" rel="stylesheet" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <!-- Alpine v3 -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endslot

    <div class="col-12 table-responsive">
        <table id="dataTable" class=" table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>کد رزرو</th>
                <th>کد جلسه</th>
                <th>کوچ</th>
                <th scope="col">تاریخ شروع</th>
                <th scope="col">ساعت شروع</th>
                <th scope="col">ساعت پایان</th>
                <th scope="col">وضعیت</th>
                <th></th>


            </tr>
            </thead>

            <tbody>

            @foreach(Auth::user()->reserves as $reserve)
                <tr>

                    <td class="text-center">
                      {{$reserve->id}}
                    </td>
                    <td class="text-center">
                        {{$reserve->booking_id}}
                    </td>
                    <td>
                        {{$reserve->booking->coach->user->fname.' '.$reserve->booking->coach->user->lname}}
                    </td>
                    <td>
                       {{$reserve->booking->start_date}}
                    </td>
                    <td class="text-center">{{$reserve->booking->start_time}}</td>
                    <td class="text-center">{{$reserve->booking->end_time}}</td>
                    <td>
                        {{$reserve->status()}}
                    </td>

                    <td>

                        @if($reserve->booking->start_date>\App\Services\JalaliDate::get_jalaliNow() && $reserve->status==0)
                            <form method="post" action="{{route('user.clinic.reserve.ignore',['Reserve'=>$reserve->id])}}" onsubmit="return window.confirm('آیا از رد جلسه اطمینان دارید؟')">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-warning">رد جلسه</button>
                            </form>
                        @elseif($reserve->booking->start_date>\App\Services\JalaliDate::get_jalaliNow() && $reserve->status==10)
                            <form method="post" action="{{route('user.clinic.reserve.cancel',['Reserve'=>$reserve->id])}}" onsubmit="return window.confirm('آیا لغو رد جلسه اطمینان دارید؟')" >
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <button class="btn btn-warning">لغو جلسه</button>
                            </form>
                        @elseif($reserve->booking->start_date<\App\Services\JalaliDate::get_jalaliNow() && $reserve->booking->status==2)
                            @if(!is_null($reserve->rate)&&is_null($reserve->feedback) )
                                <button class="btn btn-outline-dark" wire:key="{{$reserve->id}}" onclick="Livewire.emit('openModal', 'clinic::user.insert-comment',{{ json_encode(['reserve' => $reserve->id]) }})">
                                    ثبت تجربه
                                </button>
                            @else
                                تجربه ثبت شده است
                            @endif
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @slot('footerScript')


        <script src="/dashboard/plugins/datatables/jquery.dataTables.js"></script>
        <script src="/dashboard/plugins/datatables/dataTables.bootstrap4.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    order: [[1, 'desc']],
                });
            } );
        </script>


    @endslot
@endcomponent
