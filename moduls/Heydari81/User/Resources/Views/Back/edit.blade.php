@extends('Dashboard::layout.dashboardmaster')
@section('dashboard_in')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">
                <div class="form_blocs_wrap">
                    <form method="POST" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row justify-content-between">
                            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-basic-tab" data-toggle="pill" data-target="#v-pills-basic" type="button" role="tab" aria-controls="v-pills-basic" aria-selected="true">اطلاعات پایه</button>
                                    <button class="nav-link" id="v-pills-requirements-tab" data-toggle="pill" data-target="#v-pills-requirements" type="button" role="tab" aria-controls="v-pills-requirements" aria-selected="false">وضعیت</button>
                                    <button class="nav-link" id="v-pills-media-tab" data-toggle="pill" data-target="#v-pills-media" type="button" role="tab" aria-controls="v-pills-media" aria-selected="false">رسانه</button>
                                    <button class="nav-link" id="v-pills-seo-tab" data-toggle="pill" data-target="#v-pills-seo" type="button" role="tab" aria-controls="v-pills-seo" aria-selected="false">سئو</button>
                                    <button type="submit" class="nav-link" aria-selected="false">ثبت نهایی</button>
                                </div>
                            </div>

                            <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">

                                <div class="tab-content" id="v-pills-tabContent">
                                    <!-- Basic -->
                                    <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">

                                        <div class="form-group smalls">
                                            <label>نام</label>
                                            <input type="text" name="name" required class="form-control"
                                                   value="{{$user->name}}">
                                        </div>

                                        <div class="form-group smalls">
                                            <label>نام کاربری</label>
                                            <input type="text" name="username" required class="form-control"
                                                   value="{{$user->username}}" placeholder="ahmad1200">
                                        </div>
                                        <div class="form-group smalls">
                                            <label>ایمیل</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{$user->email}}" placeholder="ایمیل">
                                        </div>
                                        <div class="form-group smalls">
                                            <label>رمز</label>
                                            <input type="password" name="password" class="form-control" placeholder="******">
                                        </div>
                                        <div class="form-group smalls">
                                            <label>تایید رمز</label>
                                            <input type="password" name="confirmation_password" class="form-control" placeholder="*****">
                                        </div>
                                        <div class="form-group smalls">
                                            <label>نقش</label>
                                            <div class="simple-input">
                                                <select id="cates" name="role" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <ul class="alios_slide_nav">
                                                <li><a href="#" class="btn btn_slide disabled"><i class="fas fa-arrow-right"></i></a></li>
                                                <li><a href="#" class="btn btn_slide"><i class="fas fa-arrow-left"></i></a></li>
                                            </ul>
                                        </div>

                                    </div>

                                    <!-- status -->
                                    <div class="tab-pane fade" id="v-pills-requirements" role="tabpanel" aria-labelledby="v-pills-requirements-tab">
                                        <div class="form-group smalls">
                                            <label>انتخاب کنید</label>
                                        </div>

                                        <div class="form-group smalls">
                                            <ul class="lists-4">
                                                <div class="drios">
                                                    <input id="l222" class="checkbox-custom" value="ban" name="status" type="radio">
                                                    <label for="l222" class="checkbox-custom-label">تعلیق</label>
                                                    <input id="l22" class="checkbox-custom" value="active" name="status" type="radio">
                                                    <label for="l22" class="checkbox-custom-label">فعال</label>
                                                </div>
                                            </ul>
                                        </div>

                                    </div>
                                    <!-- media -->
                                    <div class="tab-pane fade" id="v-pills-media" role="tabpanel" aria-labelledby="v-pills-media-tab">

                                        <div class="form-group smalls">
                                            <label>تصویر</label>
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">انتخاب فایل</label>
                                                <img src="{{$user->thumb}}" alt="">
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center">
                                            <ul class="alios_slide_nav">
                                                <li><a href="#" class="btn btn_slide"><i class="fas fa-arrow-right"></i></a></li>
                                                <li><a href="#" class="btn btn_slide"><i class="fas fa-arrow-left"></i></a></li>
                                            </ul>
                                        </div>

                                    </div>

                                    <!-- seo -->
                                    <div class="tab-pane fade" id="v-pills-seo" role="tabpanel" aria-labelledby="v-pills-seo-tab">
                                        <div class="form-group smalls">
                                            <label>هدلاین</label>
                                            <input type="headline" class="form-control"
                                                   value="{{$user->headline}}" placeholder="عنوان ">
                                        </div>

                                        <div class="form-group smalls">
                                            <label>بیوگرافی</label>
                                            <textarea name="bio" class="summernote">{{$user->bio}}</textarea>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center">
                                            <ul class="alios_slide_nav">
                                                <li><a href="#" class="btn btn_slide"><i class="fas fa-arrow-right"></i></a></li>
                                                <li><a href="#" class="btn btn_slide"><i class="fas fa-arrow-left"></i></a></li>
                                            </ul>
                                        </div>

                                    </div>

                                    <!-- finish -->
                                    <div class="tab-pane fade" id="v-pills-finish" role="tabpanel" aria-labelledby="v-pills-finish-tab">
                                        <div class="succ_wrap">
                                            <div class="succ_121"><i class="fas fa-thumbs-up"></i></div>
                                            <div class="succ_122">
                                                <h4 class="font-2">دوره با موفقیت اضافه شد</h4>
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                                            </div>
                                            <div class="succ_123"><a href="../../../../../resources/views/Skill_Up_Html/skillup/course-detail.html" class="btn theme-bg text-white">مشاهده دوره</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
