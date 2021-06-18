<?php

namespace App\Http\Controllers;

use App\Models\detalle_cita;
use App\Models\cita;
use App\Models\tarifa;
use Illuminate\Http\Request;

class DetalleCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $detallecitas['detallecitas']=detalle_cita::join('citas','detalle_citas.id_cita','=','citas.id')
        ->join('clientes','citas.id_cliente','=', 'clientes.id')
        ->join('tarifas','detalle_citas.id_tarifa','=','tarifas.id')
        ->paginate(5, array('detalle_citas.id','clientes.nombre as cliente','tarifas.tipo','tarifas.precio','detalle_citas.subtotal'));
        
        return view('detalle_citas.index', $detallecitas);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $citas['citas']=cita::join('clientes','citas.id_cliente','=', 'clientes.id')->paginate(50); 
        
        $tarifas['tarifas']=tarifa::paginate(50);

        return view('detalle_citas.create')->with($citas)->with($tarifas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        /*echo ("STORE DETALLE CITAS");
        echo var_dump($request->data);*/


        $datosDetalleCita=request()->except('_token');
        detalle_cita::insert($datosDetalleCita);    
        //1. Ir a traer el valor del total de venta
        $cita = cita::select('citas.id','citas.total')
        ->findOrFail($datosDetalleCita['id_cita']);
        //2. Sumarle al total de venta el nuevo subtotal del detalle
        $nuevoTotal = $datosDetalleCita['subtotal'] + $cita['total'];
        //  echo $nuevoTotal;
        //3. Guardar el nuevo total en la base de datos
        $update_cita = cita::find($datosDetalleCita['id_cita']);
        $update_cita->total = $nuevoTotal;
        $update_cita->timestamps = false;
        $update_cita->save();  
        //return response()->json($nuevoTotal);

       


        return redirect('citas/' . $datosDetalleCita['id_cita'] . '/edit');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detalle_cita  $detalle_cita
     * @return \Illuminate\Http\Response
     */
    public function show(detalle_cita $detalle_cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detalle_cita  $detalle_cita
     * @return \Illuminate\Http\Response
     */
    public function edit(detalle_cita $detalle_cita)
    {
        //
        return view('detalle_citas.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detalle_cita  $detalle_cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detalle_cita $detalle_cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detalle_cita  $detalle_cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $detalle_cita)
    {
        //

        $datosrequest = request()->all();
        detalle_cita::destroy($detalle_cita);
        //echo var_dump($detalle_cita);
        return redirect('citas/'. $datosrequest['id_cita'] .'/edit' );

         
        $nuevacantidad = $detalle_cita['subtotal'] - $datosrequest['total'];
        //  echo $nuevoTotal;
        //3. Guardar el nuevo total en la base de datos
        $update_cita = cita::find($detalle_cita['id_cita']);
        $update_cita->total = $nuevacantidad;
        $update_cita->timestamps = false;
        $update_cita->save();  
        
     
    }
}
