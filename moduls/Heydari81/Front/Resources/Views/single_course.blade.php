@extends('Front::layout.master')
@section('content')
<!-- ============================ Page Title Start================================== -->
@include('Front::buymodal')
<div class="ed_detail_head">
    <div class="container">
        <div class="row align-items-center justify-content-between mb-2">

            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                <div class="dlkio_452">
                    <div class="ed_detail_wrap">
                        <div class="crs_cates cl_1"><span>گرافیک</span></div><div class="crs_cates cl_3"><span>پروژه محور</span></div>
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{$course->name}}</h2>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <div class="rounded-circle d-flex align-items-center justify-content-center">
                                <img src={{$course->teacher->thumb}} class="img-fluid" width="70" alt="" />
                            </div>
                            <div class="mr-2 mr-md-3">
                                <span>مدرس</span>
                                <h6 class="m-0">{{$course->teacher->name}}</h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ course Detail ================================== -->
<section class="gray pt-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12 order-lg-first">
                @if($current_lesson && $current_lesson->media->type == "video" && $current_lesson->media)
                <div class="radius lg mb-4">
                    <div class="thumb">
                        <video class="pro_img img-fluid w100" controls>
                                <source src ="{{$current_lesson->downloadlink()}}" type="video/mp4">
                        </video>
                        {{--                        <img class="pro_img img-fluid w100" src="{{$course->thumb}}" alt="7.jpg">--}}
                        <div class="overlay_icon">
                            <div class="bb-video-box">
                                <div class="bb-video-box-inner">
                                    <div class="bb-video-box-innerup">
                                        <a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-toggle="modal" data-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- All Info Show in Tab -->
                <div class="tab_box_info mt-4">
                    <ul class="nav nav-pills mb-3 light" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-toggle="pill" href="#overview" role="tab" aria-controls="overview" aria-selected="true">معرفی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="curriculum-tab" data-toggle="pill" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false">سرفصل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="instructors-tab" data-toggle="pill" href="#instructors" role="tab" aria-controls="instructors" aria-selected="false">مدرس</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">دیدگاه</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <!-- Overview Detail -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <!-- Overview -->
                            <div class="edu_wraper">
                                {!! $course->body !!}
                            </div>

                            <div class="edu_wraper">
                                <h4 class="edu_title">نرم افزارهای مرتبط با آموزش</h4>
                                <p>چه بخواهید یک فیلم شخصی را تدوین کنید یا تغییرات جزیی را روی یک ویدیو اعمال نمایید و یا وقتی بخواهید به شکل جدی‌تر و به صورت هالیوودی به تدوین فیلم و تولیدات سینمایی شگفت‌انگیز بپردازید و از این راه درآمد هم داشته باشید، باید به سراغ یک نرم افزار قدرتمند مثل ادوبی پریمیر بروید. در ادامه به توضیحات مفصل تر در مورد آموزش پریمیر می‌پردازیم.</p>
                                <p>آموزش پریمیر در حالی که مطالب بیشتری را پوشش داده و نسبت به سایر آموزش‌ها جامع‌تر است، مدت زمان آن به نسبت آموزش‌های مشابه ⣿ یک سوم ⣿ است یعنی اکثر دوره‌های موجود در سطح وب همین محتوا را در زمانی معادل ۳ برابر این دوره تدریس می‌کنند که این موضوع باعث اتلاف وقت زیادی در یادگیری شما خواهد شد! لذا مدت زمان این دوره فوق‌العاده مفید بوده و در کمترین زمان بیشترین مباحث را می‌آموزید!</p>
                            </div>

                            <!-- Overview -->
                            <div class="edu_wraper">
                                <h4 class="edu_title">جمع‌بندی آخر</h4>
                                <ul class="lists-3 row">
                                    <li class="col-xl-4 col-lg-6 col-md-6 m-0">ادامه مسیر یادگیری شما</li>
                                    <li class="col-xl-4 col-lg-6 col-md-6 m-0">دریافت فایل های خام پروژه ZRK</li>
                                    <li class="col-xl-4 col-lg-6 col-md-6 m-0">ادامه مسیر یادگیری شما</li>
                                    <li class="col-xl-4 col-lg-6 col-md-6 m-0">دریافت فایل های خام پروژه ZRK</li>
                                    <li class="col-xl-4 col-lg-6 col-md-6 m-0">ادامه مسیر یادگیری شما</li>
                                    <li class="col-xl-4 col-lg-6 col-md-6 m-0">دریافت فایل های خام پروژه ZRK</li>
                                    <li class="col-xl-4 col-lg-6 col-md-6 m-0">ادامه مسیر یادگیری شما</li>
                                    <li class="col-xl-4 col-lg-6 col-md-6 m-0">دریافت فایل های خام پروژه ZRK</li>
                                    <li class="col-xl-4 col-lg-6 col-md-6 m-0">ادامه مسیر یادگیری شما</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Curriculum Detail -->
