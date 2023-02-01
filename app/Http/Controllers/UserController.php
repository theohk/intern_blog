<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    //

    public function profile1(Request $request) {
        $post = Post::where('user_id', Auth::user()->id)->with([
            'user',
            'postTags' => function ($q) {
                $q->with('tag');
            }
        ])
                ->orderBy('created_at', 'desc')->paginate(10);
                return view('profile-posts', compact('post'));
    }
    
    public function storeAvatar(Request $request) {
        $request->validate([
            'avatar' => 'required|image|max:3000'
        ]);

        $user = auth()->user();

        $filename  = $user->id . '-' . uniqid() . '.jpg';

        $imgData = Image::make($request->file('avatar'))->fit(120)->encode('jpg');
        Storage::put('public/avatars/' . $filename, $imgData);

        $oldAvatar = $user->avatar;

        $user->avatar = $filename;
        $user->save();

        if($oldAvatar != "/fallback-avatar.jpg") {
            Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
        }

        return redirect('/profile/' . auth()->user()->username)->with('success', 'Congrats on your new avatar');

    }

    public function showAvatarForm() {
        return view('avatar-form');
    }

    public function profile(User $user) {
        return view('profile-posts2', [ 'avatar' => $user->avatar, 'username' => $user->username, 'posts' => $user->posts()->latest()->paginate(10), 'postCount' => $user->posts()->count()]);
    }

    public function logout() {
        auth()->logout();
        return redirect('/homepage')->with('error', 'You are now logged out');

    }

    public function showCorrectHomepage(User $user){
        if(auth()->check()) {
            $user = auth()->user();
            return view('homepage-feed', ['postCount' => $user->posts()->count()]);
        }
        else {
            return redirect()->action([PostController::class, 'index']);
        }  
    }

    public function template(){
             return view('template');
        }
        

    public function login(Request $request) {
        $data = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['username' => $data['loginusername'], 'password' => $data['loginpassword']])) {
            $request -> session() -> regenerate();
            return redirect('/')->with('success', 'You have successfully logged in.');
        }
        else {
            return redirect('/homepage')->with('error', 'Incorrect username or password, please try again');

        }
    }

    public function userRegister(){
        return view('register');
   }
    public function register(Request $request) {
        $data = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        auth()->login($user);
        return redirect('/')->with('success', 'Thank you for creating an account');
    }
}
