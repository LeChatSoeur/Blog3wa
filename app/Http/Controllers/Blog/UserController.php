<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('Blog\Front.user');
    }

    public function store(Request $request)
    {
        $dobDay = $request->dobDay;
        $dobMonth = $request->dobMonth;
        $dobYear = $request->dobYear;

        if($dobDay != 0 && $dobMonth != 0 && $dobYear != 0)
        {
        $dob = $dobYear . "-" . $dobMonth . "-" . $dobDay;
        }
        else
            {
                $dob = null;
            }


        $data = $request->validate([

            '_token'    => 'required',
            'mail'      => 'required|email|max:100',
            'password'  => 'required|min:10|alpha_num',
            'pseudo'    => 'required|min:7|alpha_dash',
            'firstName' => 'required|min:3',
            'lastName'  => 'required|min:3',
            'dobDay'    => "nullable",
            'dobMonth'  => "nullable",
            'dobYear'   => "nullable",
            'pays'      => 'required|min:4',
        ]);

        if (!empty($data))
        {
            $user = new User;
            $user->email = $data['mail'];
            $user->password = Hash::make($data['password']);
            $user->pseudo = $data['pseudo'];
            $user->name = $data['lastName'];
            $user->firstname = $data['firstName'];
            $user->dob = $dob;
            $user->pays = $data['pays'];
            $user->remember_token = $data['_token'];
            $user->save();
            return redirect()->route('login')->with('status', 'Utilisateur inscrit!');
        }
        return redirect()->route('inscription')->with('status', 'inscription échoué');
    }

    public function login()
{
    return view('Blog\Front\login');
}

    public function verificationLogin(Request $request)
    {
        $request->validate([
            'mail'      => 'required|min:10|max:100',
            'password'  => 'required|min:10'
        ]);

            $mail = $request->mail;
            $password = $request->password;
            //Auth::check();
          if(Auth::attempt(['email' => $mail, 'password' => $password]))
          {
              return redirect()->intended('admin/liste-articles');
          }
        return view('Blog\Front.index');
    }

    public function disconnection()
    {
        Auth::logout();
        return view('Blog\Front\login');
    }
}

