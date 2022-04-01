<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function check(){
       $credentials = \request()->only('email','password');

       if (Auth::attempt($credentials)){
           \request()->session()->regenerate();
           return redirect('home');
       };

       session()->put('err_credentials', true);
       return redirect('auth');

    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('auth');

    }
}
