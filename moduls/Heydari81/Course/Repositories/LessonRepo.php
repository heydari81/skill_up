<?php

namespace Heydari81\Course\Repositories;

use Heydari81\Course\Models\course;
use Heydari81\Course\Models\Lesson;
use Illuminate\Support\Str;

class LessonRepo
{
    public function store($value,$id)
    {
        $Lesson = new Lesson();
        $Lesson->title = $value->title;
        $Lesson->priority = $value->priority;
        //$Lesson->slug = Str::slug($value->slug);
        $Lesson->status = $value->status;
        $Lesson->free = $value->free;
        $Lesson->body = $value->body;
        $Lesson->user_id = auth()->id();
        $Lesson->season_id = $value->season_id;
        $Lesson->course_id = $id;
        $Lesson->media_id = $value->media_id;
        $Lesson->save();
        return $Lesson;
}

    public function paginate($number)
    {
        return course::paginate($number);
    }
    public function findById($id)
    {
        return Lesson::findOrfail($id);
    }
    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

    public function update($value,$id)
    {
        $Lesson = $this->findById($id);
        $Lesson->title = $value->title;
        $Lesson->priority = $value->priority;
        //$Lesson->slug = Str::slug($value->slug);
        $Lesson->status = $value->status;
        $Lesson->free = $value->free;
        $Lesson->body = $value->body;
        $Lesson->user_id = auth()->id();
        $Lesson->season_id = $value->season_id;
        $Lesson->course_id = $Lesson->course->id;
        $Lesson->media_id = $value->media_id;
        $Lesson->save();
        return $Lesson;
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

    public function getFirstLesson(int $course_Id)
    {
        return Lesson::where('course_id',$course_Id)
            ->orderby('priority','asc')->first();
    }

    public function getLesson($course_Id,$lessonId)
    {
        //dd($lessonId);
        return Lesson::where('course_id',$course_Id)->where('id',$lessonId)->first();
    }


}
