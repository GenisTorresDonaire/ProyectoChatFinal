<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Denuncia;
use Illuminate\Http\Request;

class AdminDenuncias extends Controller
{

    public function index()
    {
        //$denuncias = Denuncia::All();
        $denuncias = Denuncia::All();

        return view( 'denuncia.adminDenuncias', ['arrayDenuncias' => $denuncias] );
    }

    public function show($id)
    {
        //
        $denuncias = Denuncia::where('id', $id )->get();
        //return view('catalog.edit', array('id'=>$id));
        return view( 'denuncia.responderAdmin', ['arrayDenuncias' => $denuncias] );

    }

    public function edit($id)
    {
        //
        $denuncias = Denuncia::where('id', $id )->get();
        //return view('catalog.edit', array('id'=>$id));
        return view( 'denuncia.responderAdmin', array("arrayDenuncias"=>$denuncias, 'id'=>$id ) );

    }

    public function store(Request $request){

    }

    public function update($id)
    {
        //
    }
}
