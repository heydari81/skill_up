<?php

namespace Heydari81\Course\Repositories;

use Heydari81\Course\Models\Course;
use Illuminate\Support\Str;

class CourseRepo
{
    public function store($value)
    {
        if ($value->price == 0 || is_null($value->price)){
            $type = "free";
        }else{
            $type = "cash";
        }
        $Course = new Course();
        $Course->name = $value->name;
        $Course->priority = $value->priority;
        $Course->slug = Str::slug($value->slug);
        $Course->category_id = $value->category_id;
        $Course->teacher_id = $value->teacher_id;
        $Course->price = $value->price;
        $Course->percent = $value->percent;
        $Course->status = $value->status;
        $Course->short_body = $value->short_body;
        $Course->body = $value->body;
        $Course->type = $type;
        $Course->media_id = $value->media_id;
        $Course->save();
        return $Course;
}

    public function paginate($number)
    {
        return Course::paginate($number);
    }
    public function findById($id)
    {
        return Course::findOrfail($id);
    }
    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

    public function update($value,$id)
    {
        $Course = $this->findById($id);
        $Course->name = $value->name;
        $Course->priority = $value->priority;
        $Course->slug = Str::slug($value->slug);
        $Course->category_id = $value->category_id;
        $Course->teacher_id = $value->teacher_id;
        $Course->price = $value->price;
        if (!is_null($value->percent)){
            $Course->percent = $value->percent;
        }
        $Course->status = $value->status;
        $Course->short_body = $value->short_body;
        $Course->body = $value->body;
        if ($value->price == 0){
            $Course->type = "free";
        }else{
            $Course->type = "cash";
        }
        $Course->media_id = $value->media_id;
        $Course->save();
        return $Course;
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
    public function updateLock($id)
    {
        $course = $this->findById($id);
        $statuses = ['lock','not-completed','completed'];
        if ($course->status == $statuses[0] ){
            $course->status = $statuses[1];
        }
        else{
            $course->status = $statuses[0];
        }
        $course->save();
        return $course;
    }

    public function addStudentToCourse(course $course, $userId)
    {
        if(!$this->getCourseStudentById($course,$userId)){
            $course->students()->attach($userId);
        }
    }

    public function getCourseStudentById(course $course, $userId)
    {
        return $course->students()->where("id",$userId)->first();
    }

    public function getCouresByTeacherId($userId)
    {
        return Course::where("teacher_id",$userId)->get();

    }
    public static function getAmazingCourse()
    {
        $courses = Course::query()->orderBy('priority','asc')->take(8)->get();
        return $courses;
    }
    public static function course_search($search)
    {
        $category_id = $search->category_id;
        $teacher_id = $search->teacher_id;
        $status = $search->status;
        $type = $search->type;
        $courses = Course::paginate(10);
        if ($category_id != null){
            $courses = $courses->where('category_id',$search->category_id);
        }
        if ($teacher_id != null){
            $courses = $courses->Where('teacher_id',$search->teacher_id);
        }
        if ($status != null){
            $courses = $courses->where('status',$search->status);
        }
        if ($type != null){
            $courses = $courses->where('type',$search->type);
        }
        return $courses;
    }
}
