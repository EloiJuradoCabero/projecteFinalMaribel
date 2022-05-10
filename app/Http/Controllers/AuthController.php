<?php
namespace App\Http\Controllers;
use App\Models\Empleat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;

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

           if (isset(\request()->user()->isEmpleat)){
               \session()->put('isEmpleat', true);
           }

           return redirect('home');
       };


       session()->put('err_credentials', true);
       return redirect('auth');

    }

    public function logout(){
        \session()->put('isEmpleat', false);
        Session::flush();
        Auth::logout();


        return redirect('auth');

    }
}
