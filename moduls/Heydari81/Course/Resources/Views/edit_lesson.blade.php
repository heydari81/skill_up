@extends('Dashboard::layout.dashboardmaster')
@section('dashboard_in')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="dashboard_wrap">
            <div class="form_blocs_wrap">
                <form method="POST" action="{{route('lessons.update',$lesson->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row justify-content-between">

                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-basic-tab" data-toggle="pill"
                                        data-target="#v-pills-basic" type="button" role="tab"
                                        aria-controls="v-pills-basic" aria-selected="true">اطلاعات پایه
                                </button>
                                <button class="nav-link" id="v-pills-requirements-tab" data-toggle="pill"
                                        data-target="#v-pills-requirements" type="button" role="tab"
                                        aria-controls="v-pills-requirements" aria-selected="false">وضعیت
                                </button>
                                <button class="nav-link" id="v-pills-media-tab" data-toggle="pill"
                                        data-target="#v-pills-media" type="button" role="tab"
                                        aria-controls="v-pills-media" aria-selected="false">رسانه
                                </button>
                                <button type="submit" class="nav-link" aria-selected="false">ثبت نهایی</button>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">

                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- Basic -->
                                <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel"
                                     aria-labelledby="v-pills-basic-tab">

                                    <div class="form-group smalls">
                                        <label>عنوان جلسه*</label>
                                        <input type="text" name="title" required class="form-control"
                                           value="{{$lesson->title}}"    placeholder="تدریس ریاضی و آمار دهم انسانی">
                                        @error('title')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group smalls">
                                        <label>اولویت</label>
                                        <input type="number" name="priority" class="form-control"
                                               value="{{$lesson->priority}}" placeholder="اولویت">
                                        @error('priority')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group smalls">
                                        <label>توضیحات</label>
                                        <textarea name="body" class="summernote">{{ $lesson->body  }}</textarea>
                                        @error('body')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group smalls">
                                        <label>سرفصل</label>
                                        <div class="simple-input">
                                            <select id="cates" name="season_id" class="form-control">
                                                <option value="">ندارد</option>
                                                @foreach($seasons as $season)
                                                    <option @if($season->id == $lesson->season_id) selected @endif value="{{$season->id}}">{{$season->title}}</option>
                                                @endforeach
                                            </select>
                                            @error('season_id')
                                            <hr>
                                            <h7 class="btn-outline-danger">{{ $message }}</h7>
                                            <hr>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <ul class="alios_slide_nav">
                                            <li><a href="#" class="btn btn_slide disabled"><i
                                                        class="fas fa-arrow-right"></i></a></li>
                                            <li><a href="#" class="btn btn_slide"><i class="fas fa-arrow-left"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <!-- status -->
                                <div class="tab-pane fade" id="v-pills-requirements" role="tabpanel"
                                     aria-labelledby="v-pills-requirements-tab">
                                    <div class="form-group smalls">
                                        <label>انتخاب کنید</label>

                                    </div>

                                    <div class="form-group smalls">
                                        <ul class="lists-4">
                                            <div class="drios">
                                                <input id="l222" class="checkbox-custom" value="unlock" name="status"
                                                       type="radio">
                                                <label for="l222" class="checkbox-custom-label">باز</label>
                                                <input id="l223" class="checkbox-custom" value="lock" name="status"
                                                       type="radio">
                                                <label for="l223" class="checkbox-custom-label">بسته</label>
                                                <hr>
                                                <input id="l224" class="checkbox-custom" value="1" name="free"
                                                       type="radio">
                                                <label for="l224" class="checkbox-custom-label">رایگان</label>
                                                <input id="l225" class="checkbox-custom" value="0" name="free"
                                                       type="radio">
                                                <label for="l225" class="checkbox-custom-label">پولی</label>
                                            </div>
                                            @error('status')
                                            <hr>
                                            <h7 class="btn-outline-danger">{{ $message }}</h7>
                                            <hr>
                                            @enderror
                                            @error('free')
                                            <hr>
                                            <h7 class="btn-outline-danger">{{ $message }}</h7>
                                            <hr>
                                            @enderror
                                        </ul>
                                    </div>

                                </div>
                                <!-- media -->
                                <div class="tab-pane fade" id="v-pills-media" role="tabpanel"
                                     aria-labelledby="v-pills-media-tab">

                                    <div class="form-group smalls">
                                        <label>مدیا</label>
                                        <div class="custom-file">
                                            <input name="media" type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">انتخاب فایل</label>
                                            @error('media')
                                            <hr>
                                            <h7 class="btn-outline-danger">{{ $message }}</h7>
                                            <hr>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <ul class="alios_slide_nav">
                                            <li><a href="#" class="btn btn_slide"><i class="fas fa-arrow-right"></i></a>
                                            </li>
                                            <li><a href="#" class="btn btn_slide"><i class="fas fa-arrow-left"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <!-- seo -->
                                <div class="tab-pane fade" id="v-pills-seo" role="tabpanel"
                                     aria-labelledby="v-pills-seo-tab">
                                    <div class="form-group smalls">
                                        <label>عنوان</label>
                                        <input type="text" class="form-control" placeholder="عنوان سئو">
                                    </div>

                                    <div class="form-group smalls">
                                        <label>توضیحات</label>
                                        <textarea class="form-control" placeholder="توضیحات دوره"></textarea>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <ul class="alios_slide_nav">
                                            <li><a href="#" class="btn btn_slide"><i class="fas fa-arrow-right"></i></a>
                                            </li>
                                            <li><a href="#" class="btn btn_slide"><i class="fas fa-arrow-left"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <!-- finish -->
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<form action="/target" class="dropzone" id="my-great-dropzone"></form>
@endsection
<script>
    Dropzone.options.myGreatDropzone = { // camelized version of the `id`
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        accept: function (file, done) {
            if (file.name == "justinbieber.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }
    };
</script>
