<?php

namespace Heydari81\Category\Repositories;

use Heydari81\Category\Models\Category;

class CategoryRepo
{
    public function all()
    {
     return Category::all();
    }

    public function store($value)
    {
        $Category = new Category();
        $Category->name = $value->title;
        $Category->slug = $value->slug;
        $Category->parent_id = $value->parent_id;
        $Category->type = $value->type;
        $Category->save();
        return $Category;
    }

    public function findById($id)
    {
        return Category::findOrfail($id);
    }

    public function allExceptById($id)
    {
        return $this->all()->filter(function ($Item) use ($id){
            return $Item->id != $id;
        });

    }

    public function update($request,$id)
    {
        $category = $this->findById($id);
        $category->name = $request->title;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->type = $request->type;
        $category->save();
        return $category;

    }

    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

}
