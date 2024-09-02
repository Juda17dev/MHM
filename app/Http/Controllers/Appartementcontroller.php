<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppartementRequest;
use App\Models\Appartement;
use App\Models\Immeuble;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Appartementcontroller extends Controller
{
    public function index():View
    {
        $appartements = Auth::user()->appartements;
            return view('appartements.index')->with('appartements' ,$appartements)->with(['user' => auth()->user()]);

    }

    public function create():View
    {
        $immeubles = Immeuble::query()->where('user_id',Auth::user()->id)->get();
        return view('appartements.create')->with([
            'immeubles' => $immeubles,
            'appartement' => new Appartement()
        ]);
    }

    public function store(AppartementRequest $request)
    {
        $appartement = new Appartement();
        $appartement->libelle = $request->libelle;
        $appartement->immeuble_id = $request->immeuble;
        $appartement->save();
        return to_route('appartements.index');
    }

    public function show(Appartement $appartement):View
    {
        return view('appartements.show')->with([
            'appartement' => $appartement,
        ]);
    }

    public function edit(Appartement $appartement):View
    {
        $immeubles = Immeuble::all();
        return view('appartements.edit')->with([
            'appartement' => $appartement,
            'immeubles' => $immeubles
        ]);
    }

    public function update(AppartementRequest $request, Appartement $appartement)
    {
        $appartement->libelle = $request->libelle;
        $appartement->immeuble_id = $request->immeuble;
        $appartement->update();
        return redirect('appartements');
    }

    public function destroy(Appartement $appartement)
    {
        $appartement->delete();
        return to_route('appartements.index');
    }
}
