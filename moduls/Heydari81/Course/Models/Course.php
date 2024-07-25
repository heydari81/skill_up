<?php

namespace Heydari81\Course\Models;

use Heydari81\Category\Models\Category;
use Heydari81\Media\Models\Media;
use Heydari81\Payment\Models\Payment;
use Heydari81\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
protected $guarded=[];

    public function getThumbAttribute()
    {
        return '/storage/'.$this->media->files['300'];
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function media()
    {
        return $this->belongsTo(Media::class,'media_id');
    }

    public function teacher()
    {
       return $this->belongsTo(User::class,'teacher_id');
    }
    public function students()
    {
        return $this->belongsToMany(User::class,'course_student','course_id','user_id');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function path()
    {
        return route('single_course',$this->id.'-'.$this->slug);
    }

    public function payment()
    {
        return $this->morphMany(Payment::class,"paymentable");
    }
}
