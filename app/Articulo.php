<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulo';
    protected $primaryKey='idarticulo';

    //true=creacion de las entradas
    public $timestamps=false;

    protected $fillable=[
    'idcategoria',
    'codigo',
    'nombre',
    'stock',
    'descripcion',
    'imagen',
    'estado'
    ];

    protected $guarded =[
    ];
}
