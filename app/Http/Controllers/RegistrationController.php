<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{


    public function store(){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'dni' => 'required',
            'telefon' => 'required'
        ]);

        $password = \request()->only('password')['password'];

        $passwordDef = bcrypt($password);

        $user = new User();
        $user->name = \request('name');
        $user->email = \request('email');
        $user->password = $passwordDef;
        $user->dni = \request('dni');
        $user->telefon = \request('telefon');
        $user->save();


        return redirect('/');

    }
}
