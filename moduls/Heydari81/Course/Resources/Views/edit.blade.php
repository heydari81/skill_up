@extends('Dashboard::layout.dashboardmaster')
@section('dashboard_in')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">
                <div class="form_blocs_wrap">
                    <form method="POST" action="{{route('courses.update',$course->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row justify-content-between">

                            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-basic-tab" data-toggle="pill" data-target="#v-pills-basic" type="button" role="tab" aria-controls="v-pills-basic" aria-selected="true">اطلاعات پایه</button>
                                    <button class="nav-link" id="v-pills-requirements-tab" data-toggle="pill" data-target="#v-pills-requirements" type="button" role="tab" aria-controls="v-pills-requirements" aria-selected="false">وضعیت</button>
                                    <button class="nav-link" id="v-pills-pricing-tab" data-toggle="pill" data-target="#v-pills-pricing" type="button" role="tab" aria-controls="v-pills-pricing" aria-selected="false">قیمت</button>
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
                                            <label>عنوان دوره*</label>
                                            <input value="{{$course->name}}" type="text" name="name" required class="form-control" placeholder="تدریس ریاضی و آمار دهم انسانی">
                                            @error('name')
                                            <hr>
                                            <h7 class="btn-outline-danger">{{ $message }}</h7>
                                            <hr>
                                            @enderror
                                        </div>

                                        <div class="form-group smalls">
                                            <label>عنوان انگلیسی*</label>
                                            <input value="{{$course->slug}}" type="text" name="slug" required class="form-control" placeholder="تدریس ریاضی و آمار دهم انسانی">
                                            @error('slug')
                                            <hr>
                                            <h7 class="btn-outline-danger">{{ $message }}</h7>
                                            <hr>
                                            @enderror
                                        </div>
                                        @if(auth()->user()->hasRole('manager') || auth()->user()->hasRole('super_admin') )
                                            <div class="form-group smalls">
                                                <label>اولویت</label>
                                                <input value="{{$course->priority}}" type="number" name="priority" class="form-control" placeholder="اولویت">
                                                @error('priority')
                                                <hr>
                                                <h7 class="btn-outline-danger">{{ $message }}</h7>
                                                <hr>
                                                @enderror
                                            </div>
                                        @endif
                                        <div class="form-group smalls">
                                            <label>توضیحات کوتاه</label>
                                            <input value="{{$course->short_body}}" type="text" name="short_body" class="form-control">
                                            @error('short_body')
                                            <hr>
                                            <h7 class="btn-outline-danger">{{ $message }}</h7>
                                            <hr>
                                            @enderror
                                        </div>

                                        <div class="form-group smalls">
                                            <label>توضیحات</label>
                                            <textarea  name="body" class="summernote">{{$course->body}}</textarea>
                                            @error('body')
                                            <hr>
                                            <h7 class="btn-outline-danger">{{ $message }}</h7>
                                            <hr>
                                            @enderror
                                        </div>

                                        <div class="form-group smalls">
                                            <label>دسته بندی*</label>
                                            <div class="simple-input">
                                                <select id="cates" name="category_id" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    @foreach($categories as $category)
                                                        <option @if($course->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <hr>
                                                <h7 class="btn-outline-danger">{{ $message }}</h7>
                                                <hr>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group smalls">
                                            <label>مدرس</label>
                                            <div class="simple-input">
                                                <select id="cates2" name="teacher_id" class="form-control">
                                                    <option value="">ندارد&nbsp;</option>
                                                    @if(auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin'))
                                                        <option value="{{$teachers->id}}" selected >{{$teachers->name}}</option>
                                                    @else
                                                        @foreach($teachers as $teacher)
                                                            <option value="{{$teacher->id}}" @if($course->teacher_id == $teacher->id) selected @endif >{{$teacher->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('teacher_id')
                                                <hr>
                                                <h7 class="btn-outline-danger">{{ $message }}</h7>
                                                <hr>
                                                @enderror
                                            </div>
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
                                                    <input id="l222" class="checkbox-custom" value="not-completed" name="status" type="radio">
                                                    <label for="l222" class="checkbox-custom-label">در حال برگزاری</label>
                                                    <input id="l22" class="checkbox-custom" checked value="completed" name="status" type="radio">
                                                    <label for="l22" class="checkbox-custom-label">تکمیل</label>
                                                    <input id="l223" class="checkbox-custom" value="lock" name="status" type="radio">
                                                    <label for="l223" class="checkbox-custom-label">غیر فعال</label>
                                                </div>
                                                @error('status')
                                                <hr>
                                                <h7 class="btn-outline-danger">{{ $message }}</h7>
                                                <hr>
                                                @enderror
                                            </ul>
                                        </div>

                                    </div>

                                    <!-- pricing -->
                                    <div class="tab-pane fade" id="v-pills-pricing" role="tabpanel" aria-labelledby="v-pills-pricing-tab">

                                        <div class="form-group smalls">
                                            <label>قیمت دوره (تومان)</label>
                                            <input value="{{$course->price}}" type="text" name="price" class="form-control" placeholder="750 تومان">
                                            @error('price')
                                            <hr>
                                            <h7 class="btn-outline-danger">{{ $message }}</h7>
                                            <hr>
                                            @enderror
                                        </div>
                                        @if(auth()->user()->hasRole('manager') || auth()->user()->hasRole('super_admin') )
                                            <div class="form-group smalls">
                                                <label>درصد مدرس</label>
                                                <input value="{{$course->percent}}" type="text" name="percent" class="form-control" placeholder="20%">
                                                <div class="drios">
                                                    <input id="l22" class="checkbox-custom" name="l22" type="checkbox">
                                                    <label for="l22" class="checkbox-custom-label">این تخفیف را فعال کنید</label>
                                                    @error('percent')
                                                    <hr>
                                                    <h7 class="btn-outline-danger">{{ $message }}</h7>
                                                    <hr>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- media -->
                                    <div class="tab-pane fade" id="v-pills-media" role="tabpanel" aria-labelledby="v-pills-media-tab">

                                        <div class="form-group smalls">
                                            <label>تصویر</label>
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">انتخاب فایل</label>
                                                @error('image')
                                                <hr>
                                                <h7 class="btn-outline-danger">{{ $message }}</h7>
                                                <hr>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center">
                                            <ul class="alios_slide_nav">
                                                <img src="{{$course->thumb}}" alt="">
                                            </ul>
                                        </div>

                                    </div>

                                    <!-- seo -->
                                    <div class="tab-pane fade" id="v-pills-seo" role="tabpanel" aria-labelledby="v-pills-seo-tab">
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
