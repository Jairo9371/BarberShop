<?php

namespace App\Http\Controllers;

use App\Models\tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tarifas['tarifas']=tarifa::paginate(5);
        return view('tarifas.index', $tarifas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tarifas.create');
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
        $datosTarifa=request()->except('_token');
        tarifa::insert($datosTarifa);    
        return redirect('tarifas');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function show(tarifa $tarifa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $tarifa= tarifa::findOrFail($id);
        return view('tarifas.edit', compact('tarifa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $tarifa= tarifa::findOrFail($id);
        $tarifa->tipo=$request->input('tipo');
        $tarifa->precio=$request->input('precio');
        $tarifa->timestamps=false;
        
        $tarifa->save();
        return redirect('/tarifas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function destroy($tarifa)
    {
        //

         tarifa::destroy($tarifa);
        return redirect('tarifas');
    }
}
