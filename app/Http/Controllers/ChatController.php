<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Grupos;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupos::All();
        return view('chat.unirse', ['arrayGrupos' => $grupos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('chat.chat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new Grupos();
        $a->nom = $request->input('nombre');
        $a->id_usuario = Auth::id();
        $a->save();
        
        return redirect()->action('ChatController@index');
    }

    public function unirse($sala)
    {
        //$grupos = Grupos::All();

        return view('chat.chat');
    }
}
