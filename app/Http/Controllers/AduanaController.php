<?php

namespace App\Http\Controllers;

use App\Models\Aduana;
use Illuminate\Http\Request;

class AduanaController extends Controller
{
    /**
     * Método para la gestión de aduanas
     */
    public function gestion()
    {
        $aduanas = \App\Models\Aduana::all(); // O ->paginate(10) para paginación
        return view('aduanas.gestion', compact('aduanas'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Aduana $aduana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aduana $aduana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aduana $aduana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aduana $aduana)
    {
        //
    }
}