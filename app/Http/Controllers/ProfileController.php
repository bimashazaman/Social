<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $user = User::find($user_id);
        $posts = Post::where('user_id', $user_id)->get();


        return view('profile.index', compact('user', 'posts'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('profile.edit', compact('user'));
    }
}
