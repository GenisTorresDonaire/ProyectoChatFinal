<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    //
    protected $table = 'Mensajes';

    public function id_usuario()
    {
        return $this->belongsTo('App\User');
    }
    
}
