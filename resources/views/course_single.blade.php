@component('master.index')



<section class="single-course-welcome mb-6" style="background-image: url('/images/single_course/welcome-background.jpg');">

    <div class="container">
        <div class="row flex-xl-row-reverse align-items-center">

            <!-- Coach -->
            <div class="col-12 col-xl-6 position-relative text-center text-xl-start">


                <img src="/images/single_course/welcome-image.png" class="img-fluid mt-xl-n5" alt="">

                <!-- Icons -->
                <div class="d-flex justify-content-between justify-content-xl-end mt-5 mb-5 mb-xl-0">

                    <div class="text-center text-light ms-5">
                        <img src="/images/single_course/welcome-icon-01.svg" class="mb-3" alt="">
                        <p>{{$course->start}}</p>
                    </div>

                    <div class="text-center text-light ms-5">
                        <img src="/images/single_course/welcome-icon-03.svg" class="mb-3" alt="">
                        <p>بصورت آنلاین و حضوری</p>
                    </div>

                    <div class="text-center text-light">
                        <img src="/images/single_course/welcome-icon-02.svg" class="mb-3" alt="">
                        <p>{{$course->duration}} ساعت آموزش</p>
                    </div>

                </div>
            </div>

            <!-- Course -->
            <div class="single-course-welcome__course col-12 col-xl-6 align-self-end">
                <div class="card text-center px-3 py-5 px-sm-5 py-sm-5 mx-auto me-xl-0" style="max-width: 550px;">
                    <div class="card-body p-0">
                        <h1 class="card-title fs-2 fw-bold">{{$course->course}}</h1>
                        <p class="card-text lh-lg">شایستگی را در استفاده از انواع رفتارها و مهارت‌ها در کار خود با مراجعان نشان داده‌اند.</p>
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#welcomeCourseModal">
                            <div class="single-course-welcome__course__video position-relative">
                                <img src="{{$course->image}}" alt="" class="img-fluid">
                                <img src="/images/main/video-circle.svg" alt="" class="single-course-welcome__course__video__icon">
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Video Modal -->
    <div class="modal fade" id="welcomeCourseModal" tabindex="-1" aria-labelledby="welcomeCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="welcomeCourseModalLabel">{{$course->course}}</h5>
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

