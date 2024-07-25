<?php

namespace Heydari81\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Heydari81\Course\Models\course;
use Heydari81\Course\Models\Lesson;
use Heydari81\Course\Models\Season;
use Heydari81\Media\Models\Media;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable //implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'username',
        'headline',
        'bio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function getThumbAttribute()
    {
        if ($this->media != null) {
            return '/storage/' . $this->media->files['300'];
        } else {
            return 'nothing';
        }
    }

    public static $defaultUsers = [
        [
            'name' => 'admin',
            'email' => 'admin1200@gmail.com',
            'password' => 'admin',
            'role' => 'super_admin'
        ],
    ];

    public function hasAccesstoDashboard()
    {
        if ($this->hasRole('manager') || $this->hasRole('super_admin')){
            return true;
        }else{
            return false;
        }
    }

    public function hasAccessToCourse(course $course)
    {
        if ($this->hasRole('manager') || $this->id == $course->teacher_id) {
            return true;
        } else if ($course->students->contains($this->id)) {
            return true;
        } else if ($this->hasRole('super_admin')) {
            return true;
        } else {
            return false;
        }
    }


    public function purchases()
    {
        return $this->belongsToMany(course::class, 'course_student', 'user_id', 'course_id');
    }
}
