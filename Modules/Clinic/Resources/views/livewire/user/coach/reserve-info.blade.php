<div class="card text-right" dir="rtl">
    <div class="card-header">اطلاعات رزرو جلسه کد رزرو {{$reserve->id}}</div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <p>موضوع جلسه:{{$reserve->subject}}</p>
                <p>توضیحات جلسه:{{$reserve->description}}</p>
                <p>نوع جلسه:{{($reserve->clinicCategory->title)}}</p>
                <p>نوع رزرو:@if($reserve->type_booking==0)فرقی نمی کند@elseif($reserve->type_booking==1)آنلاین@elseif($reserve->type_booking==2)حضوری@endif</p>
                <p>تاریخ رزرو:{{$reserve->date_fa}}</p>

            </div>
            <div class="col-12 col-md-6">
                <p>قیمت جلسه:{{number_format($reserve->fi)}} تومان</p>
                <p>کوپن تخفیف:{{($reserve->coupon)}}</p>
                <p>میزان تخفیف:{{($reserve->off.' '.$reserve->type_discount)}}</p>
                <p>قیمت نهایی:{{number_format($reserve->final_fi)}}تومان</p>
                <p>ساعت رزرو:{{$reserve->time_fa}}</p>
            </div>
            <div class="col-12">

            </div>
        </div>
    </div>
</div>