@include('Front::episodes-list')
                        <!-- Instructor Detail -->
                        <div class="tab-pane fade" id="instructors" role="tabpanel" aria-labelledby="instructors-tab">
                            <div class="single_instructor">
                                <div class="single_instructor_thumb">
                                    <a href="#"><img src="{{$course->teacher->thumb}}" class="img-fluid" alt=""></a>
                                </div>
                                <div class="single_instructor_caption">
                                    <h4><a href="#">{{$course->teacher->name}}</a></h4>
                                    <ul class="instructor_info">
                                        <li><i class="ti-video-camera"></i>72 ویدئو</li>
                                        <li><i class="ti-control-forward"></i>102 دوره</li>
                                        <li><i class="ti-user"></i>عضویت 4سال</li>
                                    </ul>
                                    <p>تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                    <ul class="social_info">
                                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Detail -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">

                            <!-- Overall Reviews -->
                            <div class="rating-overview">
                                <div class="rating-overview-box">
                                    <span class="rating-overview-box-total">4.2</span>
                                    <span class="rating-overview-box-percent">از 5.0</span>
                                    <div class="star-rating" data-rating="5"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i>
                                    </div>
                                </div>

                                <div class="rating-bars">
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">5 ستاره</span>
                                        <span class="rating-bars-inner">
														<span class="rating-bars-rating high" data-rating="4.7">
															<span class="rating-bars-rating-inner" style="width: 85%;"></span>
														</span>
														<strong>85%</strong>
													</span>
                                    </div>
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">4 ستاره</span>
                                        <span class="rating-bars-inner">
														<span class="rating-bars-rating good" data-rating="3.9">
															<span class="rating-bars-rating-inner" style="width: 75%;"></span>
														</span>
														<strong>75%</strong>
													</span>
                                    </div>
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">3 ستاره</span>
                                        <span class="rating-bars-inner">
														<span class="rating-bars-rating mid" data-rating="3.2">
															<span class="rating-bars-rating-inner" style="width: 52.2%;"></span>
														</span>
														<strong>53%</strong>
													</span>
                                    </div>
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">1 ستاره</span>
                                        <span class="rating-bars-inner">
														<span class="rating-bars-rating poor" data-rating="2.0">
															<span class="rating-bars-rating-inner" style="width:20%;"></span>
														</span>
														<strong>20%</strong>
													</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews -->
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>دیدگاه دانش آموختگان</h3>
                                </div>
                                <div class="reviews-comments-wrap">
                                    <!-- reviews-comments-item -->
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="/assets/img/user-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="reviews-comments-item-text">
                                            <h4><a href="#">متین علیزاده</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>15 اردیبهشت 1401</span></h4>

                                            <div class="listing-rating"><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i></div>
                                            <div class="clearfix"></div>
                                            <p>" ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. "</p>
                                            <div class="pull-left reviews-reaction">
                                                <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                                <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                                                <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--reviews-comments-item end-->

                                    <!-- reviews-comments-item -->
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="/assets/img/user-2.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="reviews-comments-item-text">
                                            <h4><a href="#">مژگان قاسمی نیا</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>2 شهریور 1400</span></h4>

                                            <div class="listing-rating"><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star"></i></div>
                                            <div class="clearfix"></div>
                                            <p>" ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. "</p>
                                            <div class="pull-left reviews-reaction">
                                                <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                                <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                                                <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--reviews-comments-item end-->

                                    <!-- reviews-comments-item -->
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="/assets/img/user-3.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="reviews-comments-item-text">
                                            <h4><a href="#">علی حسینی</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>8 اسفند 1399</span></h4>

                                            <div class="listing-rating"><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i></div>
                                            <div class="clearfix"></div>
                                            <p>" ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. "</p>
                                            <div class="pull-left reviews-reaction">
                                                <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                                <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                                                <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--reviews-comments-item end-->

                                </div>
                            </div>

                            <!-- Submit Reviews -->
                            <div class="edu_wraper">
                                <h4 class="edu_title">ثبت دیدگاه</h4>
                                <div class="review-form-box form-submit">
                                    <form>
                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>نام و نام خانوادگی</label>
                                                    <input class="form-control" type="text" placeholder="نام و نام خانوادگی">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>پست الکترونیکی</label>
                                                    <input class="form-control" type="email" placeholder="ایمیل">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>متن نظر</label>
                                                    <textarea class="form-control ht-140" placeholder="نظر خود را بنویسید..."></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn theme-bg btn-md">ثبت دیدگاه</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-12 order-lg-last">

                <div class="ed_view_box style_2 border ovrlio stick_top min">
                    <div class="ed_author">
                        <h2 class="theme-cl m-0">149ت<span class="old_prc">299ت</span></h2>
                    </div>
                    <div class="ed_view_link">
                        @auth()
                            @if(auth()->user()->hasAccessToCourse($course))
                            @else
                                <a href="#" class="btn theme-light enroll-btn" data-toggle="modal" data-target="#buy">خرید</a>
                            @endif
                        @endauth
                        @guest()
                                <a href="{{route('register')}}" class="btn theme-bg enroll-btn">ثبت نام</a>
                        @endguest
                    </div>
                    <div class="ed_view_features">
                        <div class="eld mb-3">
                            <h6 class="font-medium">مدرس {{ $course->teacher->name }}</h6>
                            <p>{{$course->teacher->headline}}</p>
                        </div>
                        <div class="eld mb-3">
                            <ul class="edu_list right">
                                <li><i class="ti-user"></i>تعداد شرکت کننده:<strong>{{$course->students->count()}}</strong></li>
                                <li><i class="ti-files"></i>موضوع:<strong>{{$course->category->name}}</strong></li>
                                <li><i class="ti-game"></i>تعداد جلسه<strong>{{$course->lessons->count()}}</strong></li>
                                <li><i class="ti-time"></i>تعداد فصل<strong>{{$course->seasons->count()}}</strong></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

