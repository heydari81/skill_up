<?php

namespace Heydari81\Category\Models;

use Heydari81\Course\Models\Course;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];

    public function getParentAttribute()
    {
        return (is_null($this->parent_id)) ? "ندارد" : $this->parentCategory->name;
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }
    public function subCategories (){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class,'category_id');
    }
}
