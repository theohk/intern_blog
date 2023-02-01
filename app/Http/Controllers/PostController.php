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
    public function showEditForm(Post $post){
        $tags = Tag::all();
        return view('edit-post', ['post' => $post, 'tags' => $tags]);
    }


    

    public function delete(Post $post) {
        // if (auth()->user()->cannot('delete', $post)) {
        //     return 'You cannot do that';
        // }
        $post->delete();

        return redirect('/profile/' . auth()->user()->username)->with('success', 'Post successfully deleted');
    }

    public function postUpdate(Post $post, Request $request){
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'tags_id' => 'nullable|array'
        ]);
        $post->update($data);

        foreach ($request->tags_id as $tag) {
            $postTag = new PostTag();
            $postTag->post_id = $post->id;
            $postTag->tag_id = $tag;
            $postTag->save();
        }

        return back()->with('success', 'Post successfully updated.');
    }

    public function viewSinglePost(Post $post){
        $post['body'] = Str::markdown($post->body);
        return view('single-post', ['post' => $post]);
    }

    public function index(Request $request){
        $title1 = DB::table('posts')->where('id', '21')->value('title');
        $body1 = DB::table('posts')->where('id', '21')->value('body');
        $title2 = DB::table('posts')->where('id', '25')->value('title');
        $body2 = DB::table('posts')->where('id', '25')->value('body');
        $post = Post::with([
            'user',
            'postTags' => function ($q) {
                $q->with('tag');
            }
        ])
                ->orderBy('created_at', 'desc')->paginate(5);

        return view('homepage', compact('post', 'title1', 'body1', 'title2', 'body2'));
        
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
