<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Middleware\CheckResponseForModifications;
use Illuminate\Http\Request;
use App\Models\ExpertReviewRequest;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\messeges;
use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;
class ExpertProfileController extends Controller
{
    public function SubmitForExpertReview()
    {


        $data = request()->all();
        $checkForValidUser = DB::table("expert_review_requests")->select("sender_id")->where("sender_id", $data["sender_id"])->get();

        if($checkForValidUser->count() < 1)
        {
            $reviewRequest = new ExpertReviewRequest();
            $reviewRequest->sender_id = $data["sender_id"];
            $reviewRequest->save();
            $user = User::find(request()->sender_id);
            $user->submitedForReview = true;
            $user->save();
            return view("selectedprofile")->with("user", $user);
        }
        else
        {
            $user = User::find(request()->sender_id);
            return view("selectedprofile")->with("user", $user);
        }
        


    

    
    }
    public function ViewProfiles()
    {
        return view("browseprofiles")->with("users", User::all());
    }
    
}
