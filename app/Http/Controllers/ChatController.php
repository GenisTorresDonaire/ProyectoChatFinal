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
    
    public function unirse($nom){

        $numeroID = Grupos::where('nom', $nom )->select('id')->get();
        return view('chat.chat', ['nom' => $nom, 'id' => $numeroID[0]["id"]] );
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

    public function ultimosMensajes($sala){
        
        $fecha = date_create();

        // CALCULO DE UNA HORA ATRAS DES DE LA HORA ACTUAL
        date_sub($fecha,date_interval_create_from_date_string("1 hour"));
        
        // OBTENCION DE LOS MENSAJES DE LA ULTIMA HORA
        $mensajes = Mensajes::with('usuario')
            ->where('id_grupo', $sala)
            ->where('created_at', '>', $fecha)
            ->orderBy('created_at', 'ASC')
            ->get();
        
        // SI EN LA ULTIMA HORA NO HAY NINGUN MENSAJE CARGA LOS ULTIMOS 20
        if(count($mensajes) == 0) {
            $mensajes = Mensajes::with('usuario')
                ->where('id_grupo', $sala)
                ->orderBy('created_at', 'ASC')
                ->limit(20)
                ->get();
        }

        // VUELTA DEL JSON CON LOS DATOS
        return json_encode($mensajes);   
    }


    // funcion devuelve 
    public function actualizacionChat($sala, $hora){

        // OBTENCION DE LOS MENSAJES DE LA ULTIMA HORA
        $mensajes = Mensajes::with('usuario')
            ->where('id_grupo', $sala)
            ->where('created_at', '>', $hora)
            ->orderBy('created_at', 'ASC')
            ->get();   

        // VUELTA DEL JSON CON LOS DATOS
        return json_encode($mensajes);   
    }

}
