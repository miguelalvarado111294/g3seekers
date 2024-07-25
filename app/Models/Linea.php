<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class linea extends Model
{
    use HasFactory;

    protected $fillable=[

        'simcard',
        'telefono',
        'tipolinea',
        'renovacion',
        'comentarios',
        'cliente_id',

    ];

    public function cliente(){

        return $this->belongsTo(Cliente::class,'cliente_id','id');

    }
    public function dispositivos (){

        return $this->hasMany('App\Models\Linea','dispositivo_id','id');
    }


}
