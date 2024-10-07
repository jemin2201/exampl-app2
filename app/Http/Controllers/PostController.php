<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = Auth::id();
        $post->save();

        return response()->json($post, 201);
    }

    public function index()
    {
        $posts = Post::all();
        $posts = Post::with('user')->get();
        return response()->json($posts);
    }

    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('PostsList')->with('error', '게시글을 찾을 수 없습니다.');
        }

        return Inertia::render('PostsDetail', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    
}
