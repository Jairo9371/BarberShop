<?php

namespace App\Http\Controllers;

use App\Models\horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $horarios['horarios']=horario::paginate(20);
        return view('horarios.index', $horarios);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('horarios.create');
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
        $datosHorario=request()->except('_token');
        horario::insert($datosHorario);    
        return redirect('horarios');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(horario $horario)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(horario $horario)
    {
        //
        return view('horarios.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($horario)
    {
        //
        horario::destroy($horario);
        return redirect('horarios');

    }
}
