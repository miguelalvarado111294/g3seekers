<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sensor extends Model
{
    use HasFactory;

    protected $fillable=[

        'marca',
        'modelo',
        'noserie',
        'tipo',
        'comentarios'

    ];



public function dispositivo(){

    return $this->hasMany(dispositivo::class,'dispositivo_id','id');

}



}
