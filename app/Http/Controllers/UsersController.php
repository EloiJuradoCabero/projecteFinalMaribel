<?php

namespace App\Http\Controllers;

use App\Models\Empleat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }







    public function getUsers(){

        $users=User::where('isEmpleat', null)->get()->map->only(['name','id']);
        $arrayUsers = array();
        foreach ($users as $user){
            array_push($arrayUsers,$user);
        }
        \session()->put('usersNotEmpleats', $arrayUsers);


        return view('assignEmpleat');
    }

    public function getUsersAdmin(){

        $users=User::where('isEmpleat', null)->get()->map->only(['name','id']);
        $arrayUsers = array();
        foreach ($users as $user){
            array_push($arrayUsers,$user);
        }
        \session()->put('usersForModify', $arrayUsers);


        return view('modify');
    }

    public function deleteUser($userId){
        $users = User::findOrFail($userId);
        $users->delete();

        return redirect('users');

    }

    public function modifyUser(Request $req, $userId){
        User::where('id', $userId)->update([
            'name' => $req->name,
            'password' => bcrypt($req->password),
            'telefon' => $req->telefon
            ]);

        return redirect('home');

    }

    public function modifyUserAdmin(Request $req){

        User::where('id', $req->userId)->update([
            'name' => $req->name,
            'password' => bcrypt($req->password),
            'telefon' => $req->telefon
        ]);

        return redirect('users');

    }

    //Functions VUE
    public function users(){
        if (Auth::check()){
            return view('users');
        }
        session()->put('not_logged', true);
        return redirect('auth');
    }

    public function getAllUsers(){
        $users=User::all();
        return $users;
    }

    public function deleteUsr($userId): string
    {
        $users = User::findOrFail($userId);

        if ($users->delete()){
            return "true";
        }

        return "false";

    }

    public function modifyUsr($userId)
    {
        if ($user = User::findOrFail($userId)){
            session()->put("userSearched",$user);
            return true;
        }
        return false;
    }

    public function getDataOfUsr(){
        $user = session()->get("userSearched");
        session()->remove("userSearched");

        return $user;

    }

    public function modificarUsr(Request $request){

        if ($user = User::findOrFail($request->get("id"))){

            $user->name = $request->get("name");
            $user->password = $request->get("password");
            $user->telefon = $request->get("telefon");

            $user->save();

            session()->remove("userSearched");

            return true;
        }else{
            return false;
        }

    }

    public function empleats(){
        if (Auth::check()) {
            return view('empleats');
        }
        session()->put('not_logged', true);
        return redirect('auth');
    }

    public function getAllEmpleats(){
        $empleats=User::where('isEmpleat',1)->get();
        return $empleats;
    }

    public function deleteEmpleat($empleatId): string
    {

        if (User::findOrFail($empleatId)){
            $empleat = User::findOrFail($empleatId);
            $empleat->isEmpleat = null;

            $empleat->save();

            return true;

        }

        return false;

    }

    public function makeEmpleat($userId){

        if ($user = User::findOrFail($userId)){
            $user->isEmpleat = 1;

            $user->save();
        }

    }

    public function makeAdmin($userId){
        if ($user = User::findOrFail($userId)){
            $user->isAdmin = 1;
            $user->save();
        }
    }

    public function getTypeOfUser(){

        if (request()->user()->isAdmin){
            return "admin";
        }else if (\session()->get('isEmpleat')){
            return "empleat";
        }else{
            return \request()->user()->id;
        }
    }

    public function newUser(Request $request){
        $passwordDef = bcrypt($request->password);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $passwordDef;
        $user->dni = $request->dni;
        $user->telefon = $request->telefon;

        if ($user->save()){
            return true;
        }
        return false;
    }


}
