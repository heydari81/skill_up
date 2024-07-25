<?php

namespace Heydari81\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Heydari81\Common\Responses\AjaxResponses;
use Heydari81\Course\Models\Course;
use Heydari81\Course\Repositories\CourseRepo;
use Heydari81\Media\Services\MediaFileService;
use Heydari81\User\Models\User;
use Heydari81\User\Repositories\UserRepo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $userRepo;
public function __construct(UserRepo $userRepo)
{
    $this->userRepo = $userRepo;
}

    public function index()
    {
        $users = $this->userRepo->all();
        $roles = Role::all()->where('name','!=','super_admin');
        return view('User::Back.index',compact('users','roles'));
}
    public function store(Request $request)
    {
        $request->request->add(['media_id' => MediaFileService::publicUpload($request->file('image'))->id]);
        $this->userRepo->store($request);
        return back();
    }
    public function edit($id)
    {
        $user = $this->userRepo->findById($id);
        $roles = Role::all()->where('name','!=','super_admin');
        return view('User::Back.edit',
            compact('user','roles'));
    }

    public function update(Request $request,$id)
    {
        $user = $this->userRepo->findById($id);
        if (auth()->id() != $id && auth()->user()->hasRole('super_admin') && auth()->user()->hasRole('manager')){
            return redirect(route('home'));
        }
        if ($request->hasFile('image')){
            $request->request->add(['media_id'=>MediaFileService::publicUpload($request->file('image'))->id]);
            if ($user->media){
                $user->media->delete();
            }
            $this->userRepo->update($request,$id);
        }else{
            $request->request->add(['media_id'=>$user->media_id]);
            $this->userRepo->update($request,$id);
        }
        return redirect()->back();

    }

    public function destroy($id)
    {
        $user =$this->userRepo->findById($id);
        if ($user->media){
            $user->media->delete();
        }
        //$this->courseRepo->delete($id);
        return AjaxResponses::successResponse();
    }

    public function updateConfirmStatus($id)
    {
//        $this->courseRepo->updateConfirmStatus($id);
//        return AjaxResponses::successResponse();

    }

    public function user_front($id)
    {
        $user = $this->userRepo->findById($id);
        if (auth()->id() != $id){
            return redirect()->back();
        }
        return view('User::Front.auth.edit',
            compact('user'));
    }
    public function addstudent_view()
    {
        $this->authorize('updateConfirm_policy', course::class);
        $courses = Course::all();
        $users = User::all();
        return view('User::Back.addstudent',compact('users','courses'));
    }

    public function addstudent_post(Request $request)
    {
        $this->authorize('updateConfirm_policy', course::class);
        $courses = Course::all();
        $users = User::all();
        $courseRepo = new CourseRepo();
        $course = $courseRepo->findById($request->course_id);
        $courseRepo->addStudentToCourse($course,$request->user_id);
        return view('User::Back.addstudent',compact('users','courses'));
    }
}
