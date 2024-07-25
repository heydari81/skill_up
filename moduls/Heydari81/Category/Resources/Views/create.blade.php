<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="dashboard_wrap">

            <div class="form_blocs_wrap">
                <form method="POST" action="{{route('categories.store')}}">
                    @csrf
                    <div class="row justify-content-between">

                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-basic-tab" data-toggle="pill" data-target="#v-pills-basic" type="button" role="tab" aria-controls="v-pills-basic" aria-selected="true">اطلاعات پایه</button>
                                <button type="submit" class="nav-link" aria-selected="false">ثبت نهایی</button>

                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">

                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- Basic -->
                                <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">

                                    <div class="form-group smalls">
                                        <label>نام دسته</label>
                                        <input type="text" name="title" required class="form-control" placeholder="گرافیک">
                                    </div>
                                    <div class="form-group smalls">
                                        <label>نام انگلیسی</label>
                                        <input type="text" name="slug" required class="form-control" placeholder="graph">
                                    </div>

                                    <div class="form-group smalls">
                                        <label>نوع</label>
                                        <div class="simple-input">
                                            <select name="type" id="cates" class="form-control" required>
                                                <option value="course">دوره</option>
                                                <option value="package">پکیج</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group smalls">
                                        <label>دسته بندی والد</label>
                                        <div class="simple-input">
                                            <select name="parent_id" id="cates" class="form-control">
                                                <option value="">ندارد</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}->{{$category->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
