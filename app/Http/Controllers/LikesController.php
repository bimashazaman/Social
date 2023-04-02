<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function like($id)
    {
        $like = new Likes();
        $like->user_id = Auth::user()->id;
        $like->post_id = $id;
        $like->save();
        return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Likes::where('post_id', $id)->where('user_id', Auth::user()->id)->first();
        $like->delete();
        return redirect()->back();
    }

    public function whoLiked($id)
    {
        $likes = Likes::where('post_id', $id)->get();
        return view('likes.whoLiked', compact('likes'));
    }
}
