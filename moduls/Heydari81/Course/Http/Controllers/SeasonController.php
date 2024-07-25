<?php

namespace Heydari81\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Heydari81\Common\Responses\AjaxResponses;
use Heydari81\Course\Http\Requests\SeasonStoreRequest;
use Heydari81\Course\Http\Requests\SeasonUpdateRequest;
use Heydari81\Course\Models\Season;
use Heydari81\Course\Repositories\CourseRepo;
use Heydari81\Course\Repositories\SeasonRepo;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public $seasonRepo;
    public function __construct(SeasonRepo $seasonRepo)
    {
        $this->seasonRepo = $seasonRepo;
    }
    public function store(SeasonStoreRequest $request,$course_id)
    {
        $this->authorize('store_policy', Season::class);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            $course = resolve(CourseRepo::class)->findById($course_id);
            if ($course->teacher_id != auth()->id()){
                return "no";
            }
        }
        $this->seasonRepo->store($request,$course_id);
        return back();
    }

    public function edit($id)
    {
        $this->authorize('edit_policy', Season::class);
        $season = $this->seasonRepo->findById($id);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            if ($season->course->teacher_id != auth()->id()){
                return "no";
            }
        }
        return view('course::edit_season',
            compact('id','season'));
    }

    public function update(SeasonUpdateRequest $request,$id)
    {
        $this->authorize('update_policy', Season::class);
        $season = $this->seasonRepo->findById($id);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            if ($season->course->teacher_id != auth()->id()){
                return "no";
            }
        }
        $this->seasonRepo->update($request,$id);
        return back();

    }
    public function destroy($id)
    {
        $this->authorize('delete_policy', Season::class);
        $season = $this->seasonRepo->findById($id);
        if (auth()->user()->hasRole('teacher') && !auth()->user()->hasRole('manager') && !auth()->user()->hasRole('super_admin')) {
            if ($season->course->teacher_id != auth()->id()){
                return "no";
            }
        }
        $this->seasonRepo->findById($id)->delete();
        return AjaxResponses::successResponse();
    }
}
