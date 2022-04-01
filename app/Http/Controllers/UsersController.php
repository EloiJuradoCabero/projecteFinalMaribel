<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function users(){

        if (Auth::check()){

            $users=User::get()->map->only(['id','name','email','password','isAdmin']);
            $arrayUsers = array();
            foreach ($users as $user){
                array_push($arrayUsers,$user);
            }
            \session()->put('users', $arrayUsers);


            return view('users');
        }

        session()->put('not_logged', true);
        return redirect('auth');
    }
}
