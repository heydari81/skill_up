<?php

namespace Heydari81\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Heydari81\Category\Repositories\CategoryRepo;
use Heydari81\Common\Responses\AjaxResponses;
use Heydari81\Course\Http\Requests\LessonStoreRequest;
use Heydari81\Course\Models\course;
use Heydari81\Course\Models\Lesson;
use Heydari81\Course\Repositories\CourseRepo;
use Heydari81\Course\Repositories\LessonRepo;
use Heydari81\Media\Services\MediaFileService;
use Heydari81\User\Repositories\UserRepo;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public $categoryRepo;
    public $userRepo;
    public $courseRepo;
    public $lessonRepo;

    public function __construct(UserRepo $userRepo, CategoryRepo $categoryRepo, CourseRepo $courseRepo, LessonRepo $lessonRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->userRepo = $userRepo;
        $this->courseRepo = $courseRepo;
        $this->lessonRepo = $lessonRepo;
    }
//    public function index()
//    {
//        $this->authorize('index_policy',Lesson::class);
//        $number=10;
//        $courses = $this->courseRepo->paginate($number);
//        $categories = $this->categoryRepo->all();
//        $teachers = $this->userRepo->getTeachers();
//        return view('course::index',compact('courses','categories','teachers'));
//    }

    public function store(LessonStoreRequest $request, $id)
    {
        $this->authorize('store_policy', Lesson::class);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            $course = $this->courseRepo->findById($id);
            if($course->teacher_id != auth()->id()){
                return "no";
            }
        }
        $request->request->add(['media_id' => MediaFileService::privateUpload($request->file('media'))->id]);
        $this->lessonRepo->store($request, $id);
        return back();
    }

    public function edit($id)
    {
        $this->authorize('edit_policy', Lesson::class);
        $lesson = $this->lessonRepo->findById($id);
        $course = $lesson->course;
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            if($course->teacher_id != auth()->id()){
                return "no";
            }
        }
        $categories = $this->categoryRepo->all();
        $seasons = $course->seasons;
        return view('course::edit_lesson',
            compact('lesson','categories','seasons'));
    }

    public function details($id)
    {
        $categories = $this->categoryRepo->all();
        $teachers = $this->userRepo->getTeachers();
        $course = $this->courseRepo->findById($id);
        $seasons = $course->seasons;
        return view('course::details',
            compact('course', 'seasons', 'teachers', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // to do
        $lesson = $this->lessonRepo->findById($id);
        if ($request->hasFile('media')) {
            $request->request->add(['media_id' => MediaFileService::privateUpload($request->file('media'))->id]);
            $lesson->media->delete();
            $this->lessonRepo->update($request, $id);
        } else {
            $request->request->add(['media_id' => $lesson->media_id]);
            $this->lessonRepo->update($request, $id);
        }
        return redirect()->back();

    }

    public function destroy($id)
    {
        $this->authorize('delete_policy', Lesson::class);
        $lesson = $this->lessonRepo->findById($id);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            if($lesson->course->teacher_id != auth()->id()){
                return "no";
            }
        }
        if ($lesson->media) {
            $lesson->media->delete();
        }
        $lesson->delete();
        //$this->courseRepo->delete($id);
        return AjaxResponses::successResponse();
    }

    public function updateConfirmStatus($id)
    {
        $this->authorize('updateConfirmStatus_policy', Lesson::class);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            $lesson = $this->lessonRepo->findById($id);
            if($lesson->course->teacher_id != auth()->id()){
                return "no";
            }
        }
        $this->courseRepo->updateConfirmStatus($id);
        return AjaxResponses::successResponse();

    }
}
