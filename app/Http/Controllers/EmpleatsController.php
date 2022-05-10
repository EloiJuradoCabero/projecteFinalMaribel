<?php

namespace App\Http\Controllers;

use App\Models\Empleat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleatsController extends Controller
{

    public function eliminar($userId){
        $empleat = Empleat::findOrFail($userId);
        $empleat->delete();
        return redirect('empleats');

    }

    public function makeUserEmpleat(Request $req){

        DB::insert('insert into empleats (id_user,isEmpleat) values (?,?)', [$req->userId,1]);

        $idUserEmpleat = $req->idEmpleat;

        User::where('id', $req->userId)->update(['isEmpleat' => 1]);

        return redirect('empleats');

    }

    public function modificar(Request $req, $userID){
        return "hello";

    }

}
