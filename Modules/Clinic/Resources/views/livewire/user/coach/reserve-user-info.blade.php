<div class="card text-right" dir="rtl" class="">
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
</div>
