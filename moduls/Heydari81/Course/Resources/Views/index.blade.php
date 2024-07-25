@extends('Dashboard::layout.dashboardmaster')
@section('dashboard_in')
    @if(auth()->user()->hasRole('manager') || auth()->user()->hasRole('super_admin') )
        @include('course::create')
    @endif
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                        <h6 class="m-0">لیست دوره ها</h6>
                    </div>
                </div>
                @if(auth()->user()->hasRole('manager') || auth()->user()->hasRole('super_admin') )
                <form action="{{route('filtered.courses')}}" method="post">
                    @csrf
                    <div class="row align-items-end mb-5">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>دسته بندی</label>
                                <div class="smalls">
                                    <select id="cates" name="category_id" class="form-control">
                                        <option value=""></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->category_id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>مدرسین</label>
                                <div class="smalls">
                                    <select id="ins" name="teacher_id" class="form-control">
                                        <option value=""></option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>وضعیت</label>
                                <div class="smalls">
                                    <select id="sts" name="status" class="form-control">
                                        <option value=""></option>
                                        <option value="not-completed">در حال برگزاری</option>
                                        <option value="completed">تکمیل</option>
                                        <option value="lock">قفل</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>قیمت</label>
                                <div class="smalls">
                                    <select name="type" id="prc" class="form-control">
                                        <option value=""></option>
                                        <option value="free">رایگان</option>
                                        <option value="cash">پولی</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <button type="submit" class="btn text-white full-width theme-bg">فیلتر</button>
                            </div>
                        </div>
                    </div>
                </form>
                @endif
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="form-group smalls row align-items-center">
                            <label class="col-xl-3 col-lg-3 col-sm-2 col-form-label">نمایش</label>
                            <div class="col-xl-9 col-lg-9 col-sm-10">
                                <select id="show" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <option value="1">10</option>
                                    <option value="2">25</option>
                                    <option value="3">35</option>
                                    <option value="3">50</option>
                                    <option value="3">100</option>
                                    <option value="3">250</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="form-group smalls row align-items-center">
                            <label class="col-xl-2 col-lg-2 col-sm-2 col-form-label">جستجو</label>
                            <div class="col-xl-10 col-lg-10 col-sm-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                        <div class="table-responsive">
                            <table class="table dash_list">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">تصویر بنر</th>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">دسته بندی</th>
                                    <th scope="col">مدرس</th>
                                    <th scope="col">درصد مدرس</th>
                                    <th scope="col">تعداد دانشجو</th>
                                    <th scope="col">تعداد جلسات</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">وضعیت تایید</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <th scope="row">{{$course->id}}</th>
                                        <td><img width="80" alt="" src="{{$course->thumb}}"></td>
                                        <td><h6>{{$course->name}}</h6></td>
                                        <td>
                                            <div class="dhs_tags">{{$course->category->name}}</div>
                                        </td>
                                        <td>
                                            <div class="smalls">{{$course->teacher->name}}</div>
                                        </td>
                                        <td>
                                            <div class="smalls">{{$course->percent}}</div>
                                        </td>
                                        <td>
                                            <div class="smalls">{{$course->students->count()}}</div>
                                        </td>
                                        <td><span class="smalls">{{$course->lessons->count()}}</span></td>
                                        @if($course->status == "not-completed")
                                            <td><span id="confirm2" class="trip theme-cl2 theme-bg-light-3">در حال برگزاری</span>
                                            </td>
                                        @elseif($course->status == "completed")
                                            <td><span id="confirm2" class="trip theme-cl theme-bg-light">تکمیل</span>
                                            </td>
                                        @else
                                            <td><span id="confirm2" class="trip theme-cl3 theme-bg-light-2">قفل</span>
                                            </td>
                                        @endif
                                        <td id="confirm">{{$course->confirmation_status}}</td>
                                        @if($course->price == 0)
                                            <td><span class="trip theme-cl theme-bg-light">رایگان</span></td>
                                        @else
                                            <td><span class="smalls">{{$course->price}}</span></td>
                                        @endif
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-action" href="#" data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="drp-select dropdown-menu">
                                                    <a class="dropdown-item"
                                                       href="{{route('course_details',$course->id)}}">مشاهده</a>
                                                    <a class="dropdown-item"
                                                       href="{{route('courses.edit',$course->id)}}">ویرایش</a>
                                                    <a class="dropdown-item"
                                                       href="{{route('courses.lessons',$course->id)}}">افزودن جلسه</a>
                                                    <a class="dropdown-item" href=""
                                                       onclick="event.preventDefault();updateLock(event,'{{route('courses.lock',$course->id)}}','قفل یا باز شد')">باز/قفل</a>
                                                    @if(auth()->user()->hasRole('manager') || auth()->user()->hasRole('super_admin') )
                                                    <a class="dropdown-item" href=""
                                                       onclick="event.preventDefault();updateConfirmationStatus(event,'{{route('courses.updateConfirmStatus',$course->id)}}','تغییر داده شد')">تغییر
                                                        وضعیت تایید</a>
                                                    <a class="dropdown-item" href=""
                                                       onclick="event.preventDefault();deleteItem(event,'{{route('courses.destroy',$course->id)}}')">حذف</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if($filtered != 1)
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <p class="p-0">نمایش 1 تا 10 از {{$courses->count()}}</p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <nav class="float-right">
                                <ul class="pagination smalls m-0">
                                    {{-- Previous Page Link --}}
                                    @if ($courses->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="fas fa-arrow-circle-right"></i></span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $courses->previousPageUrl() }}" rel="prev"><i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @for ($i = 1; $i <= $courses->lastPage(); $i++)
                                        <li class="page-item {{ $i == $courses->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $courses->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    {{-- Next Page Link --}}
                                    @if ($courses->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $courses->nextPageUrl() }}" rel="next"><i
                                                    class="fas fa-arrow-circle-left"></i></a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="fas fa-arrow-circle-left"></i></span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>

                    </div>

                @endif

            </div>
        </div>
    </div>
