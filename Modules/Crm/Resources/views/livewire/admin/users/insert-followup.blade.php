<div>
    <div class="card card-user rounded">
        <div class="card-header bg-info">
            <h5 class="card-title">پیگیری جدید</h5>
        </div>
        <div class="card-body bg-secondary-light border-1 border-secondary">
            @if($readyToLoad)
            <form method="POST" wire:submit.prevent="save"  >
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>محصول در حال پیگیری</label>
                            <select class="form-control p-0  {{is_null($followup->course_id) ? 'is-invalid':  'is-valid'}}" id="course_id" name="course_id" wire:model.change="followup.course_id" >
                                <option  selected  value="NULL">وضعیت را انتخاب کنید</option>
                                @foreach($courses as $item)
                                    <option  value="{{$item->id}}" @if (old('course_id') == $item->id) selected @endif>
                                        {{$item->course}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('followup.course_id')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12" >

                        @foreach($tagCategories[0]->tagCategoryChildren as $item)

                            <a class="d-inline" data-toggle="collaps"  role="button" aria-expanded="false" aria-controls="collapseExample{{$item->id}}">
                                {{($item->category)}}
                            </a>


                            <div id="collapseExample{{$item->id}}">
                                <div class="card card-body">
                                    <div class="form row">
                                        @foreach($item->tags as $tag)
                                            <div class="col-3 text-right">
                                                <label class="form-check-label m-0 pr-0 float-left" for="tag{{$tag->id}}">{{$tag->tag}}</label>
                                                <input class="form-check-input text-dark mr-2 " type="checkbox" value="{{$tag->id}}" id="tag{{$tag->id}}" name="tags[]" @if(is_array(old('tags')) && in_array($tag->id, old('tags'))) checked @endif wire:model="followup.tags"  >
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('followup.tags')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>مدت تماس (دقیقه)</label>
                            <input type="number" class="form-control {{is_null($followup->talktime) ? 'is-invalid':  'is-valid'}}"  id="talktime"  name="talktime" wire:model.lazy="followup.talktime" min="0" />
                        </div>
                        @error('followup.talktime')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-8 px-1">
                        <div class="form-group">
                            <label>توضیحات</label>
                            <textarea class="form-control textarea {{is_null($followup->comment) ? 'is-invalid':  'is-valid'}}"   name="comment" wire:model.lazy="followup.comment"></textarea>
                        </div>
                        @error('followup.comment')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>نتیجه پیگیری</label>
                            <select class="form-control p-0 {{is_null($followup->status_followups) ? 'is-invalid':  'is-valid'}} " id="exampleFormControlSelect1" name="status_followups" wire:model.change="followup.status_followups" >
                                <option value="NULL" selected >وضعیت را انتخاب کنید</option>
                                <option  value="11" @if (old('followup.status_followups',$followup->status_followups) == '11') selected @endif>تور پیگیری</option>
                                <option  value="12" @if (old('status_followups',$followup->status_followups) == '12') selected @endif> کنسل شد</option>
                                <option  value="13" @if (old('status_followups',$followup->status_followups) == '13') selected @endif>در انتظار تصمیم</option>
                                <option  value="14" @if (old('status_followups',$followup->status_followups) == '14') selected @endif>عدم پاسخگویی</option>
                                <option  value="20" @if (old('status_followups',$followup->status_followups) == '20') selected @endif>مشتری</option>
                                <option  value="-1" @if (old('status_followups',$followup->status_followups) == '-1') selected @endif>مارکتینگ 1</option>
                                <option  value="-2" @if (old('status_followups',$followup->status_followups) == '-2') selected @endif>مارکتینگ 2</option>
                                <option  value="-3" @if (old('status_followups',$followup->status_followups) == '-3') selected @endif>مارکتینگ 3</option>
                                <option  value="30" @if (old('status_followups',$followup->status_followups) == '30') selected @endif>جلسات</option>
                                <option  value="40" @if (old('status_followups',$followup->status_followups) == '40') selected @endif>رویداد</option>
                            </select>
                        </div>
                        @error('followup.status_followups')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>کیفیت سنجی مشتری</label>
                            <select class="form-control p-0 {{is_null($followup->problemfollowup_id) ? 'is-invalid':  'is-valid'}} " id="exampleFormControlSelect1" name="followup"  wire:model="followup.problemfollowup_id">
                                <option  selected >نتیجه را مشخص کنید</option>
                                @foreach($problemfollowups as $problemfollowup)
                                    <option value="{{$problemfollowup->id}}"  @if (old('followup.problemfollowup',$followup->problemfollowup_id) == $problemfollowup->id) selected @endif >{{$problemfollowup->problem}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('followup.problemfollowup_id')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>ارجاع پیگیری</label>
                            <select class="form-control p-0 {{is_null($followby_expert) ? 'is-invalid':  'is-valid'}}"  name="followby_expert" wire:model="followby_expert" >
                                <option  value="NULL" selected >نتیجه را مشخص کنید</option>
                                @if(Auth::user()->type==2 ||Auth::user()->type==6)
                                    @foreach($expertFollowups as $item)
                                        <option value="{{$item->id}}" @if($item->id==Auth::user()->id) selected @endif >@if((strlen($item->fname))||(strlen($item->lname))>0) {{$item->fname}} {{$item->lname}}@else{{$item->tel}}@endif</option>
                                    @endforeach
                                @else
                                    <option value="{{Auth::user()->id}}" selected  >{{Auth::user()->fname.' '.Auth::user()->lname}} </option>
                                    @foreach($user_type as $item)
                                        <option value="{{$item->code}}D" @if($item->id==Auth::user()->id) selected @endif >{{$item->type}} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @error('followby_expert')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>تاریخ پیگیری</label>
                            <input type="text" class="form-control dateInput {{is_null($followup->date_fa) ? 'is-invalid':  'is-valid'}}" maxlength="10" id="dateFollow" wire:model.lazy="followup.date_fa"  autocomplete="off" />
                        </div>
                        @error('followup.date_fa')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>ساعت پیگیری</label>
                            <input type="text" class="form-control {{is_null($followup->time_fa) ? 'is-invalid':  'is-valid'}}" id="date_fa" placeholder="12:00" data-timepicker wire:model.lazy="followup.time_fa" autocomplete="off" />

                        </div>
                        @error('followup.time_fa')
                        <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>تاریخ پیگیری بعد</label>

                            <input type="text" class="form-control dateInput {{is_null($followup->nextfollowup_date_fa) ? 'is-invalid':  'is-valid'}}" maxlength="10" id="nextfollowup_date_fa" wire:model.lazy="followup.nextfollowup_date_fa"  autocomplete="off" />
                        </div>
                        @error('followup.nextfollowup_date_fa')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 px-1">
                        <div class="form-group">
                            <div class="form-group row mb-0">
                                <label for="sendSMS" class="col-md-2 col-form-label text-md-right  text-dark">ارسال پیامک</label>
                                <div class="col-md-10 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sms" id="sendsms0" value="0" wire:model.change="followup.sms">
                                        <label class="form-check-label  text-dark" for="sendsms0">
                                            ارسال نشود
                                        </label>
                                    </div>


                                    @foreach($sms as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sms" id="sendsms{{$item->id}}" value="{{$item->value}}" wire:model.change="followup.sms" >
                                            <label class="form-check-label  text-dark" for="sendsms{{$item->id}}">{!! $item->value !!}</label>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="update m-auto m-auto">
                        <button type="submit" class="btn btn-primary btn-round">ثبت پیگیری</button>
                    </div>
                </div>
            </form>
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
    </div>
</div>


    <script>
        window.addEventListener('plugins2',()=> {

            let head = document.getElementsByTagName('HEAD')[0];
            let link4 = document.createElement('script');
            link4.src = '/dashboard/plugins/simple-Num-Mask/jQuery.SimpleMask.min.js';
            head.appendChild(link4);

            $('.dateInput').simpleMask({
                'mask': ['####/##/##','####/##/##']
            });

            $('#date_fa').simpleMask({
                'mask': ['##:##','##:##']
            })
        });
    </script>
