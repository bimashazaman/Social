<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store(Request $request)
    {
        $request->user()->likes()->create([
            'post_id' => $request->post_id,
        ]);

        return back();
    }

    public function destroy(Request $request, $id)
    {
        $request->user()->likes()->where('post_id', $id)->delete();

        return back();
    }
}
