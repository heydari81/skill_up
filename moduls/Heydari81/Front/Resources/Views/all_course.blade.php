@extends('Front::layout.master')
@section('content')

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ============================ Page Title Start================================== -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <h1 class="breadcrumb-title font-2">دوره ها</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb p-0 bg-white">
                                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                                <li class="breadcrumb-item active theme-cl" aria-current="page">دوره ها</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ All Cources ================================== -->
    <section class="gray">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="page-sidebar p-0">
                        <a class="filter_links" data-toggle="collapse" href="#fltbox" role="button"
                           aria-expanded="false" aria-controls="fltbox">فیلتر پیشرفته<i
                                class="fa fa-sliders-h mr-2"></i></a>
                        <div class="collapse" id="fltbox">
                            <!-- Find New Property -->
                            <div class="sidebar-widgets p-4">
                                <form>
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="نام دوره...">
                                        <i class="ti-search"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="cates" class="form-control">
                                            <option value="">&nbsp;</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h6>مدرسین برتر</h6>
                                    <ul class="no-ul-list mb-3">
                                        @foreach($teachers as $teacher)
                                            <li>
                                                <input id="aa-41" class="checkbox-custom" name="aa-41" type="checkbox">
                                                <label for="aa-41" class="checkbox-custom-label">{{$teacher->name}}
                                                    <i class="count"></i></label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="form-group">
                                    <h6>سطح مهارت</h6>
                                    <ul class="no-ul-list mb-3">
                                        <li>
                                            <input id="l1" class="checkbox-custom" name="l1" type="checkbox">
                                            <label for="l1" class="checkbox-custom-label">ابتدایی</label>
                                        </li>
                                        <li>
                                            <input id="l2" class="checkbox-custom" name="l2" type="checkbox">
                                            <label for="l2" class="checkbox-custom-label">سطح پایه</label>
                                        </li>
                                        <li>
                                            <input id="l3" class="checkbox-custom" name="l3" type="checkbox">
                                            <label for="l3" class="checkbox-custom-label">سطح ممدرس</label>
                                        </li>
                                        <li>
                                            <input id="l4" class="checkbox-custom" name="l4" type="checkbox">
                                            <label for="l4" class="checkbox-custom-label">سطح پیشرفته</label>
                                        </li>
                                    </ul>
                                </div>

                                <div class="form-group">
                                    <h6>قیمت</h6>
                                    <ul class="no-ul-list mb-3">
                                        <li>
                                            <input id="p1" class="checkbox-custom" name="p1" type="checkbox">
                                            <label for="p1" class="checkbox-custom-label">همه<i
                                                    class="count">89</i></label>
                                        </li>
                                        <li>
                                            <input id="p2" class="checkbox-custom" name="p2" type="checkbox">
                                            <label for="p2" class="checkbox-custom-label">رایگان<i class="count">56</i></label>
                                        </li>
                                        <li>
                                            <input id="p3" class="checkbox-custom" name="p3" type="checkbox">
                                            <label for="p3" class="checkbox-custom-label">پولی<i
                                                    class="count">42</i></label>
                                        </li>
                                    </ul>
                                </div>
                                </form>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                                        <button class="btn theme-bg rounded full-width">فیلتر</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Sidebar End -->

                </div>

                <!-- Content -->
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="short_wraping">
                                <div class="row m-0 align-items-center justify-content-between">

                                    <div class="col-lg-4 col-md-5 col-sm-12  col-sm-6">
                                        <div class="shorting_pagination_laft">
                                            <h6 class="m-0">نمایش 1-25 از {{$courses->count()}}</h6>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-7 col-sm-12 col-sm-6">
                                        <div class="dlks_152">
                                            <div class="shorting-right ml-2">
                                                <label>مرتب سازی براساس:</label>
                                                <div class="dropdown show">
                                                    <a class="btn btn-filter dropdown-toggle" href="#"
                                                       data-toggle="dropdown" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <span class="selection">امتیاز بالا</span>
                                                    </a>
                                                    <div class="drp-select dropdown-menu">
                                                        <a class="dropdown-item" href="JavaScript:Void(0);">امتیاز
                                                            بالا</a>
                                                        <a class="dropdown-item" href="JavaScript:Void(0);">بازدید
                                                            بالا</a>
                                                        <a class="dropdown-item" href="JavaScript:Void(0);">دوره
                                                            جدید</a>
                                                        <a class="dropdown-item" href="JavaScript:Void(0);">دوره
                                                            منتخب</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="lmk_485">
                                                <ul class="shorting_grid">
                                                    <li class="list-inline-item"><a href="grid-layout-full.html"
                                                                                    class="active"><span
                                                                class="ti-layout-grid2"></span></a></li>
                                                    <li class="list-inline-item"><a
                                                            href="list-layout-with-full.html"><span
                                                                class="ti-view-list"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <!-- Single Grid -->
                        @foreach($courses as $course)
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="crs_lt_2">

                                    <div class="crs_lt_boxes">
                                        <div class="crs_grid_list_thumb">
                                            <a href="{{$course->path()}}"><img src="{{$course->thumb}}"
                                                                               class="img-fluid rounded" alt=""></a>
                                        </div>

                                        <div class="crs_grid_list_caption">
                                            <div class="crs_lt_101">
                                                <span class="est st_1">{{$course->category->name}}</span>
                                                <span class="est st_2">{{$course->short_body}}</span>
                                            </div>
                                            <div class="crs_lt_102">
                                                <h4 class="crs_tit">{{$course->name}}</h4>
                                                <span
                                                    class="crs_auth"><i>  مدرس  </i>  {{$course->teacher->name}}</span>
                                            </div>
                                            <div class="crs_lt_103">
                                                <div class="crs_info_detail">
                                                    <ul>
                                                        <li><i class="fa fa-video"></i><span>{{$course->seasons->count()}} فصل آموزشی</span>
                                                        </li>
                                                        <li><i class="fa fa-user"></i><span>{{$course->lessons->count()}} جلسه</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="crs_flex">
                                                <div class="crs_fl_first">
                                                    <div class="crs_price"><h2><span
                                                                class="theme-cl">{{$course->price}}</span><span
                                                                class="currency">تومان</span></h2></div>
                                                </div>
                                                <div class="crs_fl_last">
                                                    <div class="crs_linkview"><a href="{{$course->path()}}"
                                                                                 class="btn btn_view_detail theme-bg text-light">جزئیات</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lt_cr_footer">
                                        <div class="lt_cr_footer_first">
                                            <ul class="lt_cr_list">
                                                <li><a href="#" class="prv_li"><i class="fa fa-play text-success"></i>مشاهده
                                                        پیش نمایش</a></li>
                                            </ul>
                                        </div>
                                        <div class="lt_cr_footer_last">
                                            <ul class="lt_cr_list">
                                                <li><i class="fa fa-lightbulb text-info"></i>مقدماتی</li>
                                                <li><i class="fa fa-hourglass-half  text-warning"></i>01:42:10</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <ul class="pagination p-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span class="ti-arrow-right"></span>
                                        <span class="sr-only">قبل</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">18</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span class="ti-arrow-left"></span>
                                        <span class="sr-only">بعد</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ course Detail ================================== -->

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
    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>

@endsection
