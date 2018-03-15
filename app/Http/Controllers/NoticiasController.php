<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;
use App\Noticias;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NoticiasController extends Controller
{
    public function index()
    {
        $fecha = Carbon::now()->subDays(7);

       

        Noticias::where('importante', '0')
            ->where('created_at', '<=', $fecha)
            ->update(['importante' => '1']);



        $noticias = Noticias::orderBy('created_at', 'desc')->get();
        $categorias = Noticias::select('categoria')->distinct()->get();
        $name="Todas";
        

        
        
        //$name=$request->input('categorias');

        //, ['arrayNoticias' => $noticias]

        return view('noticias.noticias' ,['arrayNoticias' => $noticias , 'arrayCategoria' => $categorias , 'name'=>$name] );
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
        $a->importante = $request->input('imp');

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

    public function opcion($opcion)
    {
        //
        return redirect()->action('NoticiasController@index', ['name' => $opcion]);
    }




    public function categoria(Request $request)
    {
        //$denuncias = Denuncia::All();
       
        //$name=$request->input('categorias');
        $name=$request->input('categorias');
        $noticias = Noticias::orderBy('created_at', 'desc')->get();
        $categorias = Noticias::select('categoria')->distinct()->get();

        $fecha = Carbon::now()->subDays(7);

       

        Noticias::where('importante', '0')
            ->where('created_at', '<=', $fecha)
            ->update(['importante' => '1']);
        
        
        //dd($name);
        //$name=$request->input('categorias');

        //, ['arrayNoticias' => $noticias]

        return view('noticias.noticias' ,['arrayNoticias' => $noticias , 'arrayCategoria' => $categorias , 'name' => $name] );
        
        
        //, ['arrayNoticias' => $noticias]

        //return redirect()->action('NoticiasController@index');
       
    }

    public function irNoticiasExamen(Request $request)
    {
        
        return view('noticias.ExamenM6');

    }

    public function noticiasExamen(Request $request)
    {
        $noticias = Noticias::orderBy('created_at', 'desc')->get();


        return json_encode($noticias);

    }
}

