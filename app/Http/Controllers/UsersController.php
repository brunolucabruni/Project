<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return 'All users';
    }
    public function show($id=null){
        if($id==null) return 'Utente sconosciuto';
        return 'Utente '.$id;

    }
}
