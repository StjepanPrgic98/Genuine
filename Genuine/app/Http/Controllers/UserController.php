<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view("browseprofiles")->with("users", User::all());
    }
    public function showSelected($userId)
    {
        $user = User::find($userId);
        return view("selectedprofile")->with("user", $user);
    }
    public function Search()
    {
        $search = request()->search;

        if($search == null)
        {
            return view("browseprofiles")->with("users", User::all());
        }
        else
        {
            $user = User::where("name", "LIKE", "%{$search}%")->get();     
            return view("browseprofiles")->with("users", $user);           
        }

    }
    public function DeleteProfile($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return view("browseprofiles")->with("users", User::all());
    }
    public function MakeAdmin($userId)
    {
        $user = User::find($userId);
        $user->isAdmin = true;
        $user->save();
        return view("selectedprofile")->with("user", $user);
    }
    public function RemoveAdmin($userId)
    {
        $user = User::find($userId);
        $user->isAdmin = false;
        $user->save();
        return view("selectedprofile")->with("user", $user);
    }
    
}
