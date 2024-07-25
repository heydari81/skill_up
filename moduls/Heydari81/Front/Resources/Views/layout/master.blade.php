<!DOCTYPE html>
<html lang="fa">
@include('Front::layout.head')
<body dir="rtl">

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    @include('Front::layout.nav')
    @yield('content')
    @include('Front::layout.footer')
    @include('Front::layout.js')
</div>
</body>
</html>
