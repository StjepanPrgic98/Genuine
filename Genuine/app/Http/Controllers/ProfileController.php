<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $image = $request->image->store("user_images", "public");
        $request->user()->image = $image;
        $request->user()->sex = $request["sex"];
        $request->user()->age = $request["age"];
        $request->user()->description = $request["description"];
        $request->user()->relationship_status = $request["relationship_status"];
        $request->user()->facebook = $request["facebook"];
        $request->user()->instagram = $request["instagram"];
        $request->user()->twitter = $request["twitter"];
        $request->user()->current_city = $request["current_city"];
        $request->user()->hometown = $request["hometown"];
        $request->user()->interested_in = $request["interested_in"];
        $request->user()->favorite_question = $request["favorite_question"];
        $request->user()->job = $request["job"];
        $request->user()->isAdmin == false;
        $request->user()->isSuperAdmin == false;
        $request->user()->isExpert == false;
        $request->user()->submitedForReview == false;

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
