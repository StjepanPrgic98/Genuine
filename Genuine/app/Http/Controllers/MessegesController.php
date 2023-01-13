<?php

namespace App\Http\Controllers;

use App\Models\messeges;
use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class MessegesController extends Controller
{
    public function index($userId)
    {
        $user = User::find($userId);
        $logedUser = Auth::user()->id;
        $sentMesseges = DB::table('messeges')->select("messege", "created_at")->where("receiver_id", $userId)->where("sender_id", $logedUser)->get();
        $receivedMesseges = DB::table("messeges")->select("messege", "created_at")->where("sender_id", $userId)->where("receiver_id", $logedUser)->get();
        return view("messeges")->with("user", $user)->with("sentMesseges",$sentMesseges)->with("receivedMesseges", $receivedMesseges);
    }
    public function SendMessege()
    {
        $data = request()->all();
        $messege = new messeges();
        $messege->sender_id = $data["sender_id"];
        $messege->receiver_id = $data["receiver_id"];
        $messege->messege = $data["messege"];

        $messege->save();

        $userId = $data["receiver_id"];
        $user = User::find(request()->receiver_id);
        $logedUser = Auth::user()->id;
        $sentMesseges = DB::table('messeges')->select("messege", "created_at")->where("receiver_id", $userId)->where("sender_id", $logedUser)->get();
        $receivedMesseges = DB::table("messeges")->select("messege", "created_at")->where("sender_id", $userId)->where("receiver_id", $logedUser)->get();
        return view("messeges")->with("user", $user)->with("sentMesseges",$sentMesseges)->with("receivedMesseges", $receivedMesseges);
    }
}
