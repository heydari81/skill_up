<?php

namespace Heydari81\User\Repositories;

use Heydari81\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepo
{
    public function all()
    {
        return User::all();
    }

    public function getTeachers()
    {
        return User::Role('teacher')->get();
    }

    public function paginate()
    {
        return User::paginate(2);
    }

    public function findById($id)
    {
        return User::findOrfail($id);
    }

    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

    public function store($value)
    {
        $user = new User();
        $user->name = $value->name;
        $user->email = $value->email;
        $user->username = $value->username;
        $user->headline = $value->headline;
        $user->bio = $value->bio;
        $user->status = $value->status;
        $user->media_id = $value->media_id;
        $user->password = Hash::make($value->password);
        $user->assignRole($value->role);
        $user->save();
        return $user;
    }

    public function update($value, $id)
    {
        $user = $this->findById($id);
        if (!is_null($value->name)){
            $user->name = $value->name;
        }
        if (!is_null($value->username)){
            $user->username = $value->username;
        }
        if (!is_null($value->headline)){
            $user->headline = $value->headline;
        }
        if (!is_null($value->mobile)){
            $user->mobile = $value->mobile;
        }
        if (!is_null($value->bio)){
            $user->bio = $value->bio;
        }
        if (!is_null($value->status)){
            $user->status = $value->status;
        }
        $user->media_id = $value->media_id;
        $user->password = Hash::make($value->password);
        $user->save();
        if (!is_null($value->role)){
            $user->syncRoles($value->role);
        }
        return $user;
    }

}
