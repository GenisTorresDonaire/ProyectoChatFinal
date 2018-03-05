<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    //
    protected $table = 'Mensajes';

    public function id_usuario()
    {
        return $this->belongsTo('App\User');
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\User', 'id_usuario');
    }
}