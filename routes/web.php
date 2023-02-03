<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\likethreadController;
use App\Http\Controllers\DislikethreadController;
use App\Http\Controllers\LikeCommentController;
use App\Http\Controllers\DislikeCommentController;
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

Route::get('/about',function (){
    return view('about.index');
});


Route::get('/ContactUs',function (){
    return view('ContactUs.index');
});

Route::get('/404',function (){
    return view('404.index');
});

// Route::get('/editThread',function (){
//     return view('edit.index');
// });





Route::get("/", [ThreadController::class, 'index']);


Route::resource("/thread", ThreadController::class);
Route::resource("/thread/comments", CommentController::class);
Route::resource("/profile", UserProfileController::class);
Route::resource("/like", likethreadController::class);
Auth::routes();



 Route::get('edit/{id}', [ThreadController::class, 'edit']);
 Route::get('update-data/{id}', [ThreadController::class, 'update']);
 Route::get('/', [ThreadController::class, 'searchThread']);
 Route::post('/', [likethreadController::class, 'likeThread']);
 Route::post('/dislike', [DislikethreadController::class, 'Dislikethread']);
 Route::post('/likecomments', [LikeCommentController::class, 'LikeComment']);
 Route::post('/dislikecomments', [DislikeCommentController::class, 'dislikeComment']);