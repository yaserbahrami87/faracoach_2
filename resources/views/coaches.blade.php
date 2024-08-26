@extends('master.index')

@section('content')
<!-- HERO
    ================================================== -->
<section class="list-of-coaches-welcome mb-5" style="background-image: url('imaes/list_of_coaches/hero-background.png')">
    <div class="container">
        <div class="row flex-xl-row-reverse align-items-center">

            <!-- Floating Images -->
            <div class="col-12 col-xl-6 mb-5 mb-xl-0 text-center text-xl-start position-relative ">
                <img src="images/list_of_coaches/hero-group.png" class="img-fluid" alt="">
                <img src="images/list_of_coaches/floating-images-01.png" class="float-one" alt="">
                <img src="images/list_of_coaches/floating-images-03.png" class="float-two" alt="">
                <img src="images/list_of_coaches/floating-images-02.png" class="float-three" alt="">
                <img src="images/list_of_coaches/floating-images-04.png" class="float-four" alt="">
            </div>

            <!-- Page Title -->
            <div class="col-12 col-xl-6 d-flex justify-content-end">
                <div class="list-of-coaches-welcome__title">

                    <!-- Title -->
                    <h1 class="fw-bold mb-4">کوچ مد نظر خودتان را رزرو کنید</h1>

                    <!-- Sub Title -->
                    <p class="lh-lg mb-4">ILO  معتبرترین مدرک ملی کوچینگ با اعتبار بین المللی زیر نظر سازمان فنیو حرفه ای کشور و سازمان جهانی</p>

                    <!-- Buttons -->
                    <button type="button" class="list-of-coaches-welcome__title__btn btn btn-primary ms-4 rounded-3">قوانین و ضوابط</button>
                    <button type="button" class="list-of-coaches-welcome__title__btn list-of-coaches-welcome__title__btn--hover btn rounded-pill p-0 text-secondary" data-bs-toggle="modal" data-bs-target="#heroModal">
                        <img src="images/main/play-icon.svg" alt="">
                        <span class="ms-4 me-2">کوچینگ چیست؟</span>
                    </button>

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

                    <!-- Search Input -->
                    <form action="">
                        <div class="main-search__text input-group flex-row-reverse mt-4 shadow-sm">
                            <input type="text" class="form-control border-0" placeholder="جستجو کوچ" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <span class="input-group-text border-0" id="button-addon1"><i class="isax isax-search-normal-1 text-cb"></i></span>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- MAIN
