<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table='ingreso';
    protected $primaryKey='idingreso';

    //true=creacion de las entradas
    public $timestamps=false;

    protected $fillable=[
    'idproveedor',
    'tipo_comprobante',
    'serie_comprobante',
    'num_comprobante',
    'fecha_hora',
    'impuesto',
    'estado'
    ];

    protected $guarded =[
    ];
}
