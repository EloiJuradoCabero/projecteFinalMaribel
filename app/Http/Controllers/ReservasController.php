<?php

namespace App\Http\Controllers;

use App\Models\Empleat;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;
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


        if (\request()->user()->isAdmin==1 or session()->get('isEmpleat')){
            $reservas= DB::table('reservas')->get();
            $arrayReservas = array();
            foreach ($reservas as $reserva){
                array_push($arrayReservas,$reserva);
            }

            \session()->put('reservas',$arrayReservas);

            $idEmpleats = Empleat::where('isEmpleat', 1)->get()->map->only(['id_user']);
            $arrayIdEmpleats = array();

            foreach ($idEmpleats as $idEmpleat){
                array_push($arrayIdEmpleats, $idEmpleat);
            }

            \session()->put('idEmpleats', $arrayIdEmpleats);

        }else{
            $reservas= DB::table('reservas')->where('id_user', \request()->user()->id)->get();
            $arrayReservas = array();
            foreach ($reservas as $reserva){
                array_push($arrayReservas,$reserva);
            }

            \session()->put('reservas',$arrayReservas);
        }




        return view('reservas');
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
            'isConfirmed' => null,
        ]);


        return redirect('reservas');





    }



    public function assignar (Request $req){
        if (Reserva::where('id', $req->id_reserva)->get()){
            Reserva::where('id', $req->id_reserva)->update(['id_empleat' => $req->id_empleat]);
            return true;
        }
        return false;
    }



    //Functions VUE
    public function getAllReservasVue(){

        if(\request()->user()->isAdmin == 1 or \request()->user()->isEmpleat == 1){
            $reserves = Reserva::all();
           return $reserves;
        }else{
            $reservas = Reserva::where('id_user',\request()->user()->id)->get();
            return $reservas;
        }

    }

    public function confirmar($reservaId){
        if(Reserva::where('id',$reservaId)->update(['isConfirmed' => 1])){
            return true;
        }
        return false;
    }

    public function delete($reservaId){
        if ($reserves = Reserva::findOrFail($reservaId)){
            $reserves->delete();
            return true;
        }
        return false;

    }
    public function modificarReserva(Request $req){

        $horadia = explode('T',$req->horadia);

        if (Reserva::where('id', $req->id_reserva)->update(['day' => $horadia[0], "hour" => $horadia[1]])){
            return true;
        }
        return false;


    }


}
