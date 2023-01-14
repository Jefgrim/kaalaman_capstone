<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;

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

// Route::get('/', function () {
//     return view('threads.index');
// });

Route::get('/faq', function () {
    return view('faq.index');
});

Route::get('/rules', function () {
    return view('forumRules.index');
});

Route::get('/privacy-policy', function () {
    return view('privacy.index');
});

Route::get('/terms-condition', function () {
    return view('terms.index');
});

Route::get('/messages', function () {
    return view('threads.index');
});
Route::get('/account',function (){
    return view('accountProfile.index');
});

Route::get('/vision',function (){
    return view('vision.index');
});

Route::get('/mission',function (){
    return view('mission.index');
});


Route::get('/contactUs',function (){
    return view('Contact Us.index');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post("/", [ThreadController::class, 'store']);
Route::get("/", [ThreadController::class, 'index']);