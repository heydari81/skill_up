<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="dashboard_wrap">
            <div class="form_blocs_wrap">
                <form method="POST" action="{{route('courses.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-basic-tab" data-toggle="pill"
                                        data-target="#v-pills-basic" type="button" role="tab"
                                        aria-controls="v-pills-basic" aria-selected="true">اطلاعات پایه
                                </button>
                                <button class="nav-link
                                 @if ($errors->has('name') || $errors->has('slug') || $errors->has('priority') || $errors->has('body')
                                    || $errors->has('short_body') || $errors->has('category_id') || $errors->has('teacher_id'))
                                 bg-light-danger
                                  @endif" id="v-pills-requirements-tab" data-toggle="pill"
                                        data-target="#v-pills-requirements" type="button" role="tab"
                                        aria-controls="v-pills-requirements" aria-selected="false">وضعیت
                                </button>
                                <button class="nav-link
                                @if ($errors->has('price') || $errors->has('percent') || $errors->has('status'))
                                 bg-light-danger
                                  @endif" id="v-pills-pricing-tab" data-toggle="pill"
                                        data-target="#v-pills-pricing" type="button" role="tab"
                                        aria-controls="v-pills-pricing" aria-selected="false">قیمت
                                </button>
                                <button class="nav-link
                                @if ($errors->has('image'))
                                 bg-light-danger
                                  @endif" id="v-pills-media-tab" data-toggle="pill"
                                        data-target="#v-pills-media" type="button" role="tab"
                                        aria-controls="v-pills-media" aria-selected="false">رسانه
                                </button>
                                <button class="nav-link" id="v-pills-seo-tab" data-toggle="pill"
                                        data-target="#v-pills-seo" type="button" role="tab" aria-controls="v-pills-seo"
                                        aria-selected="false">سئو
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
                                        <label>عنوان دوره*</label>
                                        <input type="text" name="name" required class="form-control"
                                         value="{{old('name')}}"      placeholder="تدریس ریاضی و آمار دهم انسانی">
                                        @error('name')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>عنوان انگلیسی*</label>
                                        <input type="text" name="slug" required class="form-control"
                                               value="{{old('slug')}}"    placeholder="تدریس ریاضی و آمار دهم انسانی">
                                        @error('slug')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group smalls">
                                        <label>اولویت</label>
                                        <input type="text" name="priority" class="form-control"
                                               value="{{old('priority')}}" placeholder="اولویت">
                                        @error('priority')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>
                                    <div class="form-group smalls">
                                        <label>توضیحات کوتاه</label>
                                        <input type="text" name="short_body" class="form-control" value="{{old('short_body')}}">
                                        @error('short_body')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>توضیحات</label>
                                        <textarea name="body" class="summernote"></textarea>
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
                                                    <option selected value="{{$category->id}}">{{$category->name}}</option>
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
                                                    <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                                                @else
                                                    @foreach($teachers as $teacher)
                                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
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
                                                <input id="l222" class="checkbox-custom" value="not-completed"
                                                       name="status" type="radio">
                                                <label for="l222" class="checkbox-custom-label">در حال برگزاری</label>
                                                <input id="l22" class="checkbox-custom" value="completed" name="status"
                                                       type="radio">
                                                <label for="l22" class="checkbox-custom-label">تکمیل</label>
                                                <input id="l223" class="checkbox-custom" value="lock" name="status"
                                                       type="radio">
                                                <label for="l223" class="checkbox-custom-label">غیر فعال</label>
                                                @error('status')
                                                <hr>
                                                <h7 class="btn-outline-danger">{{ $message }}</h7>
                                                <hr>
                                                @enderror
                                            </div>
                                        </ul>
                                    </div>

                                </div>

                                <!-- pricing -->
                                <div class="tab-pane fade" id="v-pills-pricing" role="tabpanel"
                                     aria-labelledby="v-pills-pricing-tab">
                                    <div class="form-group smalls">
                                        <label>قیمت دوره (تومان)</label>
                                        <input type="text" name="price" class="form-control"
                                               value="{{old('price')}}" placeholder="750 تومان">
                                        @error('price')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>درصد مدرس</label>
                                        <input type="text" name="percent" class="form-control"
                                               value="{{old('percent')}}" placeholder="20%">
                                        @error('percent')
                                        <hr>
                                        <h7 class="btn-outline-danger">{{ $message }}</h7>
                                        <hr>
                                        @enderror
                                        <div class="drios">
                                            <input id="l22" class="checkbox-custom" name="l22" type="checkbox">
                                            <label for="l22" class="checkbox-custom-label">این تخفیف را فعال
                                                کنید</label>
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

                                <!-- media -->
                                <div class="tab-pane fade" id="v-pills-media" role="tabpanel"
                                     aria-labelledby="v-pills-media-tab">

                                    <div class="form-group smalls">
                                        <label>تصویر</label>
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input"
                                                   value="{{old('image')}}" id="customFile">
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
