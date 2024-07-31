<div >
    @if($readyToLoad)
        @if($User->followups->count()>0)
            <div class="card card-user">
                <div class="card-header border-bottom bg-info">
                    <h5 class="card-title">پیگیری ها {{$User->followups->count()}}  عدد </h5>
                </div>
                <div class="card-body">
                        <div class="row">

                            @if(!is_null($User->followups->groupby('course_id')))
                                @foreach($User->followups->groupby('course_id') as $item)

                                    <div class="col-4">
                                        <div class="card text-white border border-3 border-danger  p-1" style="min-height: 70px">
                                        <span class="text-dark ">
                                            <i class="bi bi-book-fill ml-2"></i>
                                            {{$item[0]->course['course']}}
                                        </span>
                                            <span class="text-dark"><i class="bi bi-signpost ml-2"></i>{{$item->count()}} پیگیری</span>
                                            <span class="text-dark"><i class="bi bi-stopwatch ml-2"></i>{{$item->sum('talktime')}} دقیقه مکالمه</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @php
                            $i=$User->followups->count();
                        @endphp

                        @foreach($User->followups as $item)

                            <div class="row" style="border-radius: 20px 20px 0px 0px;border:5px solid {{!is_null($item->problemfollowup_id) ? $item->problemFollowup->color : '' }}; sborder-bottom:0px;">
                                <div class="col-12">
                                    <div class="row px-1">
                                        <div class="col-md-12 p-0 pt-1 text-center">
                                            <h6>پیگیری {{$i--}}</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>دوره پیگیری شده</label>
                                                <input type="text" class="form-control"  value="@if(!is_null($item->course_id)){{$item->course->course}} @endif" disabled="disabled"  />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>وضعیت</label>
                                                <input type="text" class="form-control"  value="@if(!is_null($item->status_followups)){{$item->userType->type}} @endif" disabled="disabled"  />

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>کیفیت پیگیری</label>
                                                <input type="text" class="form-control"  value="@if(!is_null($item->problemfollowup_id)){{$item->problemFollowup->problem}} @endif"  disabled="disabled"  style="background-color: @if($item->problemfollowup_id){{$item->problemFollowup->color}}  @endif"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>مکالمه(دقیقه)</label>
                                                <input type="number" class="form-control"  value="{{$item->talktime}}"  disabled="disabled"  />
                                            </div>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label>تگ ها</label>
                                                <ul class="">
                                                    @if(!is_null($item->tags))
                                                        @foreach(explode(',',$item->tags) as $tag)
                                                            <li class="border border-1 p-1 d-inline">
                                                                {{\Modules\Crm\Entities\Tag::where('id',$tag)->first()->tag}}
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>توضیحات</label>
                                            <textarea class="form-control textarea" disabled="disabled">{{$item->comment}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row" style="border-radius: 0px 0px 20px 20px;border:5px solid @if($item->problemfollowup_id){{$item->problemFollowup->color}} @endif;border-top:0px;">


                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>تاریخ پیگیری</label>
                                        <input type="text" class="form-control"  value="{{$item->date_fa." ".$item->time_fa}}" dir="ltr" disabled="disabled" />
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>ثبت شده توسط</label>
                                        <input type="text" class="form-control" value="@if(! is_null($item->insertUser)) {{$item->insertUser->fname." ".$item->insertUser->lname}} @endif"  disabled="disabled" />
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>تاریخ پیگیری بعد</label>
                                        <input type="text" class="form-control" value="{{$item->nextfollowup_date_fa}}" disabled="disabled" />
                                    </div>
                                </div>
                            </div>
                            <hr/>
                        @endforeach

                </div>
            </div>
        @else
            <div class="alert alert-warning">
                پیگیری ثبت نشده است
            </div>
        @endif
    @else
        <div class="col-12 text-center" wire:loading >
            <svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
                <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
                <circle cx="170" cy="170" r="135" stroke="#404041"/>
                <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
                <circle cx="170" cy="170" r="85" stroke="#404041"/>
            </svg>
        </div>
    @endif

</div>
