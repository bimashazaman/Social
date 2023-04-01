<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();

//loginPost
Route::post('/loginpost', [App\Http\Controllers\Auth\LoginController::class, 'loginPost'])->name('login.post');


//Google
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
//Facebook
Route::get('/login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);
//Github
Route::get('/login/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('/login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);



// middleware
Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [PostController::class, 'index']);
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


    //comments
    Route::get('/comments/{post_id}', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/comments/store/{post_id}', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

    //likes
    Route::post('/like/{post_id}', [App\Http\Controllers\LikesController::class, 'like'])->name('posts.likes');
    Route::post('/unlike/{post_id}', [App\Http\Controllers\LikesController::class, 'unlike'])->name('posts.unlike');

    //profile
    Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{id}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profiles.edit');

    //update user
    Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');



    Route::post('/add-friend/{id}', [FriendController::class, 'addFriend'])->name('add-friend');
    Route::post('/accept-friend/{id}', [FriendController::class, 'acceptFriend'])->name('accept-friend');
    Route::post('/remove-friend/{id}', [FriendController::class, 'removeFriend'])->name('remove-friend');


    Route::post('/cancel-friend-request/{id}', [FriendController::class, 'cancelFriendRequest'])->name('cancel-friend-request');
    Route::post('/reject-friend-request/{id}', [FriendController::class, 'rejectFriendRequest'])->name('reject-friend-request');
    Route::get('/friends', [FriendController::class, 'showFriends'])->name('friends');
    Route::get('/friend-requests', [FriendController::class, 'showFriendRequests'])->name('friend-requests');
    Route::get('/sent-friend-requests', [FriendController::class, 'showSentFriendRequests'])->name('sent-friend-requests');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
