@component('masterView::user.master.index')
    @slot('headerScript')
        <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
        <link href="/dashboard/plugins/datatables/jquery.dataTables_themeroller.css" rel="stylesheet" />
    @endslot

    <div id="app" class="col-12 card">
        <div class="card-header">اختصاص وقت جدید</div>
        <div class="card-body">
            <form method="post" action="{{route('user.clinic.booking.store')}}" id="formBooking">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-12 col-md-4">
                        <date-picker
                            type="date"
                            v-model="dates"
                            multiple
                            format="jYYYY-jMM-jDD"
                            display-format="jYYYY/jMM/jDD"
                            :disable="[]"
                            name="start_date"
                            min="{{\App\Services\JalaliDate::get_jalaliNow()}}"
                        ></date-picker>
                    </div>
                    <div class="col-12 col-md-4">
                        <date-picker
                            v-model="time"
                            type="time"
                            jump-minute="10"
                            :round-minute=true
                            name="start_time"
                            value="{{old('start_time')}}"
                        ></date-picker>
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-success">ایجاد رزرو</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="col-12 table-responsive">
        <table id="dataTable" class=" table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>کد جلسه</th>
                <th scope="col">تاریخ شروع</th>
                <th scope="col">ساعت شروع</th>
                <th scope="col">ساعت پایان</th>
                <th scope="col">وضعیت</th>
                <th></th>


            </tr>
            </thead>

            <tbody>
            @foreach(Auth::user()->coach->bookings as $booking)
                <tr>
                    <td class="text-center">
                       {{$booking->id}}
                    </td>
                    <td>
                        {{$booking->start_date}}
                    </td>
                    <td class="text-center">{{$booking->start_time}}</td>
                    <td class="text-center">{{$booking->end_time}}</td>
                    <td>{{$booking->status()}}</td>

                    <td>
                        @if((($booking->start_date>\App\Services\JalaliDate::get_jalaliNow())&&(($booking->status)==0)))
                            <form method="post" action="{{route('user.clinic.booking.destroy',['booking'=>$booking->id])}}" onsubmit="return confirm('آیا از حذف زمان رزرو اطمینان دارید؟');">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button  class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        @elseif($booking->start_date>\App\Services\JalaliDate::get_jalaliNow() && ($booking['status']!=4) && ($booking->status==1))
                            <form method="POST" action="{{route('user.clinic.booking.statusAfterReserve',['booking'=>$booking->id])}}" >
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
                        @elseif($booking->start_date>\App\Services\JalaliDate::get_jalaliNow() && $booking->status==10)
                            <form method="post" action="{{route('user.clinic.booking.cancel',['booking'=>$booking->id])}}" onsubmit="return window.confirm('آیا لغو رد جلسه اطمینان دارید؟')" >
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <button class="btn btn-warning">لغو جلسه</button>
                            </form>
                        @elseif($booking->start_date<\App\Services\JalaliDate::get_jalaliNow() && $booking->status==10)
                            <form method="POST" action="{{route('user.clinic.booking.assignment',['booking'=>$booking->id])}}" >
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
            </tbody>
        </table>
    </div>

    @slot('footerScript')
        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment-jalaali@0.7.4/build/moment-jalaali.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue-persian-datetime-picker/dist/vue-persian-datetime-picker-browser.js"></script>
        <script>
            var app = new Vue({
                el: '#app',
                components: {
                    DatePicker: VuePersianDatetimePicker
                },
                data: {
                    time:"{{old('time')}}",
                    dates: [],
                    message:'asdasdasd'
                }

            });


        </script>

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
