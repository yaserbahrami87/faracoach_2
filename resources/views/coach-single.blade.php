@component('master.index')
    <section class="single-coach-welcome mb-6" style="background-image: url('{{('/images/single_coach/hero-background.jpg')}}')">
        <div class="container">
            <div class="single-coach-welcome__container row flex-xl-row-reverse align-items-center">

                <!-- Coach Info -->
                <div class="col-12 col-xl-6 mb-5 mb-xl-0 text-center text-xl-start position-relative ">

                    <div class="row mt-5 mt-xl-0">
                        <div class="col-12 col-md-6 text-center text-md-end mb-4 text-light">
                            <h1 class="fs-3 fw-bold mb-4 mt-5">{{($user->fname.' '.$user->lname)}}</h1>
                            <p class="mb-4">{{($user->education.' - '.$user->job)}}<p>
                                <a href=""><img src="images/single_coach/whatsapp.svg" class="img-fluid ms-3" alt=""></a>
                                <a href=""><img src="images/single_coach/facebook.svg" class="img-fluid ms-3" alt=""></a>
                                <a href=""><img src="images/single_coach/instagram.svg" class="img-fluid ms-3" alt=""></a>
                        </div>
                        <div class="col-12 col-md-6 text-md-start">
                            <img src="{{'/documents/users/'.$user->personal_image}}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <!-- Icons -->
                    <div class="d-flex justify-content-between mt-5 mb-xl-0 mx-auto mx-xl-0" style="max-width: 400px;">

                        <div class="text-center text-light ms-5">
                            <img src="images/single_coach/calendar-2.svg" class="mb-3" alt="">
                            <p>{{$user->coach->count_meeting}} ساعت</p>
                        </div>

                        @if($user->coach->confirm_faracoach==1)
                            <div class="text-center text-light ms-5">
                                <img src="images/single_coach/location.svg" class="mb-3" alt="">
                                <p>دارای تاییدیه</p>
                            </div>
                        @endif

                        <div class="text-center text-light">
                            <img src="images/single_coach/clock.svg" class="mb-3" alt="">
                            <p>امتیاز ۸ از ۹</p>
                        </div>

                    </div>


                </div>

                <!-- Date Picker -->
                <div class="single-coach-welcome__datepicker col-12 col-xl-6 d-flex align-self-end"  >

                    <div class="faraCoachDatePicker card px-3 pt-4 px-sm-5 mx-auto me-xl-0" style="max-width: 550px;" >
                        <div class="card-body">
                            <livewire:clinic::coach-single :user="$user" />
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">

                <!-- Aside -->
                <aside class="col-12 col-xl-4">

                    <!-- Reservation -->
                    <div class="card bg-f8 border-0 rounded-3 mb-5">
                        <div class="card-body p-4">
                            <img src="images/single_coach/brifecase-timer.svg" class="ms-2" alt="">
                            <h5 class="card-title d-inline-block fw-bold">رزرواسیون کوچ</h5>
                            <ul class="list-group mt-4 p-0">

                                <li class="list-group-item border-0 rounded-1 py-3 d-flex align-items-center mb-4">
                                    <img src="images/single_coach/envelope.svg" class="ms-3 d-inline-block" alt="">
                                    <a href="mailto:{{$user->email}}" class="text-dark text-decoration-none">{{$user->email}}</a>
                                </li>

                                <li class="list-group-item border-0 rounded-1 py-3 d-flex align-items-center mb-4">
                                    <img src="images/single_coach/phone.svg" class="ms-3 d-inline-block" alt="">
                                    <a href="tel:{{$user->tel}}" class="text-dark text-decoration-none">{{$user->tel}}</a>
                                </li>
                                <li class="list-group-item border-0 rounded-1 py-3 d-flex align-items-center mb-4">
                                    @if(($user->coach->coachSettings->where('setting','coaching_fi')->count()>0))
                                        <p class="text-dark text-decoration-none">قیمت جلسه کوچینگ:</p>
                                        <p>{{number_format($user->coach->coachSettings->where('setting','coaching_fi')->first()->value)}} تومان</p>
                                    @endif
                                </li>
                                <li class="list-group-item border-0 rounded-1 py-3 d-flex align-items-center mb-4">
                                    @if(($user->coach->coachSettings->where('setting','counseling_fi')->count()>0))
                                        <p class="text-dark text-decoration-none">قیمت هر جلسه مشاوره:</p>
                                        <p>{{number_format($user->coach->coachSettings->where('setting','counseling_fi')->first()->value)}} تومان</p>
                                    @endif
                                </li>

                                <li class="list-group-item border-0 rounded-1 py-3 d-flex align-items-center mb-4">

                                    @if(($user->coach->coachSettings->where('setting','service_fi')->count()>0))
                                        <p class="text-dark text-decoration-none">قیمت هر خدمت:</p>
                                        <p>{{number_format($user->coach->coachSettings->where('setting','service_fi')->first()->value)}} تومان</p>
                                    @endif
                                </li>
                                <!--
                                <li class="list-group-item border-0 rounded-1 py-3 d-flex align-items-center mb-4">
                                    <img src="images/single_coach/instagram-01.svg" class="ms-3 d-inline-block" alt="">
                                    <a href="#" class="text-secondary text-decoration-none">YaserMotahedi@</a>
                                </li>
                                -->

                            </ul>
                        </div>
                    </div>

                </aside>

                <main class="col-12 col-xl-8 me-auto" style="max-width: 822px;">

                    <!-- Video Section -->
                    <section class="mb-5">
                        <video controls width="100%" class="rounded-3">
                            <source src="images/main/sample-video.mp4" type="video/mp4">
                        </video>
                    </section>

                    <!-- Description -->
                    <section class="mb-6">
                        <h5 class="fw-bold mt-5 mb-4">{{$user->fname.' '.$user->lname}}</h5>
                        <div class="fade-show-more">
                            <div class="collapse" id="descriptionCollapse">
                                <div class="fade-show-more__overlay"></div>
                                @if(!is_null($user->coach->experience))
                                    <h5 class="fw-bold mt-5 mb-4">سوابق کاری</h5>
                                    {!! $user->coach->experience !!}
                                @endif
                                @if(!is_null($user->coach->education_background))
                                    <h5 class="fw-bold mt-5 mb-4">سوابق تحصیلی</h5>
                                    {!! $user->coach->education_background !!}
                                @endif
                                @if(!is_null($user->coach->researches))
                                    <h5 class="fw-bold mt-5 mb-4">سوابق پژوهشی</h5>
                                    {!! $user->coach->researches !!}
                                @endif
                                @if(!is_null($user->coach->certificates))
                                    <h5 class="fw-bold mt-5 mb-4">مدارک</h5>
                                    {!! $user->coach->certificates !!}
                                @endif
                                @if(!is_null($user->coach->skills))
                                    <h5 class="fw-bold mt-5 mb-4">تخصص ها</h5>
                                    {!! $user->coach->skills !!}
                                @endif

                            </div>
                            <a class="position-relative d-block text-center text-decoration-none" data-bs-toggle="collapse" href="#descriptionCollapse" role="button" aria-expanded="false" aria-controls="descriptionCollapse">
                                <span class="hide">نمایش ادامه توضیحات</span>
                                <span class="show">مخفی کردن توضیحات</span>
                                <i class="isax isax-arrow-down-1 d-block fs-4 mt-2"></i>
                                <i class="isax isax-arrow-up-2 d-block fs-4 mt-2"></i>
                            </a>
                        </div>
                    </section>

                    <!-- Students Testimonials -->
                    <section class="mb-6">
                        <div class="d-flex align-items-center mb-4">
                            <img src="images/single_course/main-icon-07.svg" alt="">
                            <h2 class="d-inline-block me-3 fw-bold">رضایت مراجعه کنندگان</h2>
                        </div>
                        <p class="text-70">شایستگی را در استفاده از انواع رفتارها و مهارت‌ها در کار خود با مراجعان نشان داده‌اند. </p>


                    </section>

                    <!-- Comment -->
                    <section class="mb-6">

                        <!-- Comment Form -->
                        <div class="position-relative">

                            <img src="images/single_coach/profile-01.png" class="img-fluid position-absolute end-0" alt="">

                            <!-- Comment Form -->
                            <form class="row g-3 pe-4 me-5 mb-5">


                                <div class="col-12 m-0">
                                    <textarea class="form-control py-3" id="message" placeholder="دیدگاهتان را بنویسید..." rows="6"></textarea>
                                </div>

                                <div class="col-md-6">
                                    <input type="name" class="form-control py-2" placeholder="نام" id="name">
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="form-control py-2" placeholder="ایمیل" id="email">
                                </div>

                                <div class="col-12 d-flex justify-content-between align-items-center mt-4 btn-lg">
                                    <button type="submit" class="btn btn-primary">فرستادن دیدگاه</button>
                                    <div class="d-flex align-items-center">
                                        <span class="me-auto">۳ دیدگاه</span>
                                        <i class="isax isax-message text-primary fs-5 me-2"></i>
                                    </div>
                                </div>

                            </form>

                            <!-- Comments -->

                            <div class="card bg-f8 border-0 mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">

                                        <div>
                                            <img class="ms-3" src="images/single_coach/profile-02.png" alt="">
                                            <span class="ms-3 fw-bold" style="color: #334253;">علی اسحاقی</span>
                                            <small style="color: #67727E;">۲ هفته قبل</small>
                                        </div>

                                        <div>

                                            <a href="" class="text-decoration-none text-ae border-start ms-1"><img src="images/single_coach/like.svg" alt=""> ۰ </a>
                                            <a href="" class="text-decoration-none text-ae"> ۰ <img src="images/single_coach/dislike.svg" alt=""></a>

                                            <a href="#" class="text-decoration-none text-primary me-3">
                                                پاسخ
                                                <img src="images/single_coach/Reply.svg" alt="">
                                            </a>
                                        </div>

                                    </div>
                                    <p class="pe-5 lh-lg text-ae">
                                        دوستان خستگی و تنبلی رو بزارید کنار برید تریدینگ ویو رو یاد بگیرید خودتون تحلیل کنید البته آب دوغ خیاری نه درست و حسابی روند بلند مدتی که من میبینم ی نزول و وقتی پولبک دامیننس تتر صورت گرفت صعود تا محدوده های 30 الی 45 و رنج تو این نواحی تا هاوینگ بعدی
                                        یا حق
                                    </p>
                                </div>
                            </div>

                            <div class="card bg-f8 border-0 mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">

                                        <div>
                                            <img class="ms-3" src="images/single_coach/profile-02.png" alt="">
                                            <span class="ms-3 fw-bold" style="color: #334253;">علی اسحاقی</span>
                                            <small style="color: #67727E;">۲ هفته قبل</small>
                                        </div>

                                        <div>

                                            <a href="" class="text-decoration-none text-ae border-start ms-1"><img src="images/single_coach/like.svg" alt=""> ۰ </a>
                                            <a href="" class="text-decoration-none text-ae"> ۰ <img src="images/single_coach/dislike.svg" alt=""></a>

                                            <a href="#" class="text-decoration-none text-primary me-3">
                                                پاسخ
                                                <img src="images/single_coach/Reply.svg" alt="">
                                            </a>
                                        </div>

                                    </div>

                                    <div class="position-relative">
                                        <img src="images/single_coach/reply-arrow.svg" class="position-absolute" alt="" style="top:15px;right:15px" >
                                        <p class="pe-5 ms-4 text-ae text-nowrap overflow-hidden">
                                            دوستان خستگی و تنبلی رو بزارید کنار برید تریدینگ ویو رو یاد بگیرید خودتون تحلیل کنید البته آب دوغ خیاری نه درست و حسابی روند بلند مدتی که من میبینم ی نزول و وقتی پولبک دامیننس تتر صورت گرفت صعود تا محدوده های 30 الی 45 و رنج تو این نواحی تا هاوینگ بعدی
                                            یا حق
                                        </p>
                                        <p class="pe-5 lh-lg text-primary">
                                            دوستان خستگی و تنبلی رو بزارید کنار برید تریدینگ ویو رو یاد بگیرید خودتون تحلیل کنید البته آب دوغ خیاری نه درست و حسابی روند بلند مدتی که من میبینم ی نزول و وقتی پولبک دامیننس تتر صورت گرفت صعود تا محدوده های 30 الی 45 و رنج تو این نواحی تا هاوینگ بعدی
                                            یا حق
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </section>

                </main>

            </div>
        </div>
    </section>


    <script>
        window.addEventListener('plugins',()=>
        {
            let head = document.getElementsByTagName('HEAD')[0];


            let link1 = document.createElement('script');
            link1.src='/js/main.js';
            head.appendChild(link1);
        });

    </script>


@endcomponent

