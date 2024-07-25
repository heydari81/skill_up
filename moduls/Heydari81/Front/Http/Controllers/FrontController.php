<?php
namespace Heydari81\Front\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Heydari81\Category\Models\Category;
use Heydari81\Course\Models\course;
use Heydari81\Course\Models\Lesson;
use Heydari81\Course\Models\Season;
use Heydari81\Course\Repositories\CourseRepo;
use Heydari81\Course\Repositories\LessonRepo;
use Heydari81\Front\Services\CourseService;
use Heydari81\User\Repositories\UserRepo;
use Illuminate\Support\Str;


class FrontController extends Controller
{
    public $courseRepo;
    public $lessonRepo;

    public function __construct(CourseRepo $courseRepo,LessonRepo $lessonRepo)
    {
        if (auth()->check()){
            if (!auth()->user()->hasVerifiedEmail()){
                return view('User::Front.auth.verify-email');
            }
        }

        $this->courseRepo = $courseRepo;
        $this->lessonRepo = $lessonRepo;
    }

    public function index()
    {
        $courses = $this->courseRepo->getAmazingCourse();
        $teachers = resolve(UserRepo::class)->getTeachers();
        return view('Front::index',compact('courses','teachers'));
    }
    public function all_course()
    {
        $courses = course::query()->orderBy('priority','asc')->get();
        $categories = Category::all();
        $teachers = resolve(UserRepo::class)->getTeachers();
        return view('Front::all_course',compact('courses','categories','teachers'));
    }
    public function single_course($slug)
    {
        $course_Id = $this->extractId($slug,'c');
        $course = $this->courseRepo->findById($course_Id);
        $lessons = Lesson::query()->where('course_id',$course_Id)->orderBy('priority','asc')->get();
        $seasons = Season::query()->where('course_id',$course_Id)->orderBy('priority','asc')->get();
        if (request()->lesson){
            $current_lesson = $this->lessonRepo->getLesson($course_Id,$this->extractId(request()->lesson,'L'));
        }else{
            $current_lesson = $this->lessonRepo->getFirstLesson($course_Id);
        }
        return view('Front::single_course',compact('course','lessons','seasons','current_lesson'));
    }

    public function extractId($slug,$key)
    {
        return Str::before(Str::after($slug,$key.'-'),'-');
    }

}
