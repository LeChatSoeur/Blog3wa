<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class UserRepository implements UserRepositoryInterface
{

    public function dob($request)
    {
        $dobDay = $request->dobDay;
        $dobMonth = $request->dobMonth;
        $dobYear = $request->dobYear;

        if($dobDay != 0 && $dobMonth != 0 && $dobYear != 0)
        {

            return $dobYear . "-" . $dobMonth . "-" . $dobDay;
        }
        else
        {
            return null;
        }

    }


    public function save($request, $dob)
    {
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
            return $user;
        }
    }

}
