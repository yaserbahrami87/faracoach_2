<div class="card text-right" dir="rtl">
    <div class="card-header">اطلاعات رزرو کننده</div>
    <div class="card-body">
        <div class="media">
            @if(is_null($reserve->user->personal_image))
                <img class="profile-user-img img-fluid img-circle" src="/images/users/default-avatar.png" style="width:75px;height:75px"/>
            @else
                <img class="profile-user-img img-fluid img-circle" src="{{'/documents/users/'.$reserve->user->personal_image}}" style="width:75px;height:75px" />
            @endif
            <div class="media-body p-2">
                <h5 class="mt-0 mb-1">{{$reserve->user->fname.' '.$reserve->user->lname}}</h5>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p>متولد:{{$reserve->user->datebirth}}</p>
                        <p>جنسیت:{{($reserve->user->sex?'مرد':'زن')}}</p>
                        <p>تحصیلات:{{$reserve->user->education}}</p>
                        <p>شغل:{{$reserve->user->job}}</p>

                    </div>
                    <div class="col-12 col-md-6">
                        <p>
                            <i class="bi bi-telephone"></i>
                            <a href="tel:{{$reserve->user->tel}}">{{$reserve->user->tel}}</a>

                        </p>
                        <p>
                            <i class="bi bi-envelope"></i>
                            <a href="mailto:{{$reserve->user->email}}">{{$reserve->user->email}}</a>
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div>




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
