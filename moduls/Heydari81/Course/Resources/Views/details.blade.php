@extends('Dashboard::layout.dashboardmaster')
@section('dashboard_in')
@include('course::create_season')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="dashboard_wrap">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                    <h6 class="m-0">لیست سرفصل ها</h6>
                </div>
            </div>


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
                                <th scope="col">عنوان</th>
                                <th scope="col">اولویت</th>
                                <th scope="col">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($seasons as $season)
                            <tr>
                                <th scope="row">{{$season->id}}</th>
                                <td><h6>{{$season->title}}</h6></td>
                                <td><h6>{{$season->priority}}</h6></td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                        <div class="drp-select dropdown-menu">
                                            <a class="dropdown-item" href="{{route('seasons.edit',$season->id)}}">ویرایش</a>
                                            <a class="dropdown-item" href=""onclick="event.preventDefault();deleteItem(event,'{{route('seasons.destroy',$season->id)}}')">حذف</a>
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

            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <p class="p-0">نمایش 1 تا 15 از 15</p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <nav class="float-right">
                        <ul class="pagination smalls m-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-arrow-circle-right"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(صفحه جاری)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-arrow-circle-left"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('js_in')
    <script>
        function deleteItem(event,route){
            if (confirm('حذف کنم؟')){
                $.post(route,{_method:"delete", _token:"{{ csrf_token() }}"}).done().fail()
                    .done(function (response){event.target.closest('tr').remove()
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
                            beforeShow: function () {}, // will be triggered before the toast is shown
                            afterShown: function () {}, // will be triggered after the toat has been shown
                            beforeHide: function () {}, // will be triggered before the toast gets hidden
                            afterHidden: function () {}  // will be triggered after the toast has been hidden
                        });
                    })
                    .fail(function (response){})
            }
        }
        function updateConfirmationStatus(event,route,status){
            if (confirm('مایل به تغیر اوضاع')){
                $.post(route,{_method:"patch", _token:"{{ csrf_token() }}"}).done().fail()
                    .done(function (response){$("#confirm").text(status)})
                    .fail(function (response){})
            }
        }
    </script>

@endsection
