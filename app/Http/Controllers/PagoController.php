<?php

namespace App\Http\Controllers;

use App\Models\pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagos['pagos']=pago::paginate(5);
        return view('pagos.index', $pagos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pagos.create');

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
        $datosPago=request()->except('_token');
        pago::insert($datosPago);    
        return redirect('/pagos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(pago $pago)
    {
        //
    }
}
