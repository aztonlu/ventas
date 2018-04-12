<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\DetalleVenta;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\VentaFormRequest;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
//use Input;
use Excel;

class ExcelController extends Controller
{
    //
	public function getExport()
    {
        /*$datos=DB::table('detalleventa as a')
            ->join('venta as c','a.idventa','=','c.idventa')
            ->select('c.tipo_comprobante, serie_comprobante, c.num_comprobante, c.fecha_hora, a.idarticulo','a.cantidad','a.precio_venta','a.descuento')
            ->where('a.idventa = 3');*/
            //->where('a.idventa','LIKE','%'.$query.'%')
        //$ventas=DetalleVenta::all();
        //$ventas=DB::table('venta')
        //->select('cantidad');


/*
        $ventas = Venta::join('idventa')
        Excel::create('Exportar Venta', function($excel) use ($ventas){

        $excel->sheet('Hoja excel', function($sheet) use ($ventas){
*/
            
        Excel::create('Exportar Venta', function($excel) {

        $excel->sheet('Hoja excel', function($sheet) {
            $ventas = DB::table("venta")
            ->join("detalle_venta", "detalle_venta.idventa","=","venta.idventa")
            ->join("persona","persona.idpersona","=","venta.idcliente")
            ->join("articulo","articulo.idarticulo","=","detalle_venta.idarticulo")
            ->select("persona.nombre as nombrepersona", "persona.num_documento", "venta.tipo_comprobante", "venta.serie_comprobante", "num_comprobante", "articulo.nombre", "detalle_venta.cantidad", "detalle_venta.precio_venta", "detalle_venta.descuento")
            ->where("venta.serie_comprobante", "=", "003")
            ->get();
            foreach ($ventas as $datos) {
                $data[]=array(
                    $datos->nombrepersona,
                    $datos->num_documento,
                    $datos->tipo_comprobante,
                    $datos->serie_comprobante,
                    $datos->num_comprobante,
                    $datos->nombre,
                    $datos->cantidad,
                    $datos->precio_venta,
                    $datos->descuento,

                );
            }

            //$cells->setBorder('solid','none','none','solid');

            //$cells->setNprder
            //$ventas=DetalleVenta::all();
            //$data=[];
            //$sheet->setOrientation('landscape');
            //esta linea es nueva

            /*$datos=DB::table('detalleventa as a')
            ->join('venta as c','a.idventa','=','c.idventa')
            ->select('c.tipo_comprobante, c.serie_comprobante, c.num_comprobante, c.fecha_hora, a.idarticulo','a.cantidad','a.precio_venta','a.descuento')
            ->where('a.idventa = 3');*/




            //array_push($data, array('Nombre1', 'Apellido1' ));
            $sheet->fromArray($data, null, 'A1', false, false);
            //$sheet->fromArray($ventas);
            //$sheet->fromArray($ventas, null, 'A1', false, false);
            });

        })->export('xls');
        /*Excel::create('DOcumento de excel', function($excel) use ($id) {

        $excel->sheet('Libro de excel', function($sheet) use ($id) {

            //$sheet->setOrientation('landscape');
            $promotion = Promotion::find($id);
            $participations = $promotion->participations;
            $sheet->fromArray($participations);

        });

        })->export('xls');*/
    }


}
