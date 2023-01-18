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

        $reviewRequest = new ExpertReviewRequest();
        $reviewRequest->sender_id = $data["sender_id"];
        $reviewRequest->receiver_id = 1;
        $reviewRequest->save();
        $user = User::find(request()->sender_id);
        $user->submitedForReview = true;
        $user->save();
        return view("selectedprofile")->with("user", $user);


    }
    public function ViewProfiles()
    {
        return view("browseprofiles")->with("users", User::all());
    }

    public function SendReview()
    {
        $data = request()->all();
        $sendReview = new ExpertReviewRequest();
        $sendReview->sender_id = $data["sender_id"];
        $sendReview->receiver_id = $data["receiver_id"];
        $sendReview->info = $data["info"];
        $sendReview->save();

        $user = User::find($data["receiver_id"]);
        $user->submitedForReview = null;
        $user->save();


        return view("browseprofiles")->with("users", User::all());
    }
    public function GetReview($userId)
    {
        $one = 1;
        $user = User::find($userId);
        $review = DB::table("expert_review_requests")->select("info", "receiver_id", "created_at")->where("receiver_id", $userId)->get();
        $reviewer = User::where("isExpert", "LIKE", "%{$one}%")->get();

        $validUser = false;

        foreach ($review as $key => $r) 
        {
            if($r->receiver_id == $userId)
            {
                $validUser = true;
                break;
            }
            else
            {
                $validUser = false;         
            }
        }
        return view("userReview")->with("userReviews", $review)->with("user", $user)->with("reviewer", $reviewer)->with("validUser", $validUser);  

             
    }

}
