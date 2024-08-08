<?php

namespace App\Http\Controllers;

use App\Models\Visiteurs;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VisiteursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visiteurs = Visiteurs::all();
        return View('visiteurs.index')->with('visiteurs', $visiteurs);
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
    public function show(Visiteurs $visiteurs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visiteurs $visiteurs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visiteurs $visiteurs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visiteurs $visiteurs)
    {
        //
    }
}
