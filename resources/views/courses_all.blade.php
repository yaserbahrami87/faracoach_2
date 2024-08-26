@component('master.index')
    <!-- Hero
    ================================================== -->
    <section class="list-of-courses-welcome mb-5 py-5 py-xl-0" style="background-image: url('images/list_of_courses/special-offers-background.png')">
        <div class="container">
            <div class="list-of-courses-welcome__row row">

                <!-- Title -->
                <div class="col-12 col-xl-6 text-center text-xl-end mb-5 mb-sm-0">
                    <h1 class="fw-bold mb-4">دوره‌ های آموزشی فراکوچ</h1>
                    <p class="mb-4 lh-lg">ILO  معتبرترین مدرک ملی کوچینگ با اعتبار بین المللی زیر نظر سازمان فنی و حرفه‌ای <br> کشور و سازمان جهانی</p>
                    <a href="#" class="btn btn-primary px-5 py-2">
                        <span class="d-block px-4 py-1">کلینیک</span>
                    </a>
                </div>

                <!-- Special Offers Carousel -->
                <div class="special-offres col-12 col-xl-6 position-relative">

                    <!-- Carousel main container -->
                    <div class="special-offres__carousel swiper">
                        <div class="swiper-wrapper">
                            <!-- Slide -->
                            @foreach($courses->whereNotNull('fi_off') as $course)
                                <div class="swiper-slide">

                                    <div class="row g-0 justify-content-center justify-content-xl-center">

                                        <!-- Image & Countdown -->
                                        <div class="col-auto position-relative me-xl-auto">
                                            <div data-date="April 10, 2023 21:14:01" class="clockdiv">
                                                <span class="days"></span> : <span class="hours"></span> : <span class="minutes"></span> : <span class="seconds"></span>
                                            </div>
                                            <img src="{{$course->image}}" alt="" width="250px" height="250px">
                                        </div>

                                        <!-- Price & Info -->
                                        <div class="special-offres__info col-12 col-sm-6 text-center text-sm-end">

                                            <!-- Top Title -->
                                            <ul class="m-0 pe-3 text-warning mb-4">
                                                <li>
                                                    <span>پیشنهاد ویژه</span>
                                                    <img src="images/list_of_courses/discount-shape.svg" alt="">
                                                </li>
                                            </ul>

                                            <!-- Title -->
                                            <h4 class="fw-bold lh-lg mb-4">{{$course->course}}</h4>

                                            <!-- Price -->
                                            <div class="fs-4 fw-bold text-warning mb-3">{{number_format($course->fi_off)}} تومان</div>
                                            <div class="fs-4 fw-bold text-9f mb-3 text-decoration-line-through">{{number_format($course->fi)}} تومان</div>

                                        </div>
                                    </div>

                                </div>
                            @endforeach

                            <!-- Slide -->


                        </div>
                    </div>

                    <!-- Add Navigation -->
                    <span class="special-offres__next-btn fs-4 d-none d-xl-block">
                        <i class="isax isax-arrow-left-2 bg-d9 text-9f p-2 fw-bold rounded-circle"></i>
                    </span>

                </div>

            </div>
        </div>
    </section>

    <!-- Suggested Courses
    ================================================== -->
    <section class="suggested-courses mb-6">
        <div class="container">
            <div class="row">

                <div class="suggested-courses__course col-12 col-lg-4 mb-4">
                    <div class="card bg-f8 border-0">
                        <img src="images/list_of_courses/suggested-course-03.jpg" class="card-img-top mb-4" alt="">
                        <div class="card-body px-4">
                            <div class="text-center"><img src="images/list_of_courses/icon-03.svg" class="mb-5" alt=""></div>
                            <h5 class="card-title fw-bold mb-4">دوره جامع سطح یک کوچینگ</h5>
                            <p class="card-text text-84 mb-5 lh-lg">دارندگان مدرک تحصیلی کوچینگ حرفه‌ای (PCC) با بیش از 125 ساعت آموزش و تجربه بیش از 500 ساعت حضور در جلسات کوچینگ به‌عنوان کوچ و شرکت و قبولی در آزمون CKA این مدرک را از  فدراسیون بین </p>
                            <div class="showmore d-flex align-items-center justify-content-end mb-3">
                                <a href="#" class="text-decoration-none text-primary showmore__link ">مشاهده دوره</a>
                                <i class="isax isax-arrow-left text-primary fs-5 showmore__icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="suggested-courses__course col-12 col-lg-4 mb-4">
                    <div class="card bg-f8 border-0">
                        <img src="images/list_of_courses/suggested-course-02.jpg" class="card-img-top mb-4" alt="">
                        <div class="card-body px-4">
                            <div class="text-center"><img src="images/list_of_courses/icon-02.svg" class="mb-5" alt=""></div>
                            <h5 class="card-title fw-bold mb-4">دوره جامع سطح یک کوچینگ</h5>
                            <p class="card-text text-84 mb-5 lh-lg">دارندگان مدرک تحصیلی کوچینگ حرفه‌ای (PCC) با بیش از 125 ساعت آموزش و تجربه بیش از 500 ساعت حضور در جلسات کوچینگ به‌عنوان کوچ و شرکت و قبولی در آزمون CKA این مدرک را از  فدراسیون بین </p>
                            <div class="showmore d-flex align-items-center justify-content-end mb-3">
                                <a href="#" class="text-decoration-none text-primary showmore__link ">مشاهده دوره</a>
                                <i class="isax isax-arrow-left text-primary fs-5 showmore__icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="suggested-courses__course col-12 col-lg-4 mb-4">
                    <div class="card bg-f8 border-0">
                        <img src="images/list_of_courses/suggested-course-01.jpg" class="card-img-top mb-4" alt="">
                        <div class="card-body px-4">
                            <div class="text-center"><img src="images/list_of_courses/icon-01.svg" class="mb-5" alt=""></div>
                            <h5 class="card-title fw-bold mb-4">دوره جامع سطح یک کوچینگ</h5>
                            <p class="card-text text-84 mb-5 lh-lg">دارندگان مدرک تحصیلی کوچینگ حرفه‌ای (PCC) با بیش از 125 ساعت آموزش و تجربه بیش از 500 ساعت حضور در جلسات کوچینگ به‌عنوان کوچ و شرکت و قبولی در آزمون CKA این مدرک را از  فدراسیون بین </p>
                            <div class="showmore d-flex align-items-center justify-content-end mb-3">
                                <a href="#" class="text-decoration-none text-primary showmore__link ">مشاهده دوره</a>
                                <i class="isax isax-arrow-left text-primary fs-5 showmore__icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Courses List
    ================================================== -->
    <section class="mb-6">
        <div class="container">

            <!-- Sort Items -->
            <div class="d-flex flex-wrap align-items-center mb-3 lh-lg">
                <i class="isax isax-sort fs-3 ms-3"></i>
                <span class="ms-3">مرتب سازی: </span>
                <a href="{{route('course.all')}}" class="ms-3 text-decoration-none text-70"> در حال ثبت نام </a>
                <a href="{{route('course.all',['type'=>'performing'])}}" class="ms-3 text-decoration-none text-70"> در حال برگذاری </a>
                <a href="{{route('course.all',['type'=>'special'])}}" class="ms-3 text-decoration-none text-70"> پیشنهاد های ویژه </a>
                <a href="{{route('course.all',['type'=>'held'])}}" class="ms-3 text-decoration-none text-70"> برگذار شده </a>
            </div>

            <hr class="mb-5">

            <!-- Items -->
            <div class="row mb-5">
                @foreach($courses as $course)
                    <div class="courseItem col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{route('course.show',['course'=>$course])}}" class="text-decoration-none text-reset courseItem__link">
                            <div class="card border-0 bg-f8">

                                <!-- Image -->
                                <div class="courseItem__top mb-3">

                                    <img src="{{$course->image}}" class="img-fluid card-img-top courseItem__img" alt="" style="height: 180px !important;">

                                    <div class="courseItem__overlay rounded text-light d-flex flex-column align-items-center justify-content-center ">
                                        <p class="mb-5">{{$course->course}}</p>
                                        <i class="isax isax-export-3 d-block mb-3 fs-2"></i>
                                        <span class="fw-bold fs-5">مشاهده دوره</span>
                                    </div>


                                    @foreach($course->teachers as $teacher)
                                        <div class="courseItem__coach">
                                            @if(is_null($teacher->user->personal_image))
                                                <img src="/images/users/default-avatar.png" alt="" width="50px" height="50px" />
                                            @else
                                                <img src="/documents/users/{{$teacher->user->personal_image}}" alt="{{$teacher->user->fname.' '.$teacher->user->lname}}" width="50px" height="50px">
                                            @endif
                                            <small class="text-light me-2">{{$teacher->user->fname.' '.$teacher->user->lname}}</small>
                                        </div>
                                    @endforeach

                                </div>


                                <div class="card-body">

                                    <!-- Blob -->
                                    <div class="sort d-flex align-items-center mb-2">
                                        <div class="blob blue d-inline-block"></div>
                                        <small class="me-1 text-primary">در حال ثبت نام</small>
                                    </div>

                                    <!-- Title -->
                                    <h5 class="card-title fw-bold lh-lg mb-3 text-dark">{{$course->course}}</h5>

                                    <!-- Info -->
                                    <span class="text-9f" dir="ltr">{{$course->course_times}} | {{$course->start}}</span>

                                </div>
                            </div>

                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Pagination
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true"><i class="isax isax-arrow-left-2 fs-5" aria-hidden="true"></i></span>
                  </a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="">...</a></li>
                <li><a href="#">4</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true"><i class="isax isax-arrow-right-3 fs-5" aria-hidden="true"></i></span>
                  </a>
                </li>
              </ul>
            </nav>
            -->

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

@endcomponent



