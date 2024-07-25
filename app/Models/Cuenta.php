<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuenta extends Model
{
    use HasFactory;
    protected $fillable=[

        'usuario',
        'contrasenia',
        'contraseniaParo',
        'comentarios',
        'cliente_id',


    ];
public function cliente(){


//    return $this->belongsTo(Cliente::class,'cliente_id','id');
    return $this->belongsTo(Cliente::class);

}

public function ctaespejos (){
    return $this->hasMany('App\Models\Ctaespejo','ctaespejo_id','id');
}

 }
