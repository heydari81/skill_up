@extends('Dashboard::layout.dashboardmaster')
@section('dashboard_in')
@include('User::Back.create')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="dashboard_wrap">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                    <h6 class="m-0">لیست کاربران</h6>
                </div>
            </div>

            <div class="row align-items-end mb-5">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>دسته بندی</label>
                        <div class="smalls">
                            <select id="cates" class="form-control">
                                <option value="">&nbsp;</option>
                                <option value="1">فناوری اطلاعات</option>
                                <option value="2">حسابداری</option>
                                <option value="3">برنامه نویسی</option>
                                <option value="4">مدیریت</option>
                                <option value="5">طراحی و گرافیک</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>مدرسین</label>
                        <div class="smalls">
                            <select id="ins" class="form-control">
                                <option value="">&nbsp;</option>
                                <option value="1">یکتا ناصری</option>
                                <option value="2">مصطفی اسلامی</option>
                                <option value="3">مژگان علیزاده</option>
                                <option value="4">محمد کریمی</option>
                                <option value="5">حسین محمدی</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>وضعیت</label>
                        <div class="smalls">
                            <select id="sts" class="form-control">
                                <option value="">&nbsp;</option>
                                <option value="1">فعال</option>
                                <option value="2">درحال انتظار</option>
                                <option value="3">منقضی</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>قیمت</label>
                        <div class="smalls">
                            <select id="prc" class="form-control">
                                <option value="">&nbsp;</option>
                                <option value="1">همه</option>
                                <option value="2">رایگان</option>
                                <option value="3">پولی</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                    <div class="form-group">
                        <button type="button" class="btn text-white full-width theme-bg">فیلتر</button>
                    </div>
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
                                <th scope="col">تصویر پروفایل</th>
                                <th scope="col">نام</th>
                                <th scope="col">ایمیل</th>
                                <th scope="col">نقش</th>
                                <th scope="col">وضعیت تایید</th>
                                <th scope="col">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td><img width="80" alt="" src="{{$user->thumb}}"></td>
                                <td><h6>{{$user->name}}</h6></td>
                                <td><h6>{{$user->email}}</h6></td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <h6>{{$role->name}}</h6>
                                    @endforeach

                                </td>
                                <td><span class="trip theme-cl theme-bg-light">{{$user->status}}</span></td>
{{--                                <td id ="confirm"></td>--}}
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                        <div class="drp-select dropdown-menu">
                                            <a class="dropdown-item" href="{{route('users.edit',$user->id)}}">ویرایش</a>
                                            <a class="dropdown-item" href="JavaScript:Void(0);">باز/قفل</a>
                                            <a class="dropdown-item" href="" onclick="event.preventDefault();updateConfirmationStatus(event,'{{route('courses.updateConfirmStatus',$user->id)}}','تغییر داده شد')">تغییر وضعیت تایید</a>
                                            <a class="dropdown-item" href=""onclick="event.preventDefault();deleteItem(event,'{{route('courses.destroy',$user->id)}}')">حذف</a>
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
                    .done(function (response){event.target.closest('tr').remove()})
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
