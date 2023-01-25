<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('data')
        ->orderByDesc('ora_e')
        //->orderByDesc(IFNULL('ora_u','23:59'))
        ->orderByRaw("IFNULL( `ora_u`, '23:59' ) DESC")
        ->get();

        return view('posts.index', ['posts'=>$posts]);
    }

    public function search(Request $request){
        // Get the search value from the request
        $start = $request->input('start');
        $stop = $request->input('stop');

        // Search in the title and body columns from the posts table
        /*
        $posts = Post::query()
            ->where('data', '>=', "{$start}")
            ->where('data', '<=', "{$stop}")
            ->orderByDesc('data')
            ->orderByDesc('ora_e')
            ->orderByRaw("IFNULL( `ora_u`, '23:59' ) DESC")
            ->get();
        */

        $posts = DB::table('posts')
        ->selectRaw("id,DATE_FORMAT(data,'%d/%m/%Y') as data ,cognome, nome, azienda, note, SUBSTR(ora_e,1,5) as ora_e, SUBSTR(ora_u,1,5) as ora_u")
        ->where('data', '>=', "{$start}")
        ->where('data', '<=', "{$stop}")
        ->orderByDesc('data')
        ->orderByDesc('ora_e')
        //->orderByDesc(IFNULL('ora_u','23:59'))
        ->orderByRaw("IFNULL( `ora_u`, '23:59' ) DESC")
        ->get();
        // Return the search view with the resluts compacted
        return view('search', compact('posts'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = new Post;
        $post->cognome = $request->cognome;
        $post->nome = $request->nome;
        $post->azienda = $request->azienda;
        $post->note = $request->note;
        $post->data = $request->data;
        $post->ora_e = $request->ora_e;
        $post->ora_u = $request->ora_u;
        $post->save();
        $request->session()->flash('status','Presenza marcata correttamente');

        if (Auth::user()){
            return redirect('search');
        }
        return redirect('/');
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
    public function edit(Post $post)
    {
        //$post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update($request->validated());
        //$request->session()->flash('status','Presenza marcata correttamente');
        if (Auth::user()){
            return redirect('search');
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
