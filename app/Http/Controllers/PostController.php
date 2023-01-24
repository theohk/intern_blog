<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Str;
use DB;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //

    public function viewSinglePost(Post $post){
        $post['body'] = Str::markdown($post->body);
        return view('single-post', ['post' => $post]);
    }

    public function index(Request $request){
        $post = Post::with([
            'user',
            'postTags' => function ($q) {
                $q->with('tag');
            }
        ])
                ->orderBy('created_at', 'desc')->paginate(5);

        return view('homepage', compact('post'));
        
    }



    public function storeNewPost(Request $request){
        // dd($request->all());
        
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'tags_id' => 'required|array',
        ]);

        $data['title'] = strip_tags($data['title']);
        $data['body'] = $data['body'];
        $data['user_id'] = auth()->id();

        $newPost = Post::create($data);
        
        foreach ($request->tags_id as $tag) {
            $postTag = new PostTag();
            $postTag->post_id = $newPost->id;
            $postTag->tag_id = $tag;
            $postTag->save();
        }
        return redirect("/post/{$newPost->id}")->with('success', 'Blog Successfully Posted');
    }

    // public function storeNewPost(Request $request){
    //     $data = $request->validate([
    //         'title' => 'required',
    //         'body' => 'required',
    //     ]);

    //     $data['user_id']=$->id;
    //     // $data['title'] = strip_tags($data['title']);
    //     // $data['body'] = strip_tags($data['body']);
    //     // $data['user_id'] = auth()->id();
    //     // $data['tags_id'] = $request->tag_id;
    //     // $newPost = Post::create($data);

    //     Post::create([
    //         'title' => $request->title,
    //         'body' => $request->body,
    //         'user_id' => auth()->id(),
    //         'tags_id' => $request->tags_id,
    //     ]);

    //     return redirect("/profile/{user:username}")->with('success', 'Blog Successfully Posted');
    // }

    
    public function showCreateForm(Request $request){
        $tags = Tag::all();
        return view('create-post', compact('tags'));
        
    }
}
