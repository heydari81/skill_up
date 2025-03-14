@extends('Front::layout.master')
@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="hero_banner image-cover image_bottom h2_bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="simple-search-wrap text-right">
                        <div class="hero_search-2">
                            <div class="elsio_tag">گروه فرهنگی نخل</div>
                            <h1 class="banner_title mb-4 font-2">در بین هزاران ساعت آموزش جستجو کنید...</h1>
                            <p class="font-lg mb-4">مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد
                                نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                            <div class="input-group simple_search">
                                <i class="fa fa-search ico"></i>
                                <input type="text" class="form-control" placeholder="نام دوره آموزش...">
                                <div class="input-group-append">
                                    <button class="btn theme-bg" type="button">جستجو</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="side_block">
                        <img src="assets/img/side-1.png" class="img-fluid" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Our Awards Start ================================== -->
    <section class="p-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="crp_box ovr_top">
                        <div class="row align-items-center m-0">
                            <div class="col-xl-1 col-lg-3 col-md-2 col-sm-12">
                                <div class="crt_169">
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-9 col-md-10 col-sm-12">
                                <div class="part_rcp">
                                    <ul>
                                        <li>
                                            <div class="dro_140">
                                                <div class="dro_141"><i class="fa fa-layer-group"></i></div>
                                                <div class="dro_142"><h6>بهترین آموزش<br>غیرحضوری</h6></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dro_140">
                                                <div class="dro_141 st-1"><i class="fa fa-business-time"></i></div>
                                                <div class="dro_142"><h6>دسترسی<br>مادام العمر</h6></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dro_140">
                                                <div class="dro_141 st-2"><i class="fa fa-user-shield"></i></div>
                                                <div class="dro_142"><h6>بیش از 800<br>شرکت کننده</h6></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dro_140">
                                                <div class="dro_141 st-3"><i class="fa fa-journal-whills"></i></div>
                                                <div class="dro_142"><h6>200+ دوره<br>دردسترس</h6></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Our Awards End ================================== -->

    <!-- ============================ Latest cources Start ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center mb-4">
                        <h3 class="font-2">جدیدترین آموزش های <span class="theme-cl">ویژه</span></h3>
                        <p>با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در
                            زبان فارسی ایجاد کرد.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="slide_items">

                        <!-- Single Item -->
                        @foreach($courses as $course)
                            <div class="lios_item">
                                <div class="crs_grid shadow_none brd">
                                    <div class="crs_grid_thumb">
                                        <a href="{{$course->path()}}" class="crs_detail_link">
                                            <img src="{{$course->thumb}}" class="img-fluid rounded" alt=""/>
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
                                                <div class="crs_cates cl_6"><span>{{$course->category->name}}</span>
                                                </div>
                                            </div>
                                            <div class="crs_fl_last">
                                                <div class="crs_price"><h2><span
                                                            class="theme-cl">{{$course->price}}</span><span
                                                            class="currency">تومان</span></h2></div>
                                            </div>
                                        </div>
                                        <div class="crs_title"><h4><a href="course-detail.html"
                                                                      class="crs_title_link">{{$course->name}}</a></h4>
                                        </div>
                                        <div class="crs_info_detail">
                                            <ul>
                                                <li><i class="fa fa-clock text-danger"></i><span>{{$course->seasons->count()}}فصل </span>
                                                </li>
                                                <li><i class="fa fa-video text-success"></i><span>{{$course->lessons->count()}} جلسه</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="preview_crs_info">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width:50%"
                                                     aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="crs_grid_foot">
                                        <div class="crs_flex">
                                            <div class="crs_fl_first">
                                                <div class="crs_tutor">
                                                    <div class="crs_tutor_thumb"><a href="instructor-detail.html"><img
                                                                src="{{$course->teacher->thumb}}"
                                                                class="img-fluid circle" alt=""/></a></div>
                                                </div>
                                            </div>
                                            <div class="crs_fl_last">
                                                <div class="foot_list_info">
                                                    <ul>
                                                        <li>
                                                            <div class="elsio_ic"><i class="fa fa-user text-danger"></i>
                                                            </div>
                                                            <div class="elsio_tx">4.7k</div>
                                                        </li>
                                                        <li>
                                                            <div class="elsio_ic"><i class="fa fa-eye text-success"></i>
                                                            </div>
                                                            <div class="elsio_tx">42.4k</div>
                                                        </li>
                                                        <li>
                                                            <div class="elsio_ic"><i
                                                                    class="fa fa-star text-warning"></i></div>
                                                            <div class="elsio_tx">4.7</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Latest cources End ================================== -->

    <!-- ============================ Our Instructor Start ================================== -->
    <section class="min gray">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h3 class="font-2">لیست مدرسین <span class="theme-cl">پیشنهادی</span></h3>
                        <p>با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در
                            زبان فارسی ایجاد کرد.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach($teachers as $teacher)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="crs_trt_grid">
                            <div class="crs_trt_thumb circle">
                                <a href="instructor-detail.html" class="crs_trt_thum_link">
                                    <img src="{{$teacher->thumb}}" class="img-fluid circle" alt=""></a>
                            </div>
                            <div class="crs_trt_caption">
                                <div class="instructor_tag dark"><span>{{$teacher->headline}}</span></div>
                                <div class="instructor_title"><h4><a href="instructor-detail.html">{{$teacher->name}}</a>
                                    </h4>
                                </div>
                                <div class="trt_rate_inf">
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
{{--                                    <span class="alt_rates">(244 نظر ثبت شده)</span>--}}
                                </div>
                            </div>
                            <div class="crs_trt_footer">
                                <div class="crs_trt_ent"><i class="fa fa-user"></i> 2.5 شرکت کننده</div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ============================ Our Instructor End ================================== -->

    <!-- ============================ Categories Start ================================== -->
    <section class="min gray">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h3 class="font-2">دسته بندی های <span class="theme-cl">منتخب</span></h3>
                        <p>با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در
                            زبان فارسی ایجاد کرد.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-heartbeat"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">مشاهده</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>علوم انسانی</h4>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت است</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-landmark"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">مشاهده</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>بورس و بازار سهام</h4>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت است</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-photo-video"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">مشاهده</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>طراحی و گرافیک</h4>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت است</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="cates_crs_wrip">
                        <div class="crs_trios">
                            <div class="crs_cate_icon"><i class="fa fa-stamp"></i></div>
                            <div class="crs_cate_link"><a href="grid-layout-with-sidebar.html">مشاهده</a></div>
                        </div>
                        <div class="crs_capt_cat">
                            <h4>مالی و حسابداری</h4>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت است</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ============================ Categories End ================================== -->

    <!-- ============================ Pricing Table ================================== -->
    <!-- ============================ Pricing Table End ================================== -->

    <!-- ============================ Students Reviews ================================== -->
    <section class="gray">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h3 class="font-2">نظرات <span class="theme-cl">دانش آموختگان</span></h3>
                        <p>با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در
                            زبان فارسی ایجاد کرد.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-sm-12">

                    <div class="reviews-slide space">

                        <!-- Single Item -->
                        <div class="single_items lios_item">
                            <div class="_testimonial_wrios shadow_none">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/user-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>کیوان مختاری</h5>
                                            <div class="_ovr_posts"><span>مدیر عامل</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/c-1.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="facts-detail">
                                    <p>زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای
                                        موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="single_items lios_item">
                            <div class="_testimonial_wrios shadow_none">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/user-2.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>الهام نجفی</h5>
                                            <div class="_ovr_posts"><span>مدیر عامل اپل</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.5</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/c-2.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="facts-detail">
                                    <p>زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای
                                        موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="single_items lios_item">
                            <div class="_testimonial_wrios shadow_none">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/user-3.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>سعید مرادی</h5>
                                            <div class="_ovr_posts"><span>موسس گوگل</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.9</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/c-3.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="facts-detail">
                                    <p>زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای
                                        موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="single_items lios_item">
                            <div class="_testimonial_wrios shadow_none">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/user-4.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>زهرا حسینی</h5>
                                            <div class="_ovr_posts"><span>مدیر لینکدین</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/c-4.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="facts-detail">
                                    <p>زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای
                                        موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="single_items lios_item">
                            <div class="_testimonial_wrios shadow_none">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/user-5.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>مسعود شریعتی</h5>
                                            <div class="_ovr_posts"><span>مدیر عامل</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/c-5.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="facts-detail">
                                    <p>زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای
                                        موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Students Reviews End ================================== -->

    <!-- ============================ Download App ================================== -->
    <section class="pb-0">
        <div class="container">

            <div class="row align-items-center justify-content-between rounded m-0">
                <div class="col-lg-7 col-md-7">
                    <div class="aps_crs_caption">
                        <h3 class="min_large mb-4 font-2">دانلود اپلیکیشن</h3>
                        <p>با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در
                            زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها
                            و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات
                            پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                        <div class="aps_buttons mt-4">
                            <a href="#" class="btn_aps ml-4">
                                <div class="aps_wrapb theme-bg">
                                    <div class="aps_ico"><img src="assets/img/apple.png" class="img-fluid" alt=""/>
                                    </div>
                                    <div class="aps_capt"><span>دانلود از</span><h4>App Store</h4></div>
                                </div>
                            </a>
                            <a href="#" class="btn_aps">
                                <div class="aps_wrapb">
                                    <div class="aps_ico"><img src="assets/img/google-play.png" class="img-fluid"
                                                              alt=""/></div>
                                    <div class="aps_capt"><span>دانلود از</span><h4>Google Play</h4></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="aps_crs_img mt-5">
                        <img src="assets/img/app.png" class="img-fluid" alt=""/>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ============================ Download App ================================== -->

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
