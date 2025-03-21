@extends('Dashboard::layout.dashboardmaster')
@section('dashboard_in')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 font-2">درآمد مدیریت امسال</h4>
                </div>
                <div class="card-body">
                    <div class="chart" id="extra-area-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row -->
    <div class="row">

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center theme-bg mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-book"></i></div></div>
                <div class="dashboard_stats_wrap_content"><h4>607</h4> <span>تعداد دوره ها</span></div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-primary mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-video"></i></div></div>
                <div class="dashboard_stats_wrap_content"><h4>5.2</h4> <span>تعداد ویدئو ها</span></div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-warning mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-users"></i></div></div>
                <div class="dashboard_stats_wrap_content"><h4>78</h4> <span>تعداد هنرجویان</span></div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-purple mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-gem"></i></div></div>
                <div class="dashboard_stats_wrap_content"><h4>32</h4> <span>تعداد شرکت کنندگان</span></div>
            </div>
        </div>

    </div>
    <!-- /Row -->

    <!-- Row -->
    <div class="row">

        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h5>دوره های ویژه</h5>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="grousp_crs">
                        <div class="grousp_crs_left">
                            <div class="grousp_crs_thumb"><img src="assets/img/c-7.png" class="img-fluid" alt="" /></div>
                            <div class="grousp_crs_caption"><h4>Adobe Photoshop cc 2021 - آموزش رایگان Assential</h4></div>
                        </div>
                        <div class="grousp_crs_right">
                            <div class="frt_125"><i class="fas fa-fire text-warning ml-1"></i>8.7</div>
                            <div class="frt_but"><a href="#" class="btn text-white theme-bg">مشاهده دوره</a></div>
                        </div>
                    </div>
                    <div class="grousp_crs">
                        <div class="grousp_crs_left">
                            <div class="grousp_crs_thumb"><img src="assets/img/c-6.png" class="img-fluid" alt="" /></div>
                            <div class="grousp_crs_caption"><h4>Adobe Photoshop cc 2021 - آموزش رایگان Assential</h4></div>
                        </div>
                        <div class="grousp_crs_right">
                            <div class="frt_125"><i class="fas fa-fire text-warning ml-1"></i>8.7</div>
                            <div class="frt_but"><a href="#" class="btn text-white theme-bg">مشاهده دوره</a></div>
                        </div>
                    </div>
                    <div class="grousp_crs">
                        <div class="grousp_crs_left">
                            <div class="grousp_crs_thumb"><img src="assets/img/c-5.png" class="img-fluid" alt="" /></div>
                            <div class="grousp_crs_caption"><h4>Adobe Photoshop cc 2021 - آموزش رایگان Assential</h4></div>
                        </div>
                        <div class="grousp_crs_right">
                            <div class="frt_125"><i class="fas fa-fire text-warning ml-1"></i>8.7</div>
                            <div class="frt_but"><a href="#" class="btn text-white theme-bg">مشاهده دوره</a></div>
                        </div>
                    </div>
                    <div class="grousp_crs">
                        <div class="grousp_crs_left">
                            <div class="grousp_crs_thumb"><img src="assets/img/c-4.png" class="img-fluid" alt="" /></div>
                            <div class="grousp_crs_caption"><h4>Adobe Photoshop cc 2021 - آموزش رایگان Assential</h4></div>
                        </div>
                        <div class="grousp_crs_right">
                            <div class="frt_125"><i class="fas fa-fire text-warning ml-1"></i>8.7</div>
                            <div class="frt_but"><a href="#" class="btn text-white theme-bg">مشاهده دوره</a></div>
                        </div>
                    </div>
                    <div class="grousp_crs">
                        <div class="grousp_crs_left">
                            <div class="grousp_crs_thumb"><img src="assets/img/c-3.png" class="img-fluid" alt="" /></div>
                            <div class="grousp_crs_caption"><h4>Adobe Photoshop cc 2021 - آموزش رایگان Assential</h4></div>
                        </div>
                        <div class="grousp_crs_right">
                            <div class="frt_125"><i class="fas fa-fire text-warning mr-1"></i>8.7</div>
                            <div class="frt_but"><a href="#" class="btn text-white theme-bg">مشاهده دوره</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h6>پیام ها</h6>
                </div>
                <div class="ground-list ground-hover-list">
                    <div class="ground ground-list-single">
                        <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-success">
                            <div class="position-absolute text-success h5 mb-0"><i class="fas fa-user"></i></div>
                        </div>

                        <div class="ground-content">
                            <h6><a href="#">مریم حسینی</a></h6>
                            <small class="text-fade">کاربر جدیدی که در پایتون ثبت نام کرده است</small>
                            <span class="small">هم اکنون</span>
                        </div>
                    </div>

                    <div class="ground ground-list-single">
                        <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-danger">
                            <div class="position-absolute text-danger h5 mb-0"><i class="fas fa-comments"></i></div>
                        </div>

                        <div class="ground-content">
                            <h6><a href="#">علی مرادی</a></h6>
                            <small class="text-fade">برگزاری دوره های جدید تابستانی</small>
                            <span class="small">2 دقیقه پیش</span>
                        </div>
                    </div>

                    <div class="ground ground-list-single">
                        <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-info">
                            <div class="position-absolute text-info h5 mb-0"><i class="fas fa-grin-squint-tears"></i></div>
                        </div>

                        <div class="ground-content">
                            <h6><a href="#">کارگزاری مفید</a></h6>
                            <small class="text-fade">استخدام کارشناس فروش و بازاریابی(آقا)</small>
                            <span class="small">10 دقیقه پیش</span>
                        </div>
                    </div>

                    <div class="ground ground-list-single">
                        <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-light-purple">
                            <div class="position-absolute text-purple h5 mb-0"><i class="fas fa-briefcase"></i></div>
                        </div>

                        <div class="ground-content">
                            <h6><a href="#">زهرا قاسمی</a></h6>
                            <small class="text-fade">جلسه بعدی سه شنبه..</small>
                            <span class="small">15 دقیقه پیش</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /Row -->
@endsection
