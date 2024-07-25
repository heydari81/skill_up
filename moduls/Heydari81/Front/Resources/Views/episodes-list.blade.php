<div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
    <div class="edu_wraper">
        <h4 class="edu_title">آموزش کار با Premiere Pro</h4>
        <div id="accordionExample" class="accordion shadow circullum">
            @php
                $count=1;
            @endphp
            @foreach($seasons as $season)
                <!-- Part 1 -->
                <div class="card">
                    <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                        <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                            data-target="#collapse{{$season->id}}"
                                                            aria-expanded=@if($count == 1) "true"
                                                            @endif aria-controls="collapse{{$season->id}}"
                                                            class="d-block position-relative text-dark collapsible-link py-2">{{$season->title}}</a>
                        </h6>
                    </div>
                    <div id="collapse{{$season->id}}" aria-labelledby="headingOne" data-parent="#accordionExample"
                         class="collapse @if($count == 1)show @endif">
                        <div class="card-body pl-3 pr-3">
                            <ul class="lectures_lists">
                                @foreach($lessons as $lesson)
                                    @if($lesson->season_id == $season->id)
                                        <li class="complete">
                                            <div class="lectures_lists_title"><i class="fas
                                            @if($lesson->checkLock())
                                            fa-check
                                            @else
                                            fa-lock
                                            @endif
                                            dios"></i></div>
                                            @auth()
                                                @if((auth()->user()->hasAccessToCourse($course) || $lesson->checkFreeLesson() ) && $lesson->checkLock() )
                                                    @if($lesson->media->type != "video")
                                                        <h7 href="{{$lesson->path()}}">{{$lesson->title}}</h7>
                                                    @else
                                                        <a href="{{$lesson->path()}}">{{$lesson->title}}</a>
                                                    @endif
                                                    <div class="crs_cates2">
                                                        <a href="{{$lesson->downloadLink()}}"><span>دانلود</span></a>
                                                    </div>
                                                @else
                                                    <h7>{{$lesson->title}}</h7>
                                                @endif
                                            @endauth
                                            @guest()
                                                <h7>{{$lesson->title}}</h7>
                                            @endguest
                                            <span class="cls_timing">{{$lesson->media->type}}</span></li>
                                    @endif
                                @endforeach
                                {{--                                <li class="progressing"><div class="lectures_lists_title"><i class="fas fa-play dios"></i></div>پوشه بندی و ساختار فایل‌ها به روش من<span class="cls_timing">20:12</span></li>--}}
                                {{--                                <li class="unview"><div class="lectures_lists_title"><i class="fa fa-lock dios lock"></i></div>آشنایی با پنل‌های اصلی در پریمیر<span class="cls_timing">32:10</span></li>--}}
                                {{--                                <li class="unview"><div class="lectures_lists_title"><i class="fa fa-lock dios lock"></i></div>اجرای پریمیر و ایجاد اولین پروژه در پریمیر<span class="cls_timing">25:05</span></li>--}}
                                {{--                                <li class="unview"><div class="lectures_lists_title"><i class="fa fa-lock dios lock"></i></div>آشنایی با فضای نرم افزار پریمیر و درک Workspace<span class="cls_timing">18:10</span></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                @php
                    $count =$count+1;
                @endphp
            @endforeach

        </div>
    </div>
</div>

