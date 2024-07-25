<?php

namespace Heydari81\Course\Repositories;

use Heydari81\Course\Models\course;
use Heydari81\Course\Models\Season;
use Illuminate\Support\Str;

class SeasonRepo
{
    public function store($value,$course_id)
    {
        $Season = new Season();
        $Season->title = $value->title;
        $Season->priority = $value->priority;
        $Season->user_id = auth()->user()->id;
        $Season->course_id = $course_id;
        $Season->save();
        return $Season;
}

    public function paginate($number)
    {
        return Season::paginate($number);
    }
    public function findById($id)
    {
        return Season::findOrfail($id);
    }
    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

    public function update($value,$id)
    {
        $Season = $this->findById($id);
        $Season->title = $value->title;
        $Season->priority = $value->priority;
        $Season->user_id = auth()->user()->id;
        $Season->save();
        return $Season;
    }

    public function updateConfirmStatus($id)
    {
        $course = $this->findById($id);
        $statuses = ['accept','pending','regect'];
        if ($course->confirmation_status == $statuses[1] || $course->confirmation_status == $statuses[2]){
            $course->confirmation_status = $statuses[0];
        }
        else{
            $course->confirmation_status = $statuses[2];
        }
        $course->save();
        return $course;
    }

}
