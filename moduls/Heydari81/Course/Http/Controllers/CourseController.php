<?php

namespace Heydari81\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Heydari81\Course\Http\Requests\CourseStoreRequest;
use Heydari81\Course\Http\Requests\CourseUpdateRequest;
use Heydari81\Category\Repositories\CategoryRepo;
use Heydari81\Common\Responses\AjaxResponses;
use Heydari81\Course\Models\course;
use Heydari81\Course\Models\Lesson;
use Heydari81\Course\Repositories\CourseRepo;
use Heydari81\Course\Repositories\SeasonRepo;
use Heydari81\Media\Services\MediaFileService;
use Heydari81\Payment\Gateways\Gateway;
use Heydari81\Payment\Services\PaymentService;
use Heydari81\Peyment\Repositories\PaymentRepo;
use Heydari81\User\Models\User;
use Heydari81\User\Repositories\UserRepo;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public $categoryRepo;
    public $userRepo;
    public $courseRepo;
    public $seasonRepo;

    public function __construct(UserRepo $userRepo, CategoryRepo $categoryRepo, CourseRepo $courseRepo, SeasonRepo $seasonRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->userRepo = $userRepo;
        $this->courseRepo = $courseRepo;
        $this->seasonRepo = $seasonRepo;
    }

    public function index()
    {
        $this->authorize('index_policy', course::class);
        $filtered = 0;
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            $courses = $this->courseRepo->getCouresByTeacherId(auth()->id());
            $teachers = auth()->user();
            $filtered = 1;
        } else {
            $courses = $this->courseRepo->paginate(10);
            $teachers = $this->userRepo->getTeachers();
        }
        $categories = $this->categoryRepo->all();
        if ($courses->count() == 0) {
            $filtered = 1;
        }

        return view('course::index', compact('courses', 'categories', 'teachers','filtered'));
    }

    public function store(CourseStoreRequest $request)
    {
        $this->authorize('store_policy', course::class);
        $request->request->add(['media_id' => MediaFileService::publicUpload($request->file('image'))->id]);
        $this->courseRepo->store($request);
        return back();
    }

    public function edit($id)
    {
        $this->authorize('edit_policy', course::class);
        $categories = $this->categoryRepo->all();
        $teachers = $this->userRepo->getTeachers();
        $course = $this->courseRepo->findById($id);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            $teachers = auth()->user();
            if ($course->teacher_id == auth()->id()) {
                $course = $this->courseRepo->findById($id);
            } else {
                return "no you are a teacher not manager";
            }
        }
        return view('course::edit',
            compact('course', 'teachers', 'categories'));
    }

    public function details($id)
    {
        $this->authorize('details_policy', course::class);
        $course = $this->courseRepo->findById($id);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            if ($course->teacher_id != auth()->id()){
                return "no";
            }
        }
        $categories = $this->categoryRepo->all();
        $teachers = $this->userRepo->getTeachers();
        $seasons = $course->seasons;
        return view('course::details',
            compact('course', 'seasons', 'teachers', 'categories'));
    }

    public function update(CourseUpdateRequest $request, $id)
    {
        $this->authorize('update_policy', course::class);
        $course = $this->courseRepo->findById($id);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            if ($course->teacher_id != auth()->id()){
                return "no";
            }
        }
        if ($request->hasFile('image')) {
            $request->request->add(['media_id' => MediaFileService::publicUpload($request->file('image'))->id]);
            $course->media->delete();
            $this->courseRepo->update($request, $id);
        } else {
            $request->request->add(['media_id' => $course->media_id]);
            $this->courseRepo->update($request, $id);
        }
        return redirect(route('courses.index'));

    }

    public function destroy($id)
    {
        $this->authorize('delete_policy', course::class);
        $course = $this->courseRepo->findById($id);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            if ($course->teacher_id != auth()->id()){
                return "no";
            }
        }
        if ($course->media) {
            $course->media->delete();
        }
        //$this->courseRepo->delete($id);
        return AjaxResponses::successResponse();
    }

    public function updateConfirmStatus($id)
    {
        $this->authorize('updateConfirm_policy', course::class);
        $this->courseRepo->updateConfirmStatus($id);
        return AjaxResponses::successResponse();

    }
    public function updateLock($id)
    {
        $this->authorize('edit_policy', course::class);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            $course = $this->courseRepo->findById($id);
            if ($course->teacher_id != auth()->id()){
                return "no";
            }
        }
        $this->courseRepo->updateLock($id);
        return AjaxResponses::successResponse();

    }

    public function lesson_index($id)
    {
        $course = $this->courseRepo->findById($id);
        $this->authorize('lesson_index_policy', course::class);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
         if($course->teacher_id != auth()->id()){
             return "no";
         }
        }
        $seasons = $course->seasons;
        $lessons = Lesson::all()->where('course_id', $id);
        return view('course::lesson_index', compact('course', 'seasons', 'lessons'));
    }

    public function buy($courseId)
    {
        $course = $this->courseRepo->findById($courseId);
        if (!$this->courseCanBePurchased($course)) {
            return 'ناموفق';
        }
        if (!$this->authUserCanPurchaseCourse($course)) {
            return 'ناموفق';
        }
        $payment = PaymentService::generate($course, auth()->user()->id);
        resolve(Gateway::class)->redirect($payment->invoice_id);
        return back();
    }

    private function courseCanBePurchased(course $course)
    {
        if ($course->type == 'free') {
            return false;
        }
        return true;
    }

    private function authUserCanPurchaseCourse(course $course)
    {
        if (auth()->id() == $course->teacher_id) {
            return false;
        }
        if (auth()->user()->hasAccessToCourse($course)) {
            return false;
        }
        return true;
    }
    public function filtered_course(Request $request){
        $this->authorize('updateConfirm_policy', course::class);
        $teachers = $this->userRepo->getTeachers();
        $categories = $this->categoryRepo->all();
        $courses = $this->courseRepo->course_search($request);
        $filtered = 1;
        return view('course::index', compact('courses', 'categories', 'teachers','filtered'));
    }


}

