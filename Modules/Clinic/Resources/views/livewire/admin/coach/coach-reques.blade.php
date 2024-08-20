@slot('headerScript')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Alpine v3 -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@endslot

<div class="card col-12">
    <div class="card-header">درخواست های همکاری به عنوان کوچ</div>
    <div class="card-body table-responsive">
        <table class="table text-center table-bordered">
            <tr>
                <th></th>
                <th>مشخصات</th>
                <th>تلفن</th>
                <th>تاریخ و ساعت</th>
                <th>توضیحات</th>
                <th> وضعیت</th>
                <th>تغییر وضعیت</th>
                <th>مشاهده</th>
                <th>پیام ها</th>
            </tr>
            @foreach($coachRequests as $coachRequest)

                <tr>
                    <td>
                        @if(is_null($coachRequest->user->personal_image))
                            <img class="profile-user-img   img-circle" style="width:50px" src="/images/users/default-avatar.png"  height="50px" />
                        @else
                            <img class="profile-user-img   img-circle" style="width:50px" src="{{'/documents/users/'.$coachRequest->user->personal_image}}"   height="50px" />
                        @endif
                    </td>
                    <td>{{$coachRequest->user->fname.' '.$coachRequest->user->lname}}</td>
                    <td>
                        <a href="{{route('admin.user.profile',['User'=>$coachRequest->user->id])}}" target="_blank">{{$coachRequest->user->tel}}</a>
                    </td>
                    <td dir="ltr">{{$coachRequest->date_fa.' '.$coachRequest->time_fa}}</td>
                    <td class="text-right">{{$coachRequest->description}}</td>
                    <td>{{$coachRequest->status()}}</td>
                    <td>
                        <form method="post" action="{{route('admin.clinic.coach.requestUpdate',['requestPortal'=>$coachRequest->id])}}">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="submit">اعمال</button>
                                </div>
                                <select class="custom-select" id="inputGroupSelect03" name="status" >
                                    <option selected value="NULL" disabled>انتخاب کنید</option>
                                    @foreach($coachRequest->listStatus() as $key=>$item)
                                        <option value="{{$key}}"  {{$coachRequest->status==$key?'selected':''}}>{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>

                    </td>
                    <td>
                        <button class="btn btn-success" wire:key="{{$coachRequest->user_id}}" wire:click="$emit('openModal', 'clinic::admin.coach-request-modal',{{ json_encode(['User' => $coachRequest->user_id]) }})">مشاهده جزئیات</button>
                    </td>
                    <td>
                        <button class="btn btn-success" wire:key="{{$coachRequest->id}}" wire:click="$emit('openModal', 'clinic::admin.coach.ticket-modal',{{ json_encode(['User' => $coachRequest->user_id,'RequestPortal'=>$coachRequest->id]) }})">پیام ها <span class="badge badge-pill badge-danger">{{$coachRequest->ticketsCoach->where('status',1)->count()}}</span>  </button>
                    </td>


                </tr>
            @endforeach
        </table>
    </div>

</div>
