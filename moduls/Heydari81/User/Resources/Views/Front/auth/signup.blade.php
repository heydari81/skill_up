@extends('User::Front.layout.master')
@section('content_in')
    <section>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="crs_log_wrap">
                            <div class="crs_log__thumb">
                                <img src="assets/img/banner-2.jpg" class="img-fluid" alt=""/>
                            </div>
                            <div class="crs_log__caption">
                                <div class="rcs_log_123">
                                    <div class="rcs_ico"><i class="fas fa-user"></i></div>
                                </div>

                                <div class="rcs_log_124">
                                    <div class="Lpo09"><h4>ایجاد حساب کاربری</h4></div>
                                    <div class="form-group row mb-0">
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>نام و نام خانوداگی*</label>
                                                <input id="name" name="name" required autofocus autocomplete="name"
                                                       value="{{old('name')}}" type="text" class="form-control"
                                                       placeholder="علی مبارکی"/>
                                                @error('name')
                                                <hr>
                                                <h7 class="btn-outline-danger">{{ $message }}</h7>
                                                <hr>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>نام کاربری</label>
                                                <input type="text" class="form-control" placeholder="@ali1200"
                                                       value="{{old('username')}}" id="username" name="username"
                                                       required autocomplete="username"/>
                                                @error('username')
                                                <hr>
                                                <h7 class="btn-outline-danger">{{ $message }}</h7>
                                                <hr>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>ایمیل*</label>
                                        <input id="email" type="text" class="form-control"
                                               placeholder="support@example.com"
                                               value="{{old('email')}}" name="email" required autocomplete="email"/>
                                        @error('email')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>موبایل</label>
                                        <input id="mobile" type="number" class="form-control" placeholder="09132822414"
                                               value="{{old('mobile')}}" name="mobile" :value="old('mobile')" required
                                               autocomplete="email"/>
                                        @error('mobile')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>رمز عبور*</label>
                                        <input type="password"
                                               name="password"
                                               required autocomplete="new-password" id="password" class="form-control"
                                               value="{{old('password')}}" placeholder="*******"/>
                                    </div>
                                    <div class="form-group">
                                        <label>تایید رمز عبور*</label>
                                        <input type="password"
                                               name="password"
                                               required autocomplete="password_confirmation" id="password_confirmation"
                                               class="form-control" placeholder="*******"/>
                                        @error('password')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn full-width btn-md theme-bg text-white">ثبت
                                            نام
                                        </button>
                                    </div>
                                </div>
                                <div class="rcs_log_125">
                                    <span>یا ورود از طریق شبکه های اجتماعی</span>
                                </div>
                                <div class="rcs_log_126">
                                    <ul class="social_log_45 row">
                                        <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);"
                                                                                        class="sl_btn"><i
                                                    class="ti-facebook text-info"></i>Facebook</a></li>
                                        <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);"
                                                                                        class="sl_btn"><i
                                                    class="ti-google text-danger"></i>Google</a></li>
                                        <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);"
                                                                                        class="sl_btn"><i
                                                    class="ti-twitter theme-cl"></i>Twitter</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="crs_log__footer d-flex justify-content-between">
                                <div class="fhg_45"><p class="musrt">آیا حساب کاربری دارید؟ <a href="{{route('login')}}"
                                                                                               class="theme-cl">ورود</a>
                                    </p></div>
                                <div class="fhg_45"><p class="musrt"><a href="{{route('password.request')}}"
                                                                        class="text-danger">آیا رمز عبور خود را فراموش
                                            کرده اید؟</a></p></div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
