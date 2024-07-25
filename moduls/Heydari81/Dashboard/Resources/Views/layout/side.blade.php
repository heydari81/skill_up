<div class="col-lg-3 col-md-3">
    <div class="dashboard-navbar">

        <div class="d-user-avater">
            <img src="{{auth()->user()->thumb}}" class="img-fluid avater" alt="">
            <h4>{{auth()->user()->name}}</h4>
            <span>{{auth()->user()->headline}}</span>
            <div class="elso_syu89">
                <ul>
                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                    <li><a href="#"><i class="ti-twitter"></i></a></li>
                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="elso_syu77">
                <div class="one_third"><div class="one_45ic text-warning bg-light-warning"><i class="fas fa-star"></i></div><span>امتیازات</span></div>
                <div class="one_third"><div class="one_45ic text-success bg-light-success"><i class="fas fa-file-invoice"></i></div><span>دوره ها</span></div>
                <div class="one_third"><div class="one_45ic text-purple bg-light-purple"><i class="fas fa-user"></i></div><span>هنرجویان</span></div>
            </div>
        </div>

        <div class="d-navigation">
            <ul id="side-menu">
                <li class="active"><a href="dashboard.html"><i class="fas fa-th"></i>پیشخوان</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0);"><i class="fas fa-shopping-basket"></i>دوره های آموزش<span class="ti-angle-left"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('courses.index')}}">لیست دوره ها</a></li>
                        <li><a href="{{route('categories.index')}}">دسته بندی دوره</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);"><i class="fas fa-archive"></i>گزارشات<span class="ti-angle-left"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('payments.list')}}">لیست</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);"><i class="fas fa-user"></i>کاربران<span class="ti-angle-left"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('users.index')}}">لیست کاربران</a></li>
                        <li><a href="{{route('addstudent')}}">ثبت هنرجو جدید</a></li>
                    </ul>
                </li>
                <li><a href="messages.html"><i class="fas fa-comments"></i>پیام ها</a></li>
                <li><a href="my-profile.html"><i class="fas fa-address-card"></i>پروفایل کاربری</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0);"><i class="ffas fa-cog"></i>تنظیمات<span class="ti-angle-left"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="website-settings.html">وب سایت</a></li>
                        <li><a href="system-settings.html">سئو</a></li>
                        <li><a href="payment_settings.html">پرداخت</a></li>
                        <li><a href="social-login.html">شبکه های اجتماعی</a></li>
                        <li><a href="smtp-setting.html">ایمیل SMTP</a></li>
                        <li><a href="dash-about.html">درباره اپلیکیشن</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</div>
