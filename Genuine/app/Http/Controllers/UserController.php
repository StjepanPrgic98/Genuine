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
}
