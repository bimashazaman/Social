<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(50);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'nullable|string',
            'media.*' => 'nullable|file',
            'status' => 'nullable|string',
        ]);

        $post = new Post([
            'caption' => $request->get('caption'),
            'status' => $request->get('status', 'active'),
            'user_id' => auth()->user()->id,
        ]);

        $uploadsPath = public_path('uploads');
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
            $post->media = implode(',', $media);
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'caption' => 'nullable|string',
            'media.*' => 'nullable|file',
            'status' => 'nullable|string',
        ]);

        $post = Post::find($id);
        $post->caption = $request->get('caption');
        $post->status = $request->get('status', 'active');

        $uploadsPath = public_path('uploads');
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
            $post->media = implode(',', $media);
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        // Delete media files
        $media = explode(',', $post->media);
        foreach ($media as $file) {
            $filePath = public_path('uploads/' . $file);
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }
        // Delete post
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
