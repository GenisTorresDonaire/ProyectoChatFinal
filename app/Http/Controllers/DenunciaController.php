<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;
use App\Denuncia;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$denuncias = Denuncia::All();
        $denuncias = Denuncia::where('id_usuario', Auth::user() -> id )->get();

        return view('denuncia.denuncias', ['arrayDenuncias' => $denuncias] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('denuncia.crearDenuncias');
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
        $a = new Denuncia();
        $a->text = $request->input('textoFormulario');
        $a->ubicacion = "localizacion";
        $a->respuesta ="";

        //
        //$a->imagen = $request->input('imagenFormulario');
        if (Input::hasFile('imagenFormulario')){
            $file = Input::file('imagenFormulario');
            $file->move('uploads/', $file->getClientOriginalName());
            $a->imagen = "uploads/".$file->getClientOriginalName();
        }
        
        $a->id_usuario = Auth::id();
        //$a->prioridad = $request->input('optionsRadios');
        $a->resuelto = false;
        $a->save();

        return redirect()->action('DenunciaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function comentar(Request $request)
    {
       // $a->respuesta =$request->input('comentario');

        Denuncia::where('id', $request->input('id'))
            ->update(['respuesta'=> $request->input('comentario')]);

        return redirect()->action('DenunciaController@index');
       
        

    }

}