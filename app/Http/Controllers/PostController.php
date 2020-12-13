<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    
    public function index() {      
        
        $posts = Post::with(['user', 'likes'])->paginate(20);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post) {

        return view('posts.show', [
            'post' => $post,
        ]);
        
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'body' => 'required',
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post, Request $request) {

        $this->authorize('delete', $post);
        $post->delete();
        return back();

    }

}
