<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Denuncia;
use Illuminate\Http\Request;

class AdminDenuncias extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$denuncias = Denuncia::All();
        $denuncias = Denuncia::All();

        return view('denuncia.adminDenuncias', ['arrayDenuncias' => $denuncias] );
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }
}