================================================== -->
<div class="container mb-6">
    <div class="row">

        <!-- ASIDE
        ================================================== -->
        <aside class="col-12 col-xl-3 mb-5">

            <!-- Filters -->
            <form action="" class="list-of-coaches-filters">
                <div class="accordion bg-f8 py-3 rounded-3" id="listOfCoachesFilters">

                    <!-- Coaching Type Filter -->
                    <div class="accordion-item border-0">

                        <h2 class="accordion-header" id="coachingTypeFilterHeading">
                            <button class="accordion-button bg-f8 text-ae fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#coachingTypeFilter" aria-expanded="true" aria-controls="coachingTypeFilter">
                                نوع کوچینگ
                            </button>
                        </h2>

                        <div id="coachingTypeFilter" class="accordion-collapse collapse show bg-f8" aria-labelledby="coachingTypeFilterHeading">
                            <div class="accordion-body">

                                <div class="form-check mb-3 border-bottom pb-3">
                                    <input class="form-check-input ms-2" type="checkbox" value="" id="one">
                                    <label class="form-check-label user-select-none p-1" for="one">
                                        لایف کوچینگ
                                    </label>
                                </div>

                                <div class="form-check mb-3 border-bottom pb-3">
                                    <input class="form-check-input ms-2" type="checkbox" value="" id="two">
                                    <label class="form-check-label user-select-none p-1" for="two">
                                        بیزینس کوچینگ
                                    </label>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Coaching Subject Filter -->
                    <div class="accordion-item border-0">

                        <h2 class="accordion-header" id="coachingSubjectFilterHeading">
                            <button class="accordion-button bg-f8 text-ae fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#coachingSubjectFilter" aria-expanded="true" aria-controls="coachingSubjectFilter">
                                موضوع کوچینگ
                            </button>
                        </h2>

                        <div id="coachingSubjectFilter" class="accordion-collapse collapse show bg-f8" aria-labelledby="coachingSubjectFilterHeading">
                            <div class="accordion-body">
                                @foreach($coachCategories as $category)
                                <div class="form-check mb-3 border-bottom pb-3">
                                    <input class="form-check-input ms-2" type="checkbox" value="" id="three">
                                    <label class="form-check-label user-select-none p-1" for="three">
                                        {{$category->category}}
                                    </label>
                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                    <!-- Gender Filter -->
                    <div class="accordion-item border-0">

                        <h2 class="accordion-header" id="coachingGenderFilterHeading">
                            <button class="accordion-button bg-f8 text-ae fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#coachingGenderFilter" aria-expanded="true" aria-controls="coachingGenderFilter">
                                جنسیت
                            </button>
                        </h2>

                        <div id="coachingGenderFilter" class="accordion-collapse collapse show bg-f8" aria-labelledby="coachingGenderFilterHeading">
                            <div class="accordion-body">

                                <div class="form-check mb-3 border-bottom pb-3">
                                    <input class="form-check-input ms-2" type="checkbox" value="" id="eight">
                                    <label class="form-check-label user-select-none p-1" for="eight">
                                        مرد
                                    </label>
                                </div>

                                <div class="form-check mb-3 border-bottom pb-3">
                                    <input class="form-check-input ms-2" type="checkbox" value="" id="nine">
                                    <label class="form-check-label user-select-none p-1" for="nine">
                                        زن
                                    </label>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Class Type Filter -->
                    <div class="accordion-item border-0">

                        <h2 class="accordion-header" id="coachingClassTypeFilterHeading">
                            <button class="accordion-button bg-f8 text-ae fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#coachingClassTypeFilter" aria-expanded="true" aria-controls="coachingClassTypeFilter">
                                جنسیت
                            </button>
                        </h2>

                        <div id="coachingClassTypeFilter" class="accordion-collapse collapse show bg-f8" aria-labelledby="coachingClassTypeFilterHeading">
                            <div class="accordion-body">

                                <div class="form-check mb-3 border-bottom pb-3">
                                    <input class="form-check-input ms-2" type="checkbox" value="" id="ten">
                                    <label class="form-check-label user-select-none p-1" for="ten">
                                        حضوری
                                    </label>
                                </div>

                                <div class="form-check mb-3 border-bottom pb-3">
                                    <input class="form-check-input ms-2" type="checkbox" value="" id="eleven">
                                    <label class="form-check-label user-select-none p-1" for="eleven">
                                        آنلاین
                                    </label>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </form>

        </aside>

        <!-- MAIN
        ================================================== -->
        <main class="col-12 col-xl-9">

            <!-- Sort -->
            <div class="d-flex flex-wrap align-items-center mb-3 lh-lg border-bottom pb-3 mb-5">
                <i class="isax isax-sort fs-3 ms-3"></i>
                <span class="ms-3">لیست کوچ‌ها: </span>
                <a href="#!" class="ms-3 text-decoration-none text-70 text-primary">بیشترین امتیاز</a>
                <a href="#!" class="ms-3 text-decoration-none text-70">کمترین امتیاز</a>
                <a href="#!" class="ms-3 text-decoration-none text-70">بیشترین نظر</a>
                <a href="#!" class="ms-3 text-decoration-none text-70">کم ترین نظر</a>
            </div>

            <!-- List Of Coaches -->
            <div class="row mb-5">

                @foreach($coaches as $coach)
                <!-- Coach -->
                    <div class="col-12 col-md-6 col-xl-4 coach">

                        <a href="{{route('clinic.coach.show',['User'=>$coach->user->username])}}" class="text-decoration-none text-reset coach__link">

                            <div class="card border-0 bg-f8 rounded-3">

                                <!-- Top Image -->
                                <div class="coach__top">
                                    <img src="{{'/documents/users/'.$coach->user->personal_image}}" class="card-img-top img-fluid coach__img" alt="">
                                    <div class="coach__overlay rounded text-light d-flex flex-column align-items-center justify-content-center ">
                                        <p class="mb-5">{{$coach->user->education}}</p>
                                        <i class="isax isax-export-3 d-block mb-3 fs-2"></i>
                                        <span class="fw-bold fs-5">مشاهده پروفایل</span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <!-- Title -->
                                    <h5 class="card-title d-inline-block text-dark fw-bold ms-1 mb-3">{{$coach->user->fname.' '.$coach->user->lname}}</h5>
                                    @if($coach->confirm_faracoach)
                                        <img src="images/main/verify-icon.svg" alt="">
                                    @endif
                                    <p>
                                    @foreach($coach->coachcategories as $coachCategory)
                                        <!-- Coach Type -->
                                            <small class="card-text m-2">{{$coachCategory->category}}</small>
                                    @endforeach
                                    </p>
                                    <!-- Coach Score and Teaching Time -->
                                    <footer class="small d-flex justify-content-between align-items-center">
                                        <span class="text-70 d-flex align-items-center"><i class="isax isax-clock d-inline-block fs-4 ms-2"></i> {{$coach->count_meeting}} ساعت</span>
                                        <div class="coach__score d-inline-block rounded-pill p-2">
                                            <img src="images/main/medal.svg" alt="">
                                            <span class="text-dark">امتیاز: </span>
                                            <span class="text-dark ps-2 ">۹ از ۱۰</span>
                                        </div>
                                    </footer>
                                </div>

                            </div>
                        </a>

                    </div>
                @endforeach

            </div>

            <!-- Pagination -->
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
                    <li><a href="#">32</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="isax isax-arrow-right-3 fs-5" aria-hidden="true"></i></span>
                        </a>
                    </li>
                </ul>
            </nav>

        </main>

    </div>
</div>
@endsection
