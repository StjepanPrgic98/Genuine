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
}
