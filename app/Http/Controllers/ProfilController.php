<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profil;
use App\User;
use App\Auth;


class ProfilController extends Controller
{
    public function edit()
    {

        return view('profil');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([

            'lastname' => ['required', 'string'],
            'firstname' => ['required', 'string'],
            'email' => ['required', 'string'],

        ]);

        $user = User::where('id', $id)->first(); //modifie la base de données


        $user->lastname = $data['lastname'];
        $user->firstname = $data['firstname'];
        $user->email = $data['email'];

        $user->save();

        return back();
    }
}
