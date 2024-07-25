<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="dashboard_wrap">
            <div class="form_blocs_wrap">
                <form method="POST" action="{{route('seasons.store',$course->id)}}">
                    @csrf
                    <div class="row justify-content-between">

                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-basic-tab" data-toggle="pill" data-target="#v-pills-basic" type="button" role="tab" aria-controls="v-pills-basic" aria-selected="true">اطلاعات پایه</button>
{{--                                <button class="nav-link" id="v-pills-requirements-tab" data-toggle="pill" data-target="#v-pills-requirements" type="button" role="tab" aria-controls="v-pills-requirements" aria-selected="false">وضعیت</button>--}}
                                <button type="submit" class="nav-link" aria-selected="false">ثبت نهایی</button>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">

                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- Basic -->
                                <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">

                                    <div class="form-group smalls">
                                        <label>عنوان فصل</label>
                                        <input type="text" name="title" required class="form-control" placeholder="">
                                        @error('title')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group smalls">
                                        <label>اولویت</label>
                                        <input type="text" name="priority" class="form-control" placeholder="">
                                        @error('priority')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
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

{{--                                    <div class="form-group smalls">--}}
{{--                                        <ul class="lists-4">--}}
{{--                                            <div class="drios">--}}
{{--                                                <input id="l22" class="checkbox-custom" value="unlock" name="status" type="radio">--}}
{{--                                                <label for="l22" class="checkbox-custom-label">باز</label>--}}
{{--                                                <input id="l223" class="checkbox-custom" value="lock" name="status" type="radio">--}}
{{--                                                <label for="l223" class="checkbox-custom-label">غیر فعال</label>--}}
{{--                                            </div>--}}
{{--                                        </ul>--}}
{{--                                        @error('status')--}}
{{--                                        <hr>--}}
{{--                                        <h7 class="btn-outline-danger">{{ $message }}</h7>--}}
{{--                                        <hr>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

                                </div>

                                <!-- seo -->
                                <!-- finish -->
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
