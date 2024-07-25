<?php

namespace Heydari81\Course\Models;

use Heydari81\Media\Models\Media;
use Heydari81\Media\Services\MediaFileService;
use Heydari81\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Lesson extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(course::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function season()
    {

        if($this->belongsTo(Season::class)){
            return $this->belongsTo(Season::class);
        }
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function path()
    {
        return $this->course->path().'?lesson=L-'.$this->id.'-'.$this->title;
    }

    public function downloadLink()
    {
        return URL::temporarySignedRoute('media.download',now()->addHour(),['media'=>$this->media_id]);
    }
    public function checkFreeLesson()
    {
        if ($this->free == 1){
            return true;
        }else{
            return false;
        }
    }
    public function checkLock()
    {
        if ($this->status == "unlock"){
            return true;
        }else{
            return false;
        }
    }

}
