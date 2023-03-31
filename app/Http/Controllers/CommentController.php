<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index($post_id)
    {
        $comments = Comment::where('post_id', $post_id)->latest()->get();
        $post = Post::find($post_id);
        return view('comments.index', compact('comments', 'post'));
    }

    public function create()
    {
        return view('comments.index');
    }

    public function store(Request $request, $post_id)
    {
        $request->validate([
            'comment' => 'required',
            'media.*' => 'nullable|file|max:10000|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->post_id = $post_id;
        $comment->user_id = auth()->user()->id;

        $uploadsPath = public_path('comments');
        if (!file_exists($uploadsPath)) {
            mkdir($uploadsPath, 0777, true);
        }

        if ($request->hasFile('media')) {
            $media = [];
            foreach ($request->file('media') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($uploadsPath, $fileName);
                $media[] = $fileName;
            }
            $comment->media = implode(',', $media);
        }

        $comment->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back();
    }

    public function like($id)
    {
        $comment = Comment::find($id);
        $comment->likes()->create([
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back();
    }

    public function unlike($id)
    {
        $comment = Comment::find($id);
        $comment->likes()->where('user_id', auth()->user()->id)->delete();

        return redirect()->back();
    }
}
