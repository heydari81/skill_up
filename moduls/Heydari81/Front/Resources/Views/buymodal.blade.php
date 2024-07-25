<div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="buymodal" aria-hidden="true">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content overli" id="buymodal">
            <div class="modal-header">
                <h5 class="modal-title">خرید دوره</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form method="post" action="{{route('courses.buy',$course->id)}}">
                        @csrf
                        <div class="form-group">
                            <label>نام دوره</label>
                            <div class="input-with-icon">
                                <input type="text" class="form-control" placeholder="{{$course->name}}" disabled>
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>قیمت</label>
                            <div class="input-with-icon">
                                <input type="text" class="form-control" placeholder="{{$course->price}}تومان " disabled>
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width theme-bg text-white">پرداخت</button>
                        </div>
                    </form>
                </div>
            </div>
{{--            <div class="crs_log__footer d-flex justify-content-between mt-0">--}}
{{--                <div class="fhg_45"><p class="musrt">حساب کاربری ندارید؟ <a href="signup.html" class="theme-cl">ثبت نام</a></p></div>--}}
{{--                <div class="fhg_45"><p class="musrt"><a href="forgot.html" class="text-danger">رمز عبور را فراموش کرده اید؟</a></p></div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