<!-- ============================ course Detail ================================== -->

<!-- ============================ Related Cources ================================== -->
<section>
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                <h4 class="font-2">آخرین بازدید‌ و آموزش مرتبط</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="slide_items">

                    <!-- Single Item -->
                    <div class="lios_item">
                        <div class="crs_grid shadow_none brd">
                            <div class="crs_grid_thumb">
                                <a href="course-detail.html" class="crs_detail_link">
                                    <img src="/assets/img/cr-2.jpg" class="img-fluid rounded" alt="" />
                                </a>
                                <div class="crs_video_ico">
                                    <i class="fa fa-play"></i>
                                </div>
                                <div class="crs_locked_ico">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="crs_grid_caption">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_cates cl_6"><span>حسابداری</span></div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="crs_price"><h2><span class="theme-cl">149</span><span class="currency">تومان</span></h2></div>
                                    </div>
                                </div>
                                <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">دوره حضوری عالی پرورش مدیر مالی</a></h4></div>
                                <div class="crs_info_detail">
                                    <ul>
                                        <li><i class="fa fa-clock text-danger"></i><span>8ساعت 1دقیقه</span></li>
                                        <li><i class="fa fa-video text-success"></i><span>17 دوره</span></li>
                                    </ul>
                                </div>
                                <div class="preview_crs_info">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="crs_grid_foot">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_tutor">
                                            <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="/assets/img/user-6.jpg" class="img-fluid circle" alt="" /></a></div>
                                        </div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="foot_list_info">
                                            <ul>
                                                <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="lios_item">
                        <div class="crs_grid shadow_none brd">
                            <div class="crs_grid_thumb">
                                <a href="course-detail.html" class="crs_detail_link">
                                    <img src="/assets/img/cr-3.jpg" class="img-fluid rounded" alt="" />
                                </a>
                                <div class="crs_video_ico">
                                    <i class="fa fa-play"></i>
                                </div>
                                <div class="crs_locked_ico">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="crs_grid_caption">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_cates cl_5"><span>پروژه محور</span></div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="crs_price"><h2><span class="theme-cl">99</span><span class="currency">تومان</span></h2></div>
                                    </div>
                                </div>
                                <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">آموزش ASP.Net - ساخت سایت شخصی</a></h4></div>
                                <div class="crs_info_detail">
                                    <ul>
                                        <li><i class="fa fa-clock text-danger"></i><span>28 ساعت</span></li>
                                        <li><i class="fa fa-video text-success"></i><span>32 دوره</span></li>
                                    </ul>
                                </div>
                                <div class="preview_crs_info">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="crs_grid_foot">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_tutor">
                                            <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="/assets/img/user-5.jpg" class="img-fluid circle" alt="" /></a></div>
                                        </div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="foot_list_info">
                                            <ul>
                                                <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="lios_item">
                        <div class="crs_grid shadow_none brd">
                            <div class="crs_grid_thumb">
                                <a href="course-detail.html" class="crs_detail_link">
                                    <img src="/assets/img/cr-4.jpg" class="img-fluid rounded" alt="" />
                                </a>
                                <div class="crs_video_ico">
                                    <i class="fa fa-play"></i>
                                </div>
                                <div class="crs_locked_ico">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="crs_grid_caption">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_cates cl_4"><span>فیزیک</span></div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="crs_price"><h2><span class="theme-cl">49</span><span class="currency">تومان</span></h2></div>
                                    </div>
                                </div>
                                <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">تدریس کامل کلاس فیزیک جامع کنکور</a></h4></div>
                                <div class="crs_info_detail">
                                    <ul>
                                        <li><i class="fa fa-clock text-danger"></i><span>5ساعت 8دقیقه</span></li>
                                        <li><i class="fa fa-video text-success"></i><span>40 دوره</span></li>
                                    </ul>
                                </div>
                                <div class="preview_crs_info">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="crs_grid_foot">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_tutor">
                                            <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="/assets/img/user-4.jpg" class="img-fluid circle" alt="" /></a></div>
                                        </div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="foot_list_info">
                                            <ul>
                                                <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="lios_item">
                        <div class="crs_grid shadow_none brd">
                            <div class="crs_grid_thumb">
                                <a href="course-detail.html" class="crs_detail_link">
                                    <img src="/assets/img/cr-5.jpg" class="img-fluid rounded" alt="" />
                                </a>
                                <div class="crs_video_ico">
                                    <i class="fa fa-play"></i>
                                </div>
                                <div class="crs_locked_ico">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="crs_grid_caption">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_cates cl_3"><span>برنامه نویسی</span></div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="crs_price"><h2><span class="theme-cl">129</span><span class="currency">دوره</span></h2></div>
                                    </div>
                                </div>
                                <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">آموزش ساخت فروشگاه دیجی استایل با لاراول</a></h4></div>
                                <div class="crs_info_detail">
                                    <ul>
                                        <li><i class="fa fa-clock text-danger"></i><span>19 ساعت</span></li>
                                        <li><i class="fa fa-video text-success"></i><span>35 دوره</span></li>
                                    </ul>
                                </div>
                                <div class="preview_crs_info">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="crs_grid_foot">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_tutor">
                                            <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="/assets/img/user-3.jpg" class="img-fluid circle" alt="" /></a></div>
                                        </div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="foot_list_info">
                                            <ul>
                                                <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="lios_item">
                        <div class="crs_grid shadow_none brd">
                            <div class="crs_grid_thumb">
                                <a href="course-detail.html" class="crs_detail_link">
                                    <img src="/assets/img/cr-6.jpg" class="img-fluid rounded" alt="" />
                                </a>
                                <div class="crs_video_ico">
                                    <i class="fa fa-play"></i>
                                </div>
                                <div class="crs_locked_ico">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="crs_grid_caption">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_cates cl_2"><span>ریاضیات</span></div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="crs_price"><h2><span class="theme-cl">399</span><span class="currency">تومان</span></h2></div>
                                    </div>
                                </div>
                                <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">تدریس ریاضی و آمار دهم انسانی</a></h4></div>
                                <div class="crs_info_detail">
                                    <ul>
                                        <li><i class="fa fa-clock text-danger"></i><span>8 ساعت</span></li>
                                        <li><i class="fa fa-video text-success"></i><span>19 دوره</span></li>
                                    </ul>
                                </div>
                                <div class="preview_crs_info">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="crs_grid_foot">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_tutor">
                                            <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="/assets/img/user-2.jpg" class="img-fluid circle" alt="" /></a></div>
                                        </div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="foot_list_info">
                                            <ul>
                                                <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="lios_item">
                        <div class="crs_grid shadow_none brd">
                            <div class="crs_grid_thumb">
                                <a href="course-detail.html" class="crs_detail_link">
                                    <img src="/assets/img/cr-7.jpg" class="img-fluid rounded" alt="" />
                                </a>
                                <div class="crs_video_ico">
                                    <i class="fa fa-play"></i>
                                </div>
                                <div class="crs_locked_ico">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="crs_grid_caption">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_cates cl_1"><span>گرافیک</span></div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="crs_price"><h2><span class="theme-cl">89</span><span class="currency">تومان</span></h2></div>
                                    </div>
                                </div>
                                <div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">مفاهیم کلی و مقدمه ای بر محیط سه بعدی</a></h4></div>
                                <div class="crs_info_detail">
                                    <ul>
                                        <li><i class="fa fa-clock text-danger"></i><span>2ساعت 5دقیقه</span></li>
                                        <li><i class="fa fa-video text-success"></i><span>27 دوره</span></li>
                                    </ul>
                                </div>
                                <div class="preview_crs_info">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="crs_grid_foot">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_tutor">
                                            <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="/assets/img/user-1.jpg" class="img-fluid circle" alt="" /></a></div>
                                        </div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="foot_list_info">
                                            <ul>
                                                <li><div class="elsio_ic"><i class="fa fa-user text-danger"></i></div><div class="elsio_tx">4.7k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">42.4k</div></li>
                                                <li><div class="elsio_ic"><i class="fa fa-star text-warning"></i></div><div class="elsio_tx">4.7</div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<!-- ============================ Related Cources ================================== -->

<!-- ============================ Call To Action ================================== -->
<section class="theme-bg call_action_wrap-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="call_action_wrap">
                    <div class="call_action_wrap-head">
                        <h3 class="font-2">آیا سوالی دارید؟</h3>
                        <span>ما به شما کمک خواهیم کرد تا شغل و رشد خود را افزایش دهید.</span>
                    </div>
                    <a href="#" class="btn btn-call_action_wrap">امروز با ما تماس بگیرید</a>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Call To Action End ================================== -->
@endsection
