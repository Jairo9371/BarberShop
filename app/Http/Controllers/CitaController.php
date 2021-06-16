<?php

namespace App\Http\Controllers;

use App\Models\cita;
use App\Models\cliente;
use App\Models\horario;
use App\Models\barbero;
use App\Models\detalle_cita;
use App\Models\tarifa;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $citas['citas']=cita::join('clientes','citas.id_cliente','=', 'clientes.id')
        ->join('barberos','citas.id_barbero','=', 'barberos.id') 
        ->join('horarios','citas.id_horario','=','horarios.id')
        ->orderBy('id','desc')
        ->paginate(5, array('citas.id','citas.fecha','clientes.nombre as nombre_cliente','hora','barberos.nombre as nombre_barbero','citas.total'));
        
     
        
        $clientes['clientes']=cliente::paginate(50);
        $horarios['horarios']=horario::paginate(50);    
        $barberos['barberos']=barbero::paginate(50);
    

        return view('citas.index')->with($citas)->with($clientes)->with($horarios)->with($barberos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes['clientes']=cliente::paginate(10);
        $horarios['horarios']=horario::paginate(10);
        $barberos['barberos']=barbero::paginate(10);


        return view('citas.create')->with($clientes)->with($horarios)->with($barberos);  
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
        $datosCita=request()->except('_token');
        //$nombre= $request ->d;

        cita::insert($datosCita);  
        
        
        return redirect('/citas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit($cita)
    {
        //
        $datos_cita = cita::join('clientes', 'citas.id_cliente', 'clientes.id')
        ->join('horarios','citas.id_horario','=','horarios.id')
        ->join('barberos','citas.id_barbero', 'barberos.id')
        ->orderBy('citas.id', 'asc')
        ->select('citas.id','citas.fecha','clientes.nombre as nombre_cliente','hora','barberos.nombre as nombre_barbero','citas.total')
        ->findOrFail($cita);
        
        $tarifas = tarifa::paginate(50);

        $detalle_citas = detalle_cita::join('citas','detalle_citas.id_cita', 'citas.id')
        ->join('clientes','citas.id_cliente', 'clientes.id')
        ->join('tarifas','detalle_citas.id_tarifa', 'tarifas.id')
        ->orderBy('detalle_citas.id', 'asc')
        ->select('clientes.nombre','tarifas.tipo','tarifas.precio','detalle_citas.subtotal')
        ->where('id_cita', $cita)
        ->paginate(50);

 

        //return response()->json($cita);
        return view('citas.edit', compact('datos_cita','tarifas','detalle_citas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cita $cita)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($cita)
    {
        echo "CITAS";
        cita::destroy($cita);
        return redirect('citas');
    }
}
