<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Grupos;
use App\Mensajes;
use Illuminate\Http\Request;

class ChatController extends Controller{

    public function index(){
        $grupos = Grupos::All();
        return view('chat.unirse', ['arrayGrupos' => $grupos]);
    }

    public function create(){
        //return view('chat.chat');
    }

    public function store(Request $request){
        $a = new Grupos();
        $a->nom = $request->input('nombre');
        $a->id_usuario = Auth::id();
        $a->save();
        
        return redirect()->action('ChatController@index');
    }
    
    public function unirse($id){
        //$numeroID = Grupos::where('nom', $id )->get();
        return view('chat.chat', ['id' => $id]);
    }

    public function guardarMensaje($sala, $mensaje){
        //
        $m = new Mensajes();
        $m->id_grupo = $sala;
        $m->mensaje = $mensaje;
        $m->id_usuario = Auth::id();
        $m->save();
        
        return json_encode(array('sala' => $sala, 'mensaje' => $mensaje));
    }
}
