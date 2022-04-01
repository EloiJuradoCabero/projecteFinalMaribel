<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class ReservasController extends Controller
{


    public function view(){
        return view('reservas');
    }

    public function index(){
        return $this->getAllReservas();
    }

    public function getAllReservas(){
        if (\request()->user()->isAdmin==1){
            $reservas = Reserva::get()->map->only(['id','id_joc','id_user','telefon','pais','organitzacio']);
            $arrayReservas = array();
            foreach ($reservas as $reserva){
                array_push($arrayReservas,$reserva);
            }


        }else{
            $reservas= DB::table('reservas')->where('id_user', \request()->user()->id)->get();
            $arrayReservas = array();
            foreach ($reservas as $reserva){
                array_push($arrayReservas,$reserva);
            }

            \session()->put('reservas',$arrayReservas);
        }




        return $this->view();
    }


    public function reservar(Request $req, $jocId){

        $horadia = explode('T',$req->horadia);


        DB::table('reservas')->insert([
            'id_joc' => $jocId,
            'id_user' => \request()->user()->id,
            'telefon' => \request()->user()->telefon,
            'day' => $horadia[0],
            'hour' => $horadia[1],
            'pais' => $req->pais,
            'organitzacio' => "prova",
            'isConfirmed' => false
        ]);


        return $this->index();





    }

}
