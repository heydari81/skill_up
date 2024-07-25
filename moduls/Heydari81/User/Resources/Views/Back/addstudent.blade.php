@extends('Dashboard::layout.dashboardmaster')
@section('dashboard_in')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">
                <div class="form_blocs_wrap">
                    <form method="POST" action="{{route('addstudent')}}">
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
                                            <label>کاربر</label>
                                            <div class="simple-input">
                                                <select id="cates" name="user_id" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group smalls">
                                            <label>دوره</label>
                                            <div class="simple-input">
                                                <select id="cates" name="course_id" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    @foreach($courses as $course)
                                                        <option value="{{$course->id}}">{{$course->name}}...{{$course->teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
