<div>

    <!-- Persian Date Picker -->
{{--    <div class="date-input d-flex" ></div>--}}

    <!-- Date Input -->
{{--    <input type="hidden" name="date" id="altDateInput"/>--}}

    <form method="post" wire:submit.prevent="save">
    <div class="d-flex mt-3 position-relative">
        <!-- Submit button -->
{{--        <input type="button" class="btn btn-secondary btn-lg px-4 ms-2 text-light" value="ثبت"   >--}}

        <!-- Time Picker -->
        <div class="faraCoachTimePicker swiper d-inline-block">
            <div class="swiper-wrapper">
                @foreach($user->coach->bookings->where('status',0)->sortBy('start_date')->groupby('start_date') as $booking)
                        <div class="swiper-slide text-center">
                            <div >
                                <input type="radio" class="btn-check d-inline-block" name="options" id="time_selected{{$booking->first()->id}}" wire:model="date" autocomplete="off" value="{{$booking->first()->start_date}}">
                                <label class="btn d-inline-block mx-auto" for="time_selected{{$booking->first()->id}}">{{\Hekmatinasser\Verta\Verta::parse(str_replace('/','-',$booking->first()->start_date).' '.$booking->first()->start_time.':00')->format('%B %d، %Y')  }}</label>
                            </div>
                        </div>

                @endforeach
                <div class="swiper-slide text-center">
                    <div >
                        <input type="radio" class="btn-check d-inline-block" name="options" id="option2" autocomplete="off">
                        <label class="btn d-inline-block mx-auto" for="option2"></label>
                    </div>
                </div>
                <div class="swiper-slide text-center">
                    <div >
                        <input type="radio" class="btn-check d-inline-block" name="options" id="option3" autocomplete="off">
                        <label class="btn d-inline-block mx-auto" for="option3"></label>
                    </div>
                </div>
                <div class="swiper-slide text-center">
                    <div >
                        <input type="radio" class="btn-check d-inline-block" name="options" id="option4" autocomplete="off">
                        <label class="btn d-inline-block mx-auto" for="option4"></label>
                    </div>
                </div>
                <div class="swiper-slide text-center">
                    <div >
                        <input type="radio" class="btn-check d-inline-block" name="options" id="option5" autocomplete="off">
                        <label class="btn d-inline-block mx-auto" for="option5"></label>
                    </div>
                </div>
                <div class="swiper-slide text-center">
                    <div >
                        <input type="radio" class="btn-check d-inline-block" name="options" id="option6" autocomplete="off">
                        <label class="btn d-inline-block mx-auto" for="option6"></label>
                    </div>
                </div>
                <div class="swiper-slide text-center">
                    <div >
                        <input type="radio" class="btn-check d-inline-block" name="options" id="option7" autocomplete="off">
                        <label class="btn d-inline-block mx-auto" for="option7"></label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Time Picker Navigation -->
        <div class="faraCoachTimePicker__next-btn">
            <i class="isax isax-arrow-left-2 text-ae p-2 fw-bold rounded-circle"></i>
        </div>
    </div>


    @if($bookings_search!=[])
        @if($bookings_search->count()>0)
        <div class="d-flex mt-3 position-relative">

            <!-- Time Picker -->
            <div class="faraCoachTimePicker swiper d-inline-block">
                <div class="swiper-wrapper">
                    @foreach($bookings_search as $booking)
                        <div class="swiper-slide text-center">
                            <div >
                                <input type="radio" class="btn-check d-inline-block" name="options" id="bookingTime{{$booking->id}}" wire:model="bookingTime" autocomplete="off" value="{{$booking->id}}">
                                <label class="btn d-inline-block mx-auto" for="bookingTime{{$booking->id}}">{{$booking->start_time}}</label>
                            </div>
                        </div>

                    @endforeach

                    @if($bookings_search->count()<5)
                        @for($i=$bookings_search->count();$i<=5;$i++)
                        <div class="swiper-slide text-center">
                            <div >
                                <input type="radio" class="btn-check d-inline-block" name="options" id="option2" autocomplete="off">
                                <label class="btn d-inline-block mx-auto" for="option2"></label>
                            </div>
                        </div>
                        @endfor
                    @endif
                </div>
            </div>

            <!-- Time Picker Navigation -->
            <div class="faraCoachTimePicker__next-btn">
                <i class="isax isax-arrow-left-2 text-ae p-2 fw-bold rounded-circle"></i>
            </div>
        </div>

        @else
            <div class="alert alert-warning">
                در این تاریخ وقت آزاد برای رزرو وجود ندارد
            </div>
        @endif
    @endif
    @if(!is_null($bookingTime))
        @if(Auth::check() )
            <div class="form-group mb-2">
                <label for="cliniccategory">نوع جلسه:<span class="text-danger">*</span></label>
                <select  class="form-control" id="cliniccategory" wire:model.lazy="cliniccategory">
                    <option selected value="NULL">انتخاب کنید</option>
                    @foreach($this->user->coach->cliniccategories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('cliniccategory')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="form-group  mb-2">
                <label for="subject">موضوع جلسه:<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="subject" wire:model.lazy="subject" >
                <small id="subject" class="form-text text-muted">موضوع جلسه خود را وارد کنید</small>
                @error('subject')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group  mb-2">
                <label for="description">توضیحات کوتاه:</label>
                <textarea class="form-control" id="description" rows="3" wire:model.lazy="description"></textarea>
                @error('description')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group  mb-2">
                <label for="type_booking">نوع جلسه:<span class="text-danger">*</span></label>
                <select  class="form-control" id="type_booking" wire:model.lazy="type_booking">
                    <option selected value="NULL">انتخاب کنید</option>
                    <option value="1">آنلاین</option>
                    <option value="2">حضوری</option>
                    <option value="0">فرقی ندارد</option>
                </select>
                @error('type_booking')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                @enderror
            </div>
                <div class="form-group  mb-2">
                    <label >قیمت جلسه:</label>
                    <label>
                        @if(is_null($off))
                            <label>{{number_format($fi) }}</label>
                        @else
                            <del class="text-danger">{{$fi}}</del>
                            <label>{{number_format($final_fi) }}</label>
                        @endif
                    </label>
                    <div class="input-group ">

                        <input type="text" class="form-control" placeholder="کد تخفیف را وارد کنید" wire:model.lazy="coupon" >
                        <div class="input-group-prepend">
                            <a class="btn btn-outline-secondary" type="button" id="checkOff" wire:click="checkCoupon">اعمال</a>
                        </div>
                    </div>
                    @error('off')
                    <p class="text text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            <button type="submit" class="btn btn-primary">ثبت</button>

        @else
            <div class="alert alert-warning mt-2">
                برای رزرو جلسه لطفا وارد سیستم شوید
            </div>
        @endif
    @endif

    </form>
</div>
