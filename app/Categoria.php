<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categoria';
    protected $primaryKey='idcategoria';

    //true=creacion de las entradas
    public $timestamps=false;

    protected $fillable=[
    'nombre',
    'descripcion',
    'condicion'
    ];

    protected $guarded =[
    ];
}
