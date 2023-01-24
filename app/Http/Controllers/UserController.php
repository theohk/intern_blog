<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function profile(User $user) {
        return view('profile-posts', ['username' => $user->username, 'posts' => $user->posts()->latest()->get(), 'postCount' => $user->posts()->count()]);
    }

    public function logout() {
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out.');

    }

    // public function showCorrectHomepage(User $user){
    //     if(auth()->check()) {
    //         $user = auth()->user();
    //         return view('homepage-feed', ['postCount' => $user->posts()->count()]);
    //     }
    //     else {
    //         return view('homepage');
    //     }
    // }

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
            return redirect('/')->with('error', 'Invalid Login, please try again');

        }
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
