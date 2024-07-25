<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content overli" id="loginmodal">
            <div class="modal-header">
                <h5 class="modal-title">ورود به حساب کاربری</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form method="POST" action="{{route('login')}}">
                            @csrf
                        <div class="form-group">
                            <label>ایمیل</label>
                            <div class="input-with-icon">
                                <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus
                                       autocomplete="email" class="form-control" placeholder="ایمیل">
                                <i class="ti-user"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>رمز عبور</label>
                            <div class="input-with-icon">
                                <input id="password" type="password" name="password"  required
                                       autocomplete="current-password" class="form-control" placeholder="*******">
                                <i class="ti-unlock"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width theme-bg text-white">ورود به حساب</button>
                        </div>

                        <div class="rcs_log_125 pt-2 pb-3">
                            <span>یا ثبت نام از طریق شبکه های اجتماعی</span>
                        </div>
                        <div class="rcs_log_126 full">
                            <ul class="social_log_45 row">
                                <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-facebook text-info"></i>Facebook</a></li>
                                <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-google text-danger"></i>Google</a></li>
                                <li class="col-xl-4 col-lg-4 col-md-4 col-4"><a href="javascript:void(0);" class="sl_btn"><i class="ti-twitter theme-cl"></i>Twitter</a></li>
                            </ul>
                        </div>

                    </form>
                </div>
            </div>
            <div class="crs_log__footer d-flex justify-content-between mt-0">
                <div class="fhg_45"><p class="musrt">حساب کاربری ندارید؟ <a href="{{route('register')}}" class="theme-cl">ثبت نام</a></p></div>
                <div class="fhg_45"><p class="musrt"><a href="{{route('password.request')}}" class="text-danger">رمز عبور را فراموش کرده اید؟</a></p></div>
            </div>
        </div>
    </div>
</div>
