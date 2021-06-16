<?php

namespace App\Http\Controllers;

use App\Models\ganancia;
use Illuminate\Http\Request;

class GananciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ganancia['ganancias']=ganancia::
        orderBy('id','desc')
        ->paginate(50);

        return view('ganancias.index', $ganancia);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ganancia  $ganancia
     * @return \Illuminate\Http\Response
     */
    public function show(ganancia $ganancia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ganancia  $ganancia
     * @return \Illuminate\Http\Response
     */
    public function edit(ganancia $ganancia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ganancia  $ganancia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ganancia $ganancia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ganancia  $ganancia
     * @return \Illuminate\Http\Response
     */
    public function destroy(ganancia $ganancia)
    {
        //
    }
}
