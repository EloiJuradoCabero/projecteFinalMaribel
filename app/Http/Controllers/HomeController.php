<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home(){

        if (Auth::check()){
            $jocs=Joc::get()->map->only(['id','name','description','img','isReservat']);
            $arrayJocs = array();
            foreach ($jocs as $joc){
                array_push($arrayJocs,$joc);
            }
            \session()->put('jocs', $arrayJocs);


            return view('home');
        }

        session()->put('not_logged', true);
        return redirect('auth');

    }
}
