@component('masterView::user.master.index')
    @slot('headerScript')
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <!-- Alpine v3 -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
        <link href="/dashboard/plugins/datatables/jquery.dataTables_themeroller.css" rel="stylesheet" />

    @endslot
    <div class="col-12 table-responsive">
        <table id="dataTable" class=" table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>کد رزرو</th>
                <th>کد جلسه</th>
                <th>تاریخ رزرو</th>
                <th>رزرو کننده</th>
                <th scope="col">تاریخ شروع</th>
                <th scope="col">ساعت شروع</th>
                <th scope="col">وضعیت</th>
                <th>جزئیات</th>
                <th>سابقه جلسات</th>
                <th></th>



            </tr>
            </thead>

            <tbody>
            @foreach(Auth::user()->coach->bookings as $booking)
                @if($booking->reserves->count()>0)
                    @foreach($booking->reserves as $reserve)
                        <tr>
                            <td class="text-center">
                                {{$reserve->id}}
                            </td>
                            <td>
                                {{$reserve->booking_id}}
                            </td>
                            <td>{{$reserve->date_fa}}</td>
                            <td>
                                <button class="btn btn-outline-dark" wire:key="{{$reserve->id}}" onclick="Livewire.emit('openModal', 'clinic::user.coach.reserve-user-info',{{ json_encode(['Reserve' => $reserve->id]) }})">
                                    {{$reserve->user->fname.' '.$reserve->user->lname}}
                                </button>
                            </td>
                            <td>
                                {{$reserve->booking->start_date}}
                            </td>
                            <td class="text-center">{{$reserve->booking->start_time}}</td>
                            <td>{{$reserve->status()}}</td>
                            <td>

                                <button class="btn btn-success" wire:key="{{$reserve->id}}" onclick="Livewire.emit('openModal', 'clinic::user.coach.reserve-info',{{ json_encode(['reserve' => $reserve->id]) }})">
                                    مشاهده
                                </button>
                            </td>
                            <td></td>
                            <td>
                                @if($reserve->booking->start_date>\App\Services\JalaliDate::get_jalaliNow() && ($reserve->status==0) && ($reserve->booking->status==1))
                                    <form method="POST" action="{{route('user.clinic.booking.statusAfterReserve',['booking'=>$reserve->booking->id])}}" >
                                        {{csrf_field()}}
                                        {{method_field('PATCH')}}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary" type="submit">اعمال</button>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect03" name="status">
                                                <option selected disabled>انتخاب کنید</option>
                                                <option value="10">تائید جلسه</option>
                                                <option value="11">رد جلسه</option>
                                            </select>
                                        </div>
                                    </form>
                                @elseif($reserve->booking->start_date>\App\Services\JalaliDate::get_jalaliNow() && $reserve->booking->status==10)
                                    <form method="post" action="{{route('user.clinic.booking.cancel',['booking'=>$reserve->booking->id])}}" onsubmit="return window.confirm('آیا لغو رد جلسه اطمینان دارید؟')" >
                                        {{csrf_field()}}
                                        {{method_field('PATCH')}}
                                        <button class="btn btn-warning">لغو جلسه</button>
                                    </form>
                                @elseif($reserve->booking->start_date<\App\Services\JalaliDate::get_jalaliNow() && $reserve->booking->status==10)
                                    <form method="POST" action="{{route('user.clinic.booking.assignment',['booking'=>$reserve->booking->id])}}" >
                                        {{csrf_field()}}
                                        {{method_field('PATCH')}}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary" type="submit">اعمال</button>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect03" name="status">
                                                <option selected disabled>انتخاب کنید</option>
                                                <option value="2">برگزارشد</option>
                                                <option value="3">لغو توسط مراجع</option>
                                                <option value="4">لغو توسط کوچ</option>
                                                <option value="5">غیبت مراجع</option>
                                                <option value="6">غیبت کوچ</option>
                                            </select>
                                        </div>
                                    </form>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                @endif
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
