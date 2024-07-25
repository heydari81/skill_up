@extends('User::Front.layout.master')
@section('content_in')
    <section>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                    <form method="POST" action="{{route('verification.send')}}">
                        @csrf
                        <div class="crs_log_wrap">
                            <div class="crs_log__thumb">
                                <img src="assets/img/banner-2.jpg" class="img-fluid" alt="" />
                            </div>
                            <div class="crs_log__caption">
                                <div class="rcs_log_123">
                                    <div class="rcs_ico"><i class="fas fa-user"></i></div>
                                </div>

                                <div class="rcs_log_124">
                                    <div class="Lpo09"><h4>لطفا به صفحه ایمیل خود بروید و لینک حاوی پیام را تایید کنید</h4></div>
                                    @if (session('status') == 'verification-link-sent')
                                        <hr>
                                        <div class="Lpo09"><h6>لینک جدید فرستاده شد</h6></div>
                                    @endif
                                    <div class="form-group">
                                        <button type="submit" class="btn full-width btn-md theme-bg text-white">ارسال مجدد</button>
                                    </div>
                            </div>
                            <div class="crs_log__footer d-flex justify-content-between">
                                <div class="fhg_45"><p class="musrt">آیا حساب  کاربری دارید؟ <a href="{{route('login')}}" class="theme-cl">ورود</a></p></div>
                                <div class="fhg_45"><p class="musrt"><a href="{{route('password.request')}}" class="text-danger">آیا رمز عبور خود را فراموش کرده اید؟</a></p></div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
