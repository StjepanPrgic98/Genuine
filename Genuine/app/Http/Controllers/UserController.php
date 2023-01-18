<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\messeges;
use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

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
    public function Filter()
    {
        $userId=array();
        $data = request()->all();
        
        //Validating sex
        if($data["sex"] == "null")
        {
            $sex = array("Male", "Female", "Other");
        }
        else
        {
            $sex = array($data["sex"]);       
        }
        //Validating gender
        if($data["age"] == "null")
        {
            $age = array();
            for ($i=18; $i < 51; $i++) { 
                array_push($age, $i);   
            }
        }
        else
        {
            $age = array($data["age"]);
        }
        //Validating relationship status
        if($data["relationship_status"] == "null")
        {
            $relationship_status = array("Single", "Married", "In relationship", "Complicated");
        }
        else
        {
            $relationship_status = array($data["relationship_status"]);
        }
        //Validating interested in
        if($data["interested_in"] == "null")
        {
            $interested_in = array("Men", "Women", "Other");
        }
        else
        {
            $interested_in = array($data["interested_in"]);
        }


        
        
        $users = DB::table("users")->select("id")
        ->whereIn("sex", $sex)
        ->whereIn("age", $age)
        ->whereIn("relationship_status", $relationship_status)
        ->whereIn("interested_in", $interested_in)
        ->get();


        foreach ($users as $u) {
            array_push($userId, $u->id);       
        }
        $user = User::find($userId);
        return view("browseprofiles")->with("users", $user);    

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
