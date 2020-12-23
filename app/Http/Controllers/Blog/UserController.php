<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        $user = User::select('id')->first();

        // au maximum un utilisateur inscrit (l'admin) sur le blog
        if(empty($user))
        {
            return view('Blog\Front.user');
        }

        return redirect()->route('login')->with('message', 'Il existe déjà un utilisateur sur ce blog, ');

    }


    public function store(Request $request, UserRepositoryInterface $userRepository)
    {

        $dob = $userRepository->dob($request);
        $userRepository->save($request, $dob);

        return redirect()->route('login')->with('status', 'Utilisateur inscrit!');

    }


    public function login()
{
    return view('Blog\Front\login');
}


    public function verificationLogin(Request $request)
    {
        $data = $request->validate([
            'mail'      => 'required|min:10|max:100',
            'password'  => 'required|min:10'
        ]);

          if(Auth::attempt(['email' => $data['mail'], 'password' => $data['password'] ]) )
          {
              return redirect()->intended('admin/liste-articles');
          }
        return redirect()->route('login')->with('message', 'Votre Email ou mot de passe est erroné');
    }


    public function disconnection(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return view('Blog\Front\login');
    }
}

