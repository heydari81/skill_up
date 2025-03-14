<!-- Start Navigation -->
<div class="header theme-bg light-menu header-fixed">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                    <img src="/assets/img/light-logo.png" class="logo" alt=""/>
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li>
                            @guest()
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#login"
                                   class="crs_yuo12 w-auto text-white theme-bg">
                                        <span class="embos_45"><i
                                                class="fas fa-sign-in-alt ml-1 rotate-img"></i>ورود</span>
                                </a>
                            @endguest
                            @auth()
                                    <a href="{{route('user_front',auth()->id())}}"
                                       class="crs_yuo12 w-auto text-white theme-bg">
                                        <span class="embos_45"><i
                                                class="fas fa-sign-in-alt ml-1 rotate-img"></i>پروفایل</span>
                                    </a>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">

                    {{--                    <li class="active"><a href="#">خانه<span class="submenu-indicator"></span></a>--}}
                    {{--                        <ul class="nav-dropdown nav-submenu">--}}
                    {{--                            <li><a href="index.html">خانه 1</a></li>--}}
                    {{--                            <li><a href="home-2.html">خانه 2</a></li>--}}
                    {{--                            <li><a href="home-3.html">خانه 3</a></li>--}}
                    {{--                            <li><a href="home-4.html">خانه 4</a></li>--}}
                    {{--                            <li><a href="home-5.html">خانه 5</a></li>--}}
                    {{--                            <li><a href="home-6.html">خانه 6</a></li>--}}
                    {{--                            <li><a href="home-7.html">خانه 7</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}

                    {{--                    <li><a href="#">دوره های آموزشی<span class="submenu-indicator"></span></a>--}}
                    {{--                        <ul class="nav-dropdown nav-submenu">--}}
                    {{--                            <li><a href="#">نمای شبکه ای<span class="submenu-indicator"></span></a>--}}
                    {{--                                <ul class="nav-dropdown nav-submenu">--}}
                    {{--                                    <li><a href="grid-layout-with-sidebar.html">نسخه 1</a></li>--}}
                    {{--                                    <li><a href="grid-layout-with-sidebar-2.html">نسخه 2</a></li>--}}
                    {{--                                    <li><a href="grid-layout-with-sidebar-3.html">نسخه 3</a></li>--}}
                    {{--                                    <li><a href="grid-layout-with-sidebar-4.html">نسخه 4</a></li>--}}
                    {{--                                    <li><a href="grid-layout-with-sidebar-5.html">نسخه 5</a></li>--}}
                    {{--                                    <li><a href="grid-layout-full.html">نمای تمام صفحه نسخه 1</a></li>--}}
                    {{--                                    <li><a href="grid-layout-full-2.html">نمای تمام صفحه نسخه 2</a></li>--}}
                    {{--                                    <li><a href="grid-layout-full-3.html">نمای تمام صفحه نسخه 3</a></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li>--}}
                    {{--                            <li><a href="#">نمای لیستی<span class="submenu-indicator"></span></a>--}}
                    {{--                                <ul class="nav-dropdown nav-submenu">--}}
                    {{--                                    <li><a href="list-layout-with-sidebar.html">با سایدبار</a></li>--}}
                    {{--                                    <li><a href="list-layout-with-full.html">تمام صفحه</a></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li>--}}
                    {{--                            <li><a href="#">جزئیات دوره<span class="submenu-indicator"></span></a>--}}
                    {{--                                <ul class="nav-dropdown nav-submenu">--}}
                    {{--                                    <li><a href="course-detail.html">نسخه 1</a></li>--}}
                    {{--                                    <li><a href="course-detail-2.html">نسخه 2</a></li>--}}
                    {{--                                    <li><a href="course-detail-3.html">نسخه 3</a></li>--}}
                    {{--                                    <li><a href="course-detail-4.html">نسخه 4</a></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li>--}}

                    {{--                            <li><a href="explore-category.html">انتخاب دسته بندی</a></li>--}}
                    {{--                            <li><a href="find-instructor.html">لیست مدرسین</a></li>--}}
                    {{--                            <li><a href="instructor-detail.html">جزئیات مدرس</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}

                    {{--                    <li><a href="#">صفحات<span class="submenu-indicator"></span></a>--}}
                    {{--                        <ul class="nav-dropdown nav-submenu">--}}
                    {{--                            <li><a href="#">فروشگاه<span class="submenu-indicator"></span></a>--}}
                    {{--                                <ul class="nav-dropdown nav-submenu">--}}
                    {{--                                    <li><a href="shop-with-sidebar.html">سایدبار راست</a></li>--}}
                    {{--                                    <li><a href="shop-with-left-sidebar.html">سایدبار چپ</a></li>--}}
                    {{--                                    <li><a href="list-shop-with-sidebar.html">نمای لیستی با سایدبار</a></li>--}}
                    {{--                                    <li><a href="product-detail.html">جزئیات محصول</a></li>--}}
                    {{--                                    <li><a href="wishlist.html">موردعلاقه ها</a></li>--}}
                    {{--                                    <li><a href="checkout.html">تسویه حساب</a></li>--}}
                    {{--                                    <li><a href="add-to-cart.html">افزون به سبد خرید</a></li>--}}
                    {{--                                    <li><a href="success-payment.html">پرداخت موفق</a></li>--}}
                    {{--                                    <li><a href="failed-payment.html">پرداخت ناموفق</a></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li>--}}
                    {{--                            <li><a href="about.html">درباره ما</a></li>--}}
                    {{--                            <li><a href="contact.html">تماس با ما</a></li>--}}
                    {{--                            <li><a href="blogs.html">لیست وبلاگ</a></li>--}}
                    {{--                            <li><a href="pricing.html">قیمت گذاری</a></li>--}}
                    {{--                            <li><a href="404.html">صفحه 404</a></li>--}}
                    {{--                            <li><a href="component.html">المان ها</a></li>--}}
                    {{--                            <li><a href="faq.html">سوالات متداول</a></li>--}}
                    {{--                            <li><a href="login.html">ورود</a></li>--}}
                    {{--                            <li><a href="signup.html">ثبت نام</a></li>--}}
                    {{--                            <li><a href="forgot.html">فراموشی رمز عبور</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}

                    <li><a href="{{route('home')}}">خانه</a></li>
                    <li><a href="{{route('all_course')}}">دوره ها</a></li>
                    <li><a href="dashboard.html">پکیج ها</a></li>
                    <li><a href="dashboard.html">سوالات متداول</a></li>
                    <li><a href="dashboard.html">ارتباط با ما</a></li>
                    @auth()
                    @if(auth()->user()->hasAccesstoDashboard())
                        <li><a href="{{route('dashboard')}}">داشبورد</a></li>
                    @endif
                    @endauth
                </ul>

                <ul class="nav-menu nav-menu-social align-to-left">
                    @guest()
                        <li>
                            <a href="#" data-toggle="modal" data-target="#login">
                                <i class="fas fa-sign-in-alt ml-1 rotate-img"></i><span class="dn-lg">ورود</span>
                            </a>
                        </li>
                        <li class="add-listing bg-white">
                            <a href="{{route('register')}}" class="text-white">ثبت نام</a>
                        </li>
                    @endguest
                    @auth()
                        <li class="add-listing bg-white">
                            <a href="{{route('user_front',auth()->id())}}" class="text-white">حساب کاربری</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>

