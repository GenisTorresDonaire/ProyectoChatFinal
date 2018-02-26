<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;
use App\Noticias;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
     public function index()
    {
        //$denuncias = Denuncia::All();
        $noticias = Noticias::orderBy('created_at', 'desc')->get();
        //, ['arrayNoticias' => $noticias]

        return view('noticias.noticias' ,['arrayNoticias' => $noticias] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.crearNoticias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $a = new Noticias();
        $a->titulo = $request->input('tituloNoticia');
        $a->texto = $request->input('textoNoticia');
        $a->categoria = $request->input('categorias');

        //
        //$a->imagen = $request->input('imagenFormulario');
        if (Input::hasFile('imagenFormulario')){
            $file = Input::file('imagenFormulario');
            $file->move('uploads/', $file->getClientOriginalName());
            $a->imagen = "uploads/".$file->getClientOriginalName();
        }
        
        $a->id_usuario = Auth::id();
        //$a->prioridad = $request->input('optionsRadios');
        
        $a->save();

        return redirect()->action('NoticiasController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function show(Denuncia $denuncia)
    {
        //
    }
}
