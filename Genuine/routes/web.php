<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get("/profiles", "App\Http\Controllers\UserController@index");
    Route::get("/profiles/{user}", "App\Http\Controllers\UserController@showSelected");
    Route::get("/profile/search", "App\Http\Controllers\UserController@Search");
    Route::post("/profile/filter", "App\Http\Controllers\UserController@Filter");
    Route::get("/makeAdmin/{userId}", "App\Http\Controllers\UserController@MakeAdmin");
    Route::get("/removeAdmin/{userId}", "App\Http\Controllers\UserController@RemoveAdmin");
    Route::get("/deleteProfile/{userId}", "App\Http\Controllers\UserController@DeleteProfile");
    Route::get("/messages/{userId}", "App\Http\Controllers\MessegesController@index");
    Route::post("/sendMessege", "App\Http\Controllers\MessegesController@SendMessege");
    Route::post("/expertReview/submit", "App\Http\Controllers\ExpertProfileController@SubmitForExpertReview");
    Route::get("/expertReview/profiles", "App\Http\Controllers\ExpertProfileController@ViewProfiles");
    Route::post("/expertReview/sendReview", "App\Http\Controllers\ExpertProfileController@SendReview");
    Route::get("/expertReview/getReview/{userId}", "App\Http\Controllers\ExpertProfileController@GetReview");
});

require __DIR__.'/auth.php';
