<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $posts = Post::whereRaw("data=DATE_FORMAT(now(),'%Y-%m-%d')")
        ->orderByDesc('data')
        ->orderByDesc('ora_e')
        //->orderByDesc(IFNULL('ora_u','23:59'))
        ->orderByRaw("IFNULL( `ora_u`, '23:59' ) DESC")
        ->get();
        */
        $posts = DB::table('posts')
        ->selectRaw("id, DATE_FORMAT(data,'%d/%m/%Y') as data ,cognome, nome, azienda, note, SUBSTR(ora_e,1,5) as ora_e, SUBSTR(ora_u,1,5) as ora_u")
        ->whereRaw("data=DATE_FORMAT(now(),'%Y-%m-%d')")
        ->orderByDesc('data')
        ->orderByDesc('ora_e')
        //->orderByDesc(IFNULL('ora_u','23:59'))
        ->orderByRaw("IFNULL( `ora_u`, '23:59' ) DESC")
        ->get();



        return view('dashboard', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
