<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class PostController extends Controller
{
    //

    public function viewSinglePost(Post $post){
        $post['body'] = Str::markdown($post->body);
        return view('single-post', ['post' => $post]);
    }

    public function index(){
        $post = Post::with('user')->get()->toQuery()->paginate(5);

        return view('homepage', compact('post'), ['allPost'=>$post]);
    }

    public function storeNewPost(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        $newPost = Post::create($incomingFields);

        return redirect("/post/{$newPost->id}")->with('success', 'Blog Successfully Posted');
    }

    public function showCreateForm(){
        return view('create-post');
        
    }
}