<!-- MAIN
================================================== -->
<section class="mb-5">
    <div class="container">

        <div class="row flex-xl-row-reverse g-0 g-xl-5">

            <!-- Main -->
            <main class="col-12 col-xl-8 p-0 pe-xl-5">

                <!-- Course Title -->
                <section class="mb-5">
                    <div class="d-flex align-items-center mb-4">
                        <img src="images/single_course/aside-icon-07.svg" alt="">
                        <h2 class="d-inline-block me-3 fw-bold">توضیحات دوره</h2>
                    </div>

                </section>

                <!-- Course Description -->
                <section class="mb-6">
                    <h5 class="fw-bold mt-5 mb-4">{{$course->course}}</h5>
                    <div class="fade-show-more">
                        <div class="collapse" id="descriptionCollapse">
                            <div class="fade-show-more__overlay"></div>
                            {!! $course->infocourse !!}
                        </div>
                        <a class="position-relative d-block text-center text-decoration-none" data-bs-toggle="collapse" href="#descriptionCollapse" role="button" aria-expanded="false" aria-controls="descriptionCollapse">
                            <span class="hide">نمایش ادامه توضیحات</span>
                            <span class="show">مخفی کردن توضیحات</span>
                            <i class="isax isax-arrow-down-1 d-block fs-4 mt-2"></i>
                            <i class="isax isax-arrow-up-2 d-block fs-4 mt-2"></i>
                        </a>
                    </div>
                </section>

                <!-- Course Headings
                <section class="mb-6">
                    <div class="d-flex align-items-center mb-4">
                        <img src="images/single_course/main-icon-04.svg" alt="">
                        <h2 class="d-inline-block me-3 fw-bold mb-0">سرفصل ‌های دوره</h2>
                    </div>
                    <p class="text-70 mb-5">شایستگی را در استفاده از انواع رفتارها و مهارت‌ها در کار خود با مراجعان نشان داده‌اند. </p>

                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item border-0 mb-3 rounded-3 bg-f8">
                            <h2 class="accordion-header rounded-3 bg-f8" id="headingOne">
                                <button class="accordion-button collapsed rounded-3 bg-f8" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <img src="images/single_course/main-icon-08.svg" class="ms-3" alt="">
                                    <span>معرفی کوچینگ</span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse rounded-3 collapse bg-f8" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body rounded-3 bg-f8">
                                    <li class="text-70 me-4 mb-4">شایستگی را در استفاده از انواع رفتارها و مهارت‌ها در کار خود با مراجعان نشان داده‌اند. </li>
                                    <video controls width="100%" class="rounded-3">
                                        <source src="images/main/sample-video.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 rounded-3 bg-f8">
                            <h2 class="accordion-header rounded-3 bg-f8" id="headingTwo">
                                <button class="accordion-button collapsed rounded-3 bg-f8" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <img src="images/single_course/main-icon-08.svg" class="ms-3" alt="">
                                    <span>کوچینگ چیست؟</span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse rounded-3 collapse bg-f8" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body rounded-3 bg-f8">
                                    <li class="text-70 me-4 mb-4">شایستگی را در استفاده از انواع رفتارها و مهارت‌ها در کار خود با مراجعان نشان داده‌اند. </li>
                                    <video controls width="100%" class="rounded-3">
                                        <source src="images/main/sample-video.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 rounded-3 bg-f8">
                            <h2 class="accordion-header rounded-3 bg-f8" id="headingThree">
                                <button class="accordion-button collapsed rounded-3 bg-f8" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <img src="images/single_course/main-icon-08.svg" class="ms-3" alt="">
                                    <span>کوچینگ انفرادی و تمرین ها</span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse rounded-3 collapse bg-f8" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body rounded-3 bg-f8">
                                    <li class="text-70 me-4 mb-4">شایستگی را در استفاده از انواع رفتارها و مهارت‌ها در کار خود با مراجعان نشان داده‌اند. </li>
                                    <video controls width="100%" class="rounded-3">
                                        <source src="images/main/sample-video.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 rounded-3 bg-f8">
                            <h2 class="accordion-header rounded-3 bg-f8" id="headingFour">
                                <button class="accordion-button collapsed rounded-3 bg-f8" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <img src="images/single_course/main-icon-08.svg" class="ms-3" alt="">
                                    <span>کوچینگ سازمانی و نکات مثبت</span>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse rounded-3 collapse bg-f8" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body rounded-3 bg-f8">
                                    <li class="text-70 me-4 mb-4">شایستگی را در استفاده از انواع رفتارها و مهارت‌ها در کار خود با مراجعان نشان داده‌اند. </li>
                                    <video controls width="100%" class="rounded-3">
                                        <source src="images/main/sample-video.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
                -->
                <!-- Course Coaches -->
                <section class="mb-6">

                    <div class="d-flex align-items-center mb-4">
                        <img src="images/single_course/main-icon-05.svg" alt="">
                        <h2 class="d-inline-block me-3 fw-bold">مدرسین دوره</h2>
                    </div>
                    <p class="text-70">شایستگی را در استفاده از انواع رفتارها و مهارت‌ها در کار خود با مراجعان نشان داده‌اند. </p>

                    <div class="row mt-5">
                        @foreach($course->teachers as $teacher)
                            <div class="course-coache col-12 col-md-4 mb-5 mb-md-0 text-center">

                                <a href="" class="course-coache__link d-inline-block mb-4">
                                    <div class="course-coache__top d-inline-block">

                                        <img src="/documents/users/{{$teacher->user->personal_image}}" alt="" class="course-coache__top__img rounded-circle" width="200px" height="200px">
                                        <!--
                                        <div class="course-coache__top__overlay text-light d-flex flex-column align-items-center justify-content-center ">
                                            <p class="fw-bold">۱،۰۰۰،۰۰۰ تومان</p>
                                            <small class="">مدرک بین المللی</small>
                                        </div>
                                        -->
                                    </div>
                                </a>

                                <h3 class="mb-3 fw-bold">{{$teacher->user->fname.' '.$teacher->user->lname}}</h3>
                                <h5 class="mb-3 text-ae">{{$teacher->user->education}}</h5>
                                <small class="text-secondary">{{$teacher->user->job}}</small>

                            </div>
                        @endforeach
                    </div>

                </section>

                <!-- Course Features
                <section class="mb-6">
                    <div class="d-flex align-items-center mb-4">
                        <img src="images/single_course/main-icon-06.svg" alt="">
                        <h2 class="d-inline-block me-3 fw-bold">ویژگی‌های دوره</h2>
                    </div>
                    <p class="text-70">شایستگی را در استفاده از انواع رفتارها و مهارت‌ها در کار خود با مراجعان نشان داده‌اند. </p>
                    <div class="row mt-5">

                        <div class="col-12 col-md-4 mb-4">
                            <div class="card bg-f8 border-0 h-100">
                                <div class="card-body text-center p-4">
                                    <div class="text-center"><img src="images/single_course/main-icon-03.svg" class="mb-4" alt=""></div>
                                    <h5 class="card-title fw-bold mb-4">ارائه مدرک پایان دوره</h5>
                                    <p class="card-text text-84 lh-lg">در پایان این دوره به شما مدرک بین المللی از موسسه معتبر MPT اتریش ارائه می‌شود که شماره سریال مدرک خود را نیز می‌توانید در سایت این موسسه چک بفرمایید.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card bg-f8 border-0 h-100">
                                <div class="card-body text-center p-4">
                                    <div class="text-center"><img src="images/single_course/main-icon-01.svg" class="mb-4" alt=""></div>
                                    <h5 class="card-title fw-bold mb-4">طراحی شده ویژه بازار کار</h5>
                                    <p class="card-text text-84 lh-lg">این دوره به نحوی تدوین شده است که برای بازارکار ایران کاملا کارآمد باشد و در تدریس نیز از مثال‌هایی از کسب‌و‌کارهای واقعی ارائه می‌شود.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card bg-f8 border-0 h-100">
                                <div class="card-body text-center p-4">
                                    <div class="text-center"><img src="images/single_course/main-icon-02.svg" class="mb-4" alt=""></div>
                                    <h5 class="card-title fw-bold mb-4">پشتیبانی و همایت</h5>
                                    <p class="card-text text-84 lh-lg">این دوره یک گروه تلگرامی ویژه دارد که شما در آن می‌توانید با استادیارها و دیگر دانشجویان در ارتباط باشید و پاسخ سوالات خود را دریافت کنید.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                -->
                <!-- Students Testimonials
                <section class="mb-6">
                    <div class="d-flex align-items-center mb-4">
                        <img src="images/single_course/main-icon-07.svg" alt="">
                        <h2 class="d-inline-block me-3 fw-bold">رضایت دانش پذیران</h2>
                    </div>
                    <p class="text-70">شایستگی را در استفاده از انواع رفتارها و مهارت‌ها در کار خود با مراجعان نشان داده‌اند. </p>

                    <div class="studentstestimonials row mt-5 position-relative">


                        <div class="studentstestimonials-carousel swiper">

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


                        <span class="studentstestimonials__next-btn fs-4 d-none d-xl-block">
                                <i class="isax isax-arrow-left-2 bg-d9 text-9f p-2 fw-bold rounded-circle"></i>
                            </span>

                    </div>


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
                -->
            </main>

            <!--Aside-->
            <aside class="col-12 col-xl-4 mb-6 mb-xl-0">

                <!-- Check Out -->
                <div class="card bg-f8 border-0 rounded-3 mb-5">
                    <div class="card-body p-4">
                        <img src="images/single_course/aside-icon-01.svg" class="ms-2" alt="">
                        <h5 class="card-title d-inline-block fw-bold">{{$course->course}}</h5>
                        <ul class="list-group mt-4 p-0">

                            <li class="list-group-item border-0 rounded-1 py-3 d-flex align-items-center mb-4">
                                <img src="images/single_course/aside-icon-02.svg" class="ms-3 d-inline-block" alt="">
                                <span> {{$course->duration}} ساعت آموزش</span>
                            </li>

                            <li class="list-group-item border-0 rounded-1 py-3 d-flex align-items-center mb-4">
                                <img src="images/single_course/aside-icon-03.svg" class="ms-3 d-inline-block" alt="">
                                <span>{{$course->start}}</span>
                            </li>

                            <li class="list-group-item border-0 rounded-1 py-3 d-flex align-items-center mb-4">
                                <img src="images/single_course/aside-icon-04.svg" class="ms-3 d-inline-block" alt="">
                                <span>بصورت آنلاین و حضوری</span>
                            </li>

                            @foreach($course->teachers as $teacher)
                            <li class="list-group-item border-0 rounded-1 py-3 d-flex align-items-center mb-4">
                                <img src="images/single_course/aside-icon-05.svg" class="ms-3 d-inline-block" alt="">
                                <span>{{$teacher->user->fname.' '.$teacher->user->lname}}</span>
                            </li>
                            @endforeach

                        </ul>
                        <form action="">
                            @if($course->type_peymant_id==1||$course->type_peymant_id==3)

                                <div class="form-check d-inline-block ms-5 py-4">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        نقدی
                                    </label>
                                </div>
                            @endif

                            @if($course->type_peymant_id==2||$course->type_peymant_id==3)
                                <div class="form-check d-inline-block py-4">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        اقساطی
                                    </label>
                                </div>
                            @endif

                            <div class="price fw-bold text-secondary fs-3 mb-4">{{number_format($course->fi_off)}} تومان</div>

                            <button type="submit" class="btn btn-primary d-block w-100 py-3 fw-bold rounded-3">ثبت نام دوره</button>
                        </form>
                    </div>
                </div>

                <!-- Counseling -->
                <div class="card bg-f8 border-0 rounded-3">
                    <div class="card-body p-4">
                        <img src="images/single_course/aside-icon-06.svg" class="ms-2" alt="">
                        <h5 class="card-title d-inline-block fw-bold mb-4">مشاوره بگیر</h5>

                        <form method="post" action="">
                            <input type="name" class="form-control py-3 mb-4 border-0 rounded-3" id="fname" name="fname" placeholder="نام">
                            <input type="name" class="form-control py-3 mb-4 border-0 rounded-3" id="lname" name="lname" placeholder="نام خانوادگی">
                            <input type="phone" class="form-control py-3 mb-4 border-0 rounded-3" id="tel" name="tel" placeholder="شماره همراه">
                            <button type="submit" class="btn btn-primary d-block w-100 py-3 fw-bold rounded-3">ثبت اطلاعات</button>
                        </form>
                    </div>
                </div>

            </aside>

        </div>

    </div>
</section>
@endcomponent

