@extends('Front::layout.master')
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                    <form method="POST" action="{{route('users.update',auth()->id())}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="crs_log_wrap">
                            <div class="crs_log__thumb">
                                <img src="{{$user->thumb}}" class="img-fluid" alt=""/>
                            </div>
                            <div class="crs_log__caption">
                                <div class="rcs_log_123">
                                    <div class="rcs_ico"><i class="fas fa-user"></i></div>
                                </div>

                                <div class="rcs_log_124">
                                    <div class="Lpo09"><h4>پروفایل کاربری شما</h4></div>
                                    <div class="form-group row mb-0">
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>نام و نام خانوداگی*</label>
                                                <input id="name" name="name" required autofocus autocomplete="name"
                                                       value="{{$user->name}}" type="text" class="form-control"
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
                                                       value="{{$user->username}}" id="username" name="username"
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
                                             disabled  value="{{$user->email}}" name="email" required autocomplete="email"/>
                                        @error('email')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>موبایل</label>
                                        <input id="mobile" type="number" class="form-control" placeholder="09132822414"
                                               name="mobile" value="{{$user->mobile}}"
                                               autocomplete="email"/>
                                        @error('mobile')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>هدلاین</label>
                                        <input id="headline" type="text" class="form-control"
                                                name="headline" value="{{$user->headline}}" />
                                        @error('headline')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group smalls">
                                            <label>بیوگرافی</label>
                                            <textarea name="bio" class="summernote">{{$user->bio}}</textarea>
                                        </div>
                                        @error('bio')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group smalls">
                                        <label>تصویر</label>
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">انتخاب فایل</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn full-width btn-md theme-bg text-white">
                                            اعمال تغییرات
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="crs_log__footer d-flex justify-content-between">
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
