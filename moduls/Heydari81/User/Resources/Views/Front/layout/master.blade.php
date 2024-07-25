@include('User::Front.layout.header')
@yield('content')
@include('User::Front.layout.js_in')
    <!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Themezhub" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillUp - قالب HTML دوره آنلاین و آموزش</title>

    <!-- Custom CSS -->
    <link href="/assets/css/styles.css" rel="stylesheet">


</head>

<body dir="rtl">

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    <div class="header header-light head-shadow">
        <div class="container">
            @include('User::Front.layout.nav')
        </div>
    </div>
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    @yield('content_in')
    <!-- ============================ Footer Start ================================== -->
   @include('User::Front.layout.footer')
    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    @include('User::Front.layout.login_module')
    <!-- End Modal -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
@include('User::Front.layout.js_in')
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

</body>

</html>
