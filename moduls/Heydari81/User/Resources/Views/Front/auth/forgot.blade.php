@extends('User::Front.layout.master')
@section('content_in')
    <section>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                    <form method="POST" action="{{route('password.email')}}">
                        @csrf
                        <div class="crs_log_wrap">
                            <div class="crs_log__thumb">
                                <img src="assets/img/banner-2.jpg" class="img-fluid" alt=""/>
                            </div>
                            <div class="crs_log__caption">
                                <div class="rcs_log_123">
                                    <div class="rcs_ico"><i class="fas fa-lock"></i></div>
                                </div>

                                <div class="rcs_log_124">
                                    <div class="Lpo09"><h4>فراموشی رمز عبور</h4></div>
                                    <div class="form-group">
                                        <label>ایمیل خود را وارد کنید</label>
                                        <input id="email" type="email" name="email" value="{{old('email')}}" required
                                               autofocus class="form-control" placeholder="support@example.com"/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn full-width btn-md theme-bg text-white">فراموشی
                                            رمز
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="crs_log__footer d-flex justify-content-between">
                                <div class="fhg_45"><p class="musrt">هنوز ثبت نام نکرده اید؟ <a
                                            href="../skillup/signup.html" class="theme-cl">ثبت نام</a></p></div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