@endsection
@section('js_in')
    <script>
        function deleteItem(event, route) {
            if (confirm('حذف کنم؟')) {
                $.post(route, {_method: "delete", _token: "{{ csrf_token() }}"}).done().fail()
                    .done(function (response) {
                        event.target.closest('tr').remove()
                        $.toast({
                            text: "ماموریت انجام شد قربان", // Text that is to be shown in the toast
                            heading: 'موفقیت آمیز', // Optional heading to be shown on the toast
                            icon: 'success', // Type of toast icon
                            showHideTransition: 'slide', // fade, slide or plain
                            allowToastClose: true, // Boolean value true or false
                            hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                            stack: 2, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                            position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values


                            textAlign: 'center',  // Text alignment i.e. left, right or center
                            loader: true,  // Whether to show loader or not. True by default
                            loaderBg: '#9EC600',  // Background color of the toast loader
                            beforeShow: function () {
                            }, // will be triggered before the toast is shown
                            afterShown: function () {
                            }, // will be triggered after the toat has been shown
                            beforeHide: function () {
                            }, // will be triggered before the toast gets hidden
                            afterHidden: function () {
                            }  // will be triggered after the toast has been hidden
                        });
                    })
                    .fail(function (response) {
                    })
            }
        }

        function updateConfirmationStatus(event, route, status) {
            if (confirm('مایل به تغیر اوضاع')) {
                $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"}).done().fail()
                    .done(function (response) {
                        $("#confirm").text(status)
                    })
                    .fail(function (response) {
                    })
            }
        }

        function updateLock(event, route, status) {
            if (confirm('مایل به قفل یا باز')) {
                $.post(route, {_method: "patch", _token: "{{ csrf_token() }}"}).done().fail()
                    .done(function (response) {
                        $("#confirm2").text(status)
                    })
                    .fail(function (response) {
                    })
            }
        }
    </script>

@endsection
