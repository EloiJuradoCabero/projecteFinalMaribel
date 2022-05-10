<?php

namespace App\Http\Controllers;



use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalasController extends Controller
{

    public function delete($id){
        $sala = Sala::findOrFail($id);

        if ($sala->delete()){
            return true;
        }
        return false;

    }

    public function create($name){

        DB::insert('insert into salas (id_reserva,nom_sala,created_at,updated_at) values (null,?,null,null)', [$name]);

        return true;



    }

    public function getAllSalas(){
        return Sala::all();
    }

    public function getSalas($id){
        $sala = Sala::where('id_reserva',$id)->get();

        if (!empty(json_decode($sala, true))){
            return 1;
        }
        return 2;


    }



}
