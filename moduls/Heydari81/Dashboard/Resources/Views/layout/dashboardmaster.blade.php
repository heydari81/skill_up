<!DOCTYPE html>
<html lang="fa">

@include('Dashboard::layout.header')

<body dir="rtl">

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    @include('Dashboard::layout.nav')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ============================ Dashboard: Dashboard Start ================================== -->
    <section class="gray pt-4">
        <div class="container-fluid">

            <div class="row">

                @include('Dashboard::layout.side')

                <div class="col-lg-9 col-md-9 col-sm-12">

                    <!-- Row -->
                    @include('Dashboard::layout.breadcrumb')
                    <!-- /Row -->
                    @yield('dashboard_in')


                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Dashboard: Dashboard End ================================== -->

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

    <!-- ============================ Footer Start ================================== -->
    <footer class="dark-footer skin-dark-footer style-2">
        <div class="footer-middle">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-md-5">
                        <div class="footer_widget">
                            <img src="/assets/img/logo-light.png" class="img-footer small mb-2" alt="" />
                            <h4 class="extream mb-3 font-2">آیا به کمک تیم پشتیبانی<br>نیاز دارید؟</h4>
                            <p>هر ماه با عضویت در خبرنامه ما از به‌روزرسانی‌ها، معاملات جدید، آموزش‌ها و تخفیف‌ها باخبر شوید.</p>
                            <div class="foot-news-last">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ایمیل">
                                    <div class="input-group-append">
                                        <button type="button" class="input-group-text theme-bg b-0 text-light">عضویت</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-7 ml-auto">
                        <div class="row">

                            <div class="col-lg-4 col-md-4">
                                <div class="footer_widget">
                                    <h4 class="widget_title">صفحات</h4>
                                    <ul class="footer-menu">
                                        <li><a href="#">صفحه اصلی</a></li>
                                        <li><a href="#">درباره ما</a></li>
                                        <li><a href="#">خدمات</a></li>
                                        <li><a href="#">دوره های آموزشی</a></li>
                                        <li><a href="#">تماس با ما</a></li>
                                        <li><a href="#">لیست وبلاگ</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="footer_widget">
                                    <h4 class="widget_title">تمام بخش ها</h4>
                                    <ul class="footer-menu">
                                        <li><a href="#">منو<span class="new">جدید</span></a></li>
                                        <li><a href="#">ویژگی های جذاب</a></li>
                                        <li><a href="#">المان ها<span class="new">جدید</span></a></li>
                                        <li><a href="#">نظرات کاربران</a></li>
                                        <li><a href="#">ویدئو</a></li>
                                        <li><a href="#">فوتر</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="footer_widget">
                                    <h4 class="widget_title">لینک های مفید</h4>
                                    <ul class="footer-menu">
                                        <li><a href="#">درباره ما</a></li>
                                        <li><a href="#">وبلاگ</a></li>
                                        <li><a href="#">قیمت گذاری</a></li>
                                        <li><a href="#">ثبت نام</a></li>
                                        <li><a href="#">ورود به حساب</a></li>
                                        <li><a href="#">پشتیبانی <span class="update">بروزرسانی</span></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 text-center">
                        <p class="mb-0">© 2022 قالب SkillUp ارائه شده مدرس <a href="https://rtl-theme.com/">راست چین</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
        <div class="modal-dialog modal-xl login-pop-form" role="document">
            <div class="modal-content overli" id="loginmodal">
                <div class="modal-header">
                    <h5 class="modal-title">ورود به حساب کاربری</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login-form">
                        <form>

                            <div class="form-group">
                                <label>نام کاربری</label>
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="نام کاربری/ ایمیل">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>رمز عبور</label>
                                <div class="input-with-icon">
                                    <input type="password" class="form-control" placeholder="*******">
                                    <i class="ti-unlock"></i>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-4 col-lg-4 col-4">
                                    <input id="admin" class="checkbox-custom" name="admin" type="checkbox">
                                    <label for="admin" class="checkbox-custom-label">مدیر</label>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-4">
                                    <input id="student" class="checkbox-custom" name="student" type="checkbox" checked>
                                    <label for="student" class="checkbox-custom-label">هنرجو</label>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-4">
                                    <input id="instructor" class="checkbox-custom" name="instructor" type="checkbox">
                                    <label for="instructor" class="checkbox-custom-label">مدرس</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width theme-bg text-white">ورود به حساب</button>
                            </div>

                            <div class="rcs_log_125 pt-2 pb-3">
                                <span>یا ورود از طریق شبکه های اجتماعی</span>
                            </div>
                            <div class="rcs_log_126 full">
                                <ul class="social_log_45 row">
                                    <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-facebook text-info"></i>Facebook</a></li>
                                    <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-google text-danger"></i>Google</a></li>
                                    <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-twitter theme-cl"></i>Twitter</a></li>
                                </ul>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="crs_log__footer d-flex justify-content-between mt-0">
                    <div class="fhg_45"><p class="musrt">حساب کاربری ندارید؟ <a href="signup.html" class="theme-cl">ثبت نام</a></p></div>
                    <div class="fhg_45"><p class="musrt"><a href="../auth/forgot.blade.php" class="text-danger">رمز عبور را فراموش کرده اید؟</a></p></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
@include('Dashboard::layout.js')

</body>

</html>
