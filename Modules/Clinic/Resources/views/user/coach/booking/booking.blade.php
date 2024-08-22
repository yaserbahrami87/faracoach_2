@component('masterView::user.master.index')
    <div id="app" class="col-12 card">
        <div class="card-header">اختصاص وقت جدید</div>
        <div class="card-body">
            <form method="post" action="/panel/booking" id="formBooking">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-12 col-md-4">
                        <date-picker
                            type="date"
                            v-model="dates"
                            multiple
                            format="jYYYY-jMM-jDD"
                            display-format="jYYYY/jMM/jDD"
                            :disable="[{{$roozha}}]"
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
                        ></date-picker>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">ایجاد رزرو</button>
            </form>
        </div>
    </div>
@endcomponent
