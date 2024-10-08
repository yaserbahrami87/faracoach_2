@component('master.index')


    <!-- Hero -->
    <section class="main-welcome py-5 text-light" style="background: url('images/main/header-background.jpg');">
        <div class="container py-5">

            <!-- Title -->
            <div class="main-welcome__title row my-5 mx-auto">
                <div class="col-12 my-5">
                    <h1 class="mb-5 fw-bold">اولین آکادمی بین المللی کوچینگ ایران</h1>
                    <p class="mb-5 lh-lg">معتبرترین مدرک ملی کوچینگ با اعتبار بین المللی زیر نظر سازمان فنی و حرفه ای کشور و ILO سازمان جهانی</p>

                    <button type="button" class="main-welcome__title__btn btn btn-dp ms-4">دوره های آکادمی فراکوچ</button>

                    <button type="button" class="main-welcome__title__btn main-welcome__title__btn--hover btn rounded-pill p-0 text-secondary" data-bs-toggle="modal" data-bs-target="#heroModal">
                        <img src="images/main/play-icon.svg" alt="">
                        <span class="ms-4 me-2">کوچینگ چیست؟</span>
                    </button>

                </div>
            </div>

            <!-- Counter -->
            <div class="main-welcome__counter row my-5 mx-auto text-center">
                <div class="col-4">
                    <img src="images/main/counter-profile-tick.svg" class="img-fluid mb-3" alt="">
                    <p class="mb-3">فارغ التحصیل</p>
                    <span>{{$students->wherein('status',[31,3])->count()}}</span>
                </div>
                <div class="col-4">
                    <img src="images/main/counter-people.svg" class="img-fluid mb-3" alt="">
                    <p class="mb-3">دانش پذیران</p>
                    <span>{{$students->count()}}</span>
                </div>
                <div class="col-4">
                    <img src="images/main/counter-briefcase.svg" class="img-fluid mb-3" alt="">
                    <p class="mb-3">جلسه کوچینگ</p>
                    <span>0</span>
                </div>
            </div>

        </div>

        <!-- Testimonial Box -->
        <div class="main-welcome__testimonial d-none d-xxl-block">

            <div class="main-welcome__testimonial__content">
                <img src="images/header/header06.png" alt="">
                <span class="me-2 fw-bold">محمد دانشگر</span>
                <p class="mt-3">بهترین و برترین مرکز کوچینگ ایران، فراکوچ</p>
            </div>

            <div class="text-center">
                <img src="images/header/header07.png" alt="">
            </div>
        </div>

    </section>

    <!-- Hero Modal -->
    <div class="modal fade" id="heroModal" tabindex="-1" aria-labelledby="heroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="heroModalLabel">کوچینگ چیست؟</h5>
                    <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <video controls width="100%">
                        <source src="images/main/sample-video.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">خروج</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Search -->
    <section class="main-search bg-light shadow-sm mb-5 mb-xxl-8">
        <div class="container">
            <div class="row">
                <div class="col-12 px-0">

                    <!-- Search Form -->
                    <form action="" method="">

                        <!-- Select Input -->
                        <div class="d-inline-flex align-items-center ms-4">
                            <i class="isax isax-presention-chart fs-4 text-cb"></i>
                            <select name="" id="" class="bg-light border-0" role="button">
                                <option value="">نوع برگذاری</option>
                            </select>
                        </div>

                        <!-- Select Input -->
                        <div class="d-inline-flex align-items-center ms-4">
                            <i class="isax isax-calendar-1 fs-4 text-cb"></i>
                            <select name="" id="" class="bg-light border-0" role="button">
                                <option value="">نوع کوچینگ</option>
                            </select>
                        </div>

                        <!-- Select Input -->
                        <div class="d-inline-flex align-items-center">
                            <i class="isax isax-teacher fs-4 text-cb"></i>
                            <select name="" id="" class="bg-light border-0" role="button">
                                <option value="">تاریخ رزرو</option>
                            </select>
                        </div>

                        <!-- Search Input -->
                        <div class="main-search__text input-group flex-row-reverse mt-3">
                            <button class="btn btn-primary rounded px-4" type="button" id="button-addon1">جستجو</button>
                            <input type="text" class="form-control border-end-0" placeholder="جستجو نام کوچینگ" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <span class="input-group-text border-start-0" id="button-addon1"><i class="isax isax-search-normal-1 text-cb"></i></span>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- COURSES CAROUSEL
    ================================================== -->
    <section class="mb-6">
        <div class="container">

            <!-- Top Title -->
            <span class="text-84">دوره‌های فراکوچ</span>
            <div class="bottom-line bg-primary mt-2 mb-4"></div>

            <!-- Title -->
            <div class="row mb-5">

                <!-- Text -->
                <div class="col-12 col-md-8">
                    <img src="images/main/book-icon.svg" alt="">
                    <h2 class="d-inline-block fw-bold me-2 text-41 mb-0 section-title">دوره‌های آموزشی</h2>
                    <p class="mt-4">جدیدترین دوره های آموزشی با بهترین اساتید و جدیدترین متد های تدریس در ایران.</p>
                </div>

                <!-- Link -->
                <div class="col-12 col-md-4 text-md-start">
                    <div class="showmore d-inline-flex align-items-center">
                        <a href="{{route('course.all')}}" class="text-decoration-none text-primary showmore__link">مشاهده همه</a>
                        <i class="isax isax-arrow-left text-primary fs-5 showmore__icon"></i>
                    </div>
                </div>

            </div>

            <div class="row position-relative">
                <!-- Carousel main container -->
                <div class="courses-carousel swiper">

                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slide -->
                        @foreach($courses as $course)
                            <div class="swiper-slide">
                                <a href="{{route('course.show',['course'=>$course])}}" class="text-decoration-none text-reset courses-carousel__link">
                                    <div class="card bg-f8 border-0" >
                                        <!-- Image -->
                                        <div class="courses-carousel__top mb-3">

                                            <img src="{{$course->image}}" class="img-fluid card-img-top courses-carousel__img" alt="" style="height: 247px !important;">

                                            <div class="courses-carousel__overlay rounded text-light d-flex flex-column align-items-center justify-content-center ">
                                                <p class="mb-5">{{$course->course}}</p>
                                                <i class="isax isax-export-3 d-block mb-3 fs-2"></i>
                                                <span class="fw-bold fs-5">مشاهده دوره</span>
                                            </div>

                                        </div>

                                        <!-- Content -->
                                        <div class="card-body">
                                            <h5 class="card-title text-dark fw-bold mb-4">{{$course->course}}</h5>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="text-dark"><b class="text-primary">{{number_format($course->fi_off)}}</b> تومان</span>
                                                <span class="text-ae">{{$course->start}}</span>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>

                <!-- Add Navigation -->
                <span class="courses-carousel__next-btn fs-4 d-none d-xl-block">
            <i class="isax isax-arrow-left-2 bg-d9 text-9f p-2 fw-bold rounded-circle"></i>
          </span>
            </div>

        </div>
    </section>

    <!-- ABOUT US
    ================================================== -->
    <section class="mb-6">
        <div class="container-fluid">
            <div class="row justify-content-end">

                <!-- Video -->
                <div class="col-12 col-xl-6 p-6 bg-0D d-none d-xl-block" style="max-width: 620px; border-top-right-radius: 50%; border-bottom-right-radius: 50%;">
                    <div class="bg-light rounded-circle me-auto" style="width: 500px; height: 500px;background-image: url('images/main/about-us-video-bg.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                        <div class="video d-flex align-items-center justify-content-center" style="height: 500px;">
                            <a href="#!">
                                <img src="images/main/play-circle.svg" alt="" data-bs-toggle="modal" data-bs-target="#aboutUsModal" >
                            </a>
                        </div>
                    </div>
                </div>

                <!-- About Us Modal -->
                <div class="modal fade" id="aboutUsModal" tabindex="-1" aria-labelledby="aboutUsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="aboutUsModalLabel">معرفی فراکوچ</h5>
                                <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <video controls width="100%">
                                    <source src="images/main/sample-video.mp4" type="video/mp4">
                                </video>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">خروج</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-12 col-xl-6 bg-0D text-light p-6" style="background-image: url('images/main/about-us-bg.png'); background-position: left; background-size: contain; background-repeat: no-repeat;">
                    <!-- Top Title -->
                    <span>دوره‌های فراکوچ</span>
                    <div class="bottom-line bg-secondary mt-2 mb-4"></div>
                    <!-- Title -->
                    <img src="images/main/teacher-icon.svg" alt="">
                    <h2 class="d-inline-block fw-bold me-2 mb-0">فراکوچ کجاست؟</h2>
                    <p class="mt-4 text-muted mb-5">برای آشنایی بیشتر با فراکوچ حتما ویدئو معرفی ما را تماشا کنید.</p>
                    <!-- Text -->
                    <p class="mb-4" style="max-width: 520px;line-height: 40px;"> کوچینگ رشته جدید علمی نیست که به یک باره و ناگهانی به وجود آمده باشد. با این حال ظهور کوچینگ در دهه اخیر بوده است که واقعا می توان مفهوم ” کوچینگ ” را در زمینه تجارت و کسب و کار و خارج از محیط ورزشی یا گود مسابقات دید.</p>
                    <!-- button -->
                    <button class="btn btn-secondary text-light px-5">بیشتر بدانید</button>
                </div>


            </div>
    </section>

    <!-- COACHES CAROUSEL
    ================================================== -->
    <section class="mb-6">
        <div class="container">

            <!-- Top Title -->
            <span class="text-84">کلینیک فراکوچ</span>
            <div class="bottom-line bg-primary mt-2 mb-4"></div>

            <!-- Title -->
            <div class="row mb-5">

                <!-- Text -->
                <div class="col-12 col-md-8">
                    <img src="images/main/coaches-carousel-icon.svg" alt="">
                    <h2 class="d-inline-block fw-bold me-2 text-41 mb-0 section-title">کلینیک کوچینگ</h2>
                    <p class="mt-4">به راحتی میتونی بین همه کوچ های حرفه ای وقت جلسه کوچینگ رزور کنی </p>
                </div>

                <!-- Link -->
                <div class="col-12 col-md-4 text-md-start">
                    <div class="showmore d-inline-flex align-items-center">
                        <a href="{{route('clinic.coaches') }}" class="text-decoration-none text-primary showmore__link">مشاهده همه</a>
                        <i class="isax isax-arrow-left text-primary fs-5 showmore__icon"></i>
                    </div>
                </div>

            </div>

            <div class="row position-relative">

                <!-- Carousel main container -->
                <div class="coaches-carousel swiper">

                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach($coaches as $coach)
                            <!-- Slide -->
                            <div class="swiper-slide">
                                <div class="card bg-f8 border-0">
                                    <div class="card-body p-4">
                                        <header class="d-flex align-items-center mb-5">
                                            @if(is_null($coach->user->personal_image))
                                                <img src="/images/users/default-avatar.png" class="img-fluid ms-3 rounded-circle" alt="" width="72px" height="72px">
                                            @else
                                                <img src="/documents/users/{{$coach->user->personal_image}}" class="img-fluid ms-3 rounded-circle" width="72px" height="72px">
                                            @endif
                                            <div class="title">
                                                <h5 class="card-title fw-bold mb-4 d-inline-block" style="color:#414141">{{$coach->user->fname.' '.$coach->user->lname}}</h5>
                                                @if($coach->confirm_faracoach)
                                                    <img src="images/main/verify-icon.svg" alt="">
                                                @endif
                                                <h6 class="card-subtitle mb-2 text-ae">{{$coach->user->job}}</h6>
                                            </div>
                                        </header>
                                        <!--
                                        <p class="card-text mb-5 text-ae">من به عنوان یک شریک و همراه در فکر کردن، کنار تو هستم تا افکار و باورهایی که مانع از رسیدن</p>
                                        -->
                                        <footer class="d-flex justify-content-between align-items-center">
                                            @if(!is_null($coach->user->username))
                                                <a href="{{route('clinic.coach.show',['user'=>$coach->user->username])}}" class="btn btn-primary">مشاهده پروفایل</a>
                                            @else
                                                <a href="" class="btn btn-primary" >اطلاعات ناقص کوچ</a>
                                            @endif
                                            <div class="d-inline-block">
                                                <!--
                                                <img src="images/main/medal.svg" alt="">
                                                <span>امتیاز: </span>
                                                <span class="text-secondary">۶ از ۱۰</span>
                                                -->
                                            </div>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>

                <!-- Add Navigation -->
                <span class="coaches-carousel__next-btn fs-4 d-none d-xl-block">
            <i class="isax isax-arrow-left-2 bg-d9 text-9f p-2 fw-bold rounded-circle"></i>
          </span>

            </div>

        </div>
    </section>

    <!-- SPECIAL EVENTS CAROUSEL
    ================================================== -->
    <section class="mb-6">
        <div class="container">
            <div class="row position-relative">

                <!-- Carousel main container -->
                <div class="events-carousel swiper">

                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">

                        @foreach($events as $event)
                            <!-- Slide -->
                            <div class="swiper-slide px-4">
                                <div class="row px-2 py-4 px-md-5 py-md-5 bg-primary rounded-3">

                                    <div class="col-lg-4 col-xxl-3 text-light text-center ps-lg-5 d-flex flex-column align-items-center justify-content-between">
                                        <div data-date="April 10, 2023 21:14:01" class="clockdiv counter mb-4 text-warning border border-2 rounded border-warning fs-3 fw-bold py-4 py-2 w-100" dir="ltr">
                                            <span class="days"></span>
                                            :
                                            <span class="hours"></span>
                                            :
                                            <span class="minutes"></span>
                                            :
                                            <span class="seconds"></span>
                                        </div>
                                        <h2 class="fw-bold mb-4 ">رویـــــــــــــــــــــــــــــداد هــــــــای فراکـــــــوچ</h2>
                                        <a href="{{route('event.show',['Event'=>$event->shortlink])}}" class="btn btn-warning text-light w-100 py-2 mb-4 mb-lg-0">ثبت نام در رویداد</a>
                                    </div>

                                    <div class="col-lg-8 col-xxl-9 bg-light p-0 rounded-3 d-flex">

                                        <!-- Image -->
                                        <img src="{{$event->image}}" class="d-none d-xxl-inline" alt="">

                                        <div class="content p-4">
                                            <img src="images/main/ticket-icon.svg" alt="">
                                            <h2 class="fw-bold mb-5 d-inline-block mt-4">{{$event->event}}</h2>
                                            <p class="mb-5 text-41 lh-lg">{{$event->description}}</p>
                                            @foreach($event->eventOrganizers as $organizer)

                                                <span class="fs-5 ms-3 mb-4 d-inline-block text-41"><i class="isax isax-user ms-1 text-primary fw-bold fs-4"></i> {{$organizer->user->fname.' '.$organizer->user->lname}}</span>
                                            @endforeach
                                            <span class="fs-5 ms-3 mb-4 d-inline-block text-41"><i class="isax isax-clock ms-1 text-primary fw-bold fs-4"></i> {{$event->start_time}} - {{$event->start_date}}</span>
                                            <br>
                                            <span class="fs-5 ms-3 mb-4 d-inline-block text-41"><i class="isax isax-people ms-1 text-primary fw-bold fs-4"></i> ظرفیت {{$event->capacity}} نفر</span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

                <!-- Add Navigation -->
                <span class="events-carousel__next-btn fs-4 d-none d-xl-block">
            <i class="isax isax-arrow-left-2 bg-d9 text-9f p-2 fw-bold rounded-circle"></i>
          </span>

            </div>
        </div>
    </section>

    <!-- ‌‌BLOG CAROUSEL
    ================================================== -->
    <section class="mb-6">

        <div class="container">

            <!-- Top Title -->
            <span class="text-84">مقالات فراکوچ</span>
            <div class="bottom-line bg-primary mt-2 mb-4"></div>

            <!-- Title -->
            <div class="row mb-5">
                <!-- Text -->
                <div class="col-12 col-md-8">
                    <img src="images/main/book-icon.svg" alt="">
                    <h2 class="d-inline-block fw-bold me-2 text-41 mb-0 section-title">مقالات آموزشی</h2>
                    <p class="mt-4">جدید ترین مقالات آموزشی در می توانید از این قسمت مطالعه کنید و نظرتان را با ما در میان بگذارید.</p>
                </div>
                <!-- Link -->
                <div class="col-12 col-md-4 text-md-start">
                    <div class="showmore d-inline-flex align-items-center">
                        <a href="#" class="text-decoration-none text-primary showmore__link">مشاهده همه</a>
                        <i class="isax isax-arrow-left text-primary fs-5 showmore__icon"></i>
                    </div>
                </div>
            </div>

            <!-- Blog Carousel -->
            <div class="row position-relative">

                <!-- Carousel main container -->
                <div class="blog-carousel swiper">

                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a href="#" class="text-decoration-none text-reset blog-carousel__link">
                                <div class="card bg-f8 border-0">

                                    <!-- Top -->
                                    <div class="blog-carousel__top mb-3">

                                        <img src="images/main/blog.jpg" class="img-fluid card-img-top blog-carousel__img" alt="">

                                        <div class="blog-carousel__overlay rounded text-light d-flex flex-column align-items-center justify-content-center ">
                                            <div class="blog-carousel__tags">
                                                <span>فراکوچ</span>
                                                <span>کوچینگ</span>
                                            </div>
                                            <i class="isax isax-link-21"></i>
                                        </div>

                                    </div>

                                    <!-- Content -->
                                    <div class="card-body">
                                        <h5 class="card-title text-dark fw-bold mb-4">دوره جامع آموزش و تربیت کوچ معتبر</h5>
                                        <div class="d-flex justify-content-between mb-2">

                                            <div>
                                                <span class="text-ae ms-2">1401/01/22</span>
                                                <span class="text-ae">10:47:23.ظ</span>
                                            </div>

                                            <div class="blog-carousel__showmore">
                                                <div class="d-inline-flex align-items-center">
                                                    <span href="#" class="text-decoration-none text-primary">مشاهده مقاله</span>
                                                    <i class="isax isax-arrow-left text-primary fs-5 me-2"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a href="#" class="text-decoration-none text-reset blog-carousel__link">
                                <div class="card bg-f8 border-0">

                                    <!-- Top -->
                                    <div class="blog-carousel__top mb-3">

                                        <img src="images/main/blog.jpg" class="img-fluid card-img-top blog-carousel__img" alt="">

                                        <div class="blog-carousel__overlay rounded text-light d-flex flex-column align-items-center justify-content-center ">
                                            <div class="blog-carousel__tags">
                                                <span>فراکوچ</span>
                                                <span>کوچینگ</span>
                                            </div>
                                            <i class="isax isax-link-21"></i>
                                        </div>

                                    </div>

                                    <!-- Content -->
                                    <div class="card-body">
                                        <h5 class="card-title text-dark fw-bold mb-4">دوره جامع آموزش و تربیت کوچ معتبر</h5>
                                        <div class="d-flex justify-content-between mb-2">

                                            <div>
                                                <span class="text-ae ms-2">1401/01/22</span>
                                                <span class="text-ae">10:47:23.ظ</span>
                                            </div>

                                            <div class="blog-carousel__showmore">
                                                <div class="d-inline-flex align-items-center">
                                                    <span href="#" class="text-decoration-none text-primary">مشاهده مقاله</span>
                                                    <i class="isax isax-arrow-left text-primary fs-5 me-2"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a href="#" class="text-decoration-none text-reset blog-carousel__link">
                                <div class="card bg-f8 border-0">

                                    <!-- Top -->
                                    <div class="blog-carousel__top mb-3">

                                        <img src="images/main/blog.jpg" class="img-fluid card-img-top blog-carousel__img" alt="">

                                        <div class="blog-carousel__overlay rounded text-light d-flex flex-column align-items-center justify-content-center ">
                                            <div class="blog-carousel__tags">
                                                <span>فراکوچ</span>
                                                <span>کوچینگ</span>
                                            </div>
                                            <i class="isax isax-link-21"></i>
                                        </div>

                                    </div>

                                    <!-- Content -->
                                    <div class="card-body">
                                        <h5 class="card-title text-dark fw-bold mb-4">دوره جامع آموزش و تربیت کوچ معتبر</h5>
                                        <div class="d-flex justify-content-between mb-2">

                                            <div>
                                                <span class="text-ae ms-2">1401/01/22</span>
                                                <span class="text-ae">10:47:23.ظ</span>
                                            </div>

                                            <div class="blog-carousel__showmore">
                                                <div class="d-inline-flex align-items-center">
                                                    <span href="#" class="text-decoration-none text-primary">مشاهده مقاله</span>
                                                    <i class="isax isax-arrow-left text-primary fs-5 me-2"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a href="#" class="text-decoration-none text-reset blog-carousel__link">
                                <div class="card bg-f8 border-0">

                                    <!-- Top -->
                                    <div class="blog-carousel__top mb-3">

                                        <img src="images/main/blog.jpg" class="img-fluid card-img-top blog-carousel__img" alt="">

                                        <div class="blog-carousel__overlay rounded text-light d-flex flex-column align-items-center justify-content-center ">
                                            <div class="blog-carousel__tags">
                                                <span>فراکوچ</span>
                                                <span>کوچینگ</span>
                                            </div>
                                            <i class="isax isax-link-21"></i>
                                        </div>

                                    </div>

                                    <!-- Content -->
                                    <div class="card-body">
                                        <h5 class="card-title text-dark fw-bold mb-4">دوره جامع آموزش و تربیت کوچ معتبر</h5>
                                        <div class="d-flex justify-content-between mb-2">

                                            <div>
                                                <span class="text-ae ms-2">1401/01/22</span>
                                                <span class="text-ae">10:47:23.ظ</span>
                                            </div>

                                            <div class="blog-carousel__showmore">
                                                <div class="d-inline-flex align-items-center">
                                                    <span href="#" class="text-decoration-none text-primary">مشاهده مقاله</span>
                                                    <i class="isax isax-arrow-left text-primary fs-5 me-2"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a href="#" class="text-decoration-none text-reset blog-carousel__link">
                                <div class="card bg-f8 border-0">

                                    <!-- Top -->
                                    <div class="blog-carousel__top mb-3">

                                        <img src="images/main/blog.jpg" class="img-fluid card-img-top blog-carousel__img" alt="">

                                        <div class="blog-carousel__overlay rounded text-light d-flex flex-column align-items-center justify-content-center ">
                                            <div class="blog-carousel__tags">
                                                <span>فراکوچ</span>
                                                <span>کوچینگ</span>
                                            </div>
                                            <i class="isax isax-link-21"></i>
                                        </div>

                                    </div>

                                    <!-- Content -->
                                    <div class="card-body">
                                        <h5 class="card-title text-dark fw-bold mb-4">دوره جامع آموزش و تربیت کوچ معتبر</h5>
                                        <div class="d-flex justify-content-between mb-2">

                                            <div>
                                                <span class="text-ae ms-2">1401/01/22</span>
                                                <span class="text-ae">10:47:23.ظ</span>
                                            </div>

                                            <div class="blog-carousel__showmore">
                                                <div class="d-inline-flex align-items-center">
                                                    <span href="#" class="text-decoration-none text-primary">مشاهده مقاله</span>
                                                    <i class="isax isax-arrow-left text-primary fs-5 me-2"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <!-- Add Navigation -->
                <span class="blog-carousel__next-btn fs-4 d-none d-xl-block">
              <i class="isax isax-arrow-left-2 bg-d9 text-9f p-2 fw-bold rounded-circle"></i>
            </span>

            </div>

        </div>

    </section>

    <!-- COACHES VIDEOS
    ================================================== -->

    <section class="mb-4">

        <!-- Slider -->
        <div class="container-fluid">
            <div class="row position-relative">
                <!-- Carousel main container -->
                <div class="coachesvideos-carousel swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="coachesvideos-carousel__container">
                                <img src="images/main/coaches-videos-02.png" alt="" class="img-fluid">
                                <a href="#!" data-bs-toggle="modal" data-bs-target="#videomodal0Modal">
                                    <img src="images/main/video-circle.svg" alt="" class="coachesvideos-carousel__container__icon">
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="coachesvideos-carousel__container">
                                <img src="images/main/coaches-videos-03.png" alt="" class="img-fluid">
                                <a href="#!" data-bs-toggle="modal" data-bs-target="#videomodal1Modal">
                                    <img src="images/main/video-circle.svg" alt="" class="coachesvideos-carousel__container__icon">
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="coachesvideos-carousel__container">
                                <img src="images/main/coaches-videos-04.png" alt="" class="img-fluid">
                                <a href="#!" data-bs-toggle="modal" data-bs-target="#videomodal2Modal">
                                    <img src="images/main/video-circle.svg" alt="" class="coachesvideos-carousel__container__icon">
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="coachesvideos-carousel__container">
                                <img src="images/main/coaches-videos-05.png" alt="" class="img-fluid">
                                <a href="#!" data-bs-toggle="modal" data-bs-target="#videomodal3Modal">
                                    <img src="images/main/video-circle.svg" alt="" class="coachesvideos-carousel__container__icon">
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="coachesvideos-carousel__container">
                                <img src="images/main/coaches-videos-02.png" alt="" class="img-fluid">
                                <a href="#!" data-bs-toggle="modal" data-bs-target="#videomodal4Modal">
                                    <img src="images/main/video-circle.svg" alt="" class="coachesvideos-carousel__container__icon">
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="coachesvideos-carousel__container">
                                <img src="images/main/coaches-videos-03.png" alt="" class="img-fluid">
                                <a href="#!" data-bs-toggle="modal" data-bs-target="#videomodal5Modal">
                                    <img src="images/main/video-circle.svg" alt="" class="coachesvideos-carousel__container__icon">
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="coachesvideos-carousel__container">
                                <img src="images/main/coaches-videos-04.png" alt="" class="img-fluid">
                                <a href="#!" data-bs-toggle="modal" data-bs-target="#videomodal6Modal">
                                    <img src="images/main/video-circle.svg" alt="" class="coachesvideos-carousel__container__icon">
                                </a>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="coachesvideos-carousel__container">
                                <img src="images/main/coaches-videos-05.png" alt="" class="img-fluid">
                                <a href="#!" data-bs-toggle="modal" data-bs-target="#videomodal7Modal">
                                    <img src="images/main/video-circle.svg" alt="" class="coachesvideos-carousel__container__icon">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals -->

        <!-- Video Modal 0 -->
        <div class="modal fade" id="videomodal0Modal" tabindex="-1" aria-labelledby="videomodal0ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videomodal0ModalLabel">معرفی فراکوچ</h5>
                        <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <video controls width="100%">
                            <source src="images/main/sample-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">خروج</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Modal 1 -->
        <div class="modal fade" id="videomodal1Modal" tabindex="-1" aria-labelledby="videomodal1ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videomodal1ModalLabel">معرفی فراکوچ</h5>
                        <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <video controls width="100%">
                            <source src="images/main/sample-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">خروج</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Modal 2 -->
        <div class="modal fade" id="videomodal2Modal" tabindex="-1" aria-labelledby="videomodal2ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videomodal2ModalLabel">معرفی فراکوچ</h5>
                        <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <video controls width="100%">
                            <source src="images/main/sample-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">خروج</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Modal 3 -->
        <div class="modal fade" id="videomodal3Modal" tabindex="-1" aria-labelledby="videomodal3ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videomodal3ModalLabel">معرفی فراکوچ</h5>
                        <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <video controls width="100%">
                            <source src="images/main/sample-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">خروج</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Modal 4 -->
        <div class="modal fade" id="videomodal4Modal" tabindex="-1" aria-labelledby="videomodal4ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videomodal4ModalLabel">معرفی فراکوچ</h5>
                        <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <video controls width="100%">
                            <source src="images/main/sample-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">خروج</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Modal 5 -->
        <div class="modal fade" id="videomodal5Modal" tabindex="-1" aria-labelledby="videomodal5ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videomodal5ModalLabel">معرفی فراکوچ</h5>
                        <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <video controls width="100%">
                            <source src="images/main/sample-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">خروج</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Modal 6 -->
        <div class="modal fade" id="videomodal6Modal" tabindex="-1" aria-labelledby="videomodal6ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videomodal6ModalLabel">معرفی فراکوچ</h5>
                        <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <video controls width="100%">
                            <source src="images/main/sample-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">خروج</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Modal 7 -->
        <div class="modal fade" id="videomodal7Modal" tabindex="-1" aria-labelledby="videomodal7ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videomodal7ModalLabel">معرفی فراکوچ</h5>
                        <button type="button" class="btn-close ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <video controls width="100%">
                            <source src="images/main/sample-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">خروج</button>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <section class="mb-6">
        <div class="container-fluid">

            <div class="row position-relative">

                <div class="testimonial-carousel swiper">

                    <div class="swiper-wrapper">


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                            <div class="testimonial-carousel__card card border-0 p-2s bg-f8">
                                <div class="card-body p-0">
                                    <img src="images/main/quote-icon.svg" class="ms-2" alt="">
                                    <img src="images/main/testimonial.png" class="ms-2" alt="">
                                    <h6 class="card-title d-inline-block">محمد اسماعیلی</h6>
                                    <p class="card-text mt-4">فراکوچ یکی از بهترین مجموعه های آموزشی با پشتیبانی عالی و کاملا کاربردی</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>



    <!-- FAQ
    ================================================== -->
    <section class="main-page-faq mb-6">
        <div class="container">

            <!-- Top Title -->
            <span class="text-84">فراکوچ FAQ</span>
            <div class="bottom-line bg-primary mt-2 mb-4"></div>

            <!-- Title -->
            <div class="row mb-5">

                <!-- Text -->
                <div class="col-12 col-md-8">
                    <img src="images/main/messages-icon.svg" alt="">
                    <h2 class="d-inline-block fw-bold me-2 text-41 mb-0 section-title">سوالات متداول</h2>
                    <p class="mt-4">برای بهره وری بهتر شما از وبسایت، سوالات پر تکرار شما را در این بخش پاسخ داده ایم</p>
                </div>

                <!-- Link -->
                <div class="col-12 col-md-4 text-md-start">
                    <div class="showmore d-inline-flex align-items-center">
                        <a href="#" class="text-decoration-none text-primary showmore__link">مشاهده همه</a>
                        <i class="isax isax-arrow-left text-primary fs-5 showmore__icon"></i>
                    </div>
                </div>
            </div>

            <div class="accordion" id="accordionExample">

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header" id="headingone">
                        <button class="accordion-button collapsed pe-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                            جلسات کوچینگ رایگان
                        </button>
                    </h2>
                    <div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone" data-bs-parent="#accordionExample">
                        <div class="accordion-body lh-lg">
                            <strong>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</strong> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود <code>ابزارهای کاربردی</code> می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed pe-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            آموزش کوچینگ
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body lh-lg">
                            <strong>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</strong> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود <code>ابزارهای کاربردی</code> می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed pe-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            تربیت کوچ
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body lh-lg">
                            <strong>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</strong> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود <code>ابزارهای کاربردی</code> می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed pe-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            رویداد ها و سمینار ها
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body lh-lg">
                            <strong>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</strong> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود <code>ابزارهای کاربردی</code> می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed pe-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            ارائه مدارک بین المللی
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body lh-lg">
                            <strong>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</strong> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود <code>ابزارهای کاربردی</code> می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>


@endcomponent

