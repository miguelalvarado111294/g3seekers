<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dispositivo extends Model
{
    use HasFactory;


    protected $fillable=[
        'id',
        'modelo',
        'noserie',
        'imei',
        'comentarios',
        'sensor_id',
        'linea_id',
        'cliente_id'

    ];
public function cliente(){
    return $this->belongsTo(Cliente::class,'cliente_id','id');
}

public function lineas(){
    return $this->belongsTo(Cliente::class,'cliente_id','id');
}

public function sensors(){
    return $this->belongsTo(Sensor::class,'dispositivo_id','id');
}

}
