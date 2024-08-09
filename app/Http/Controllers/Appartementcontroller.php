<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppartementRequest;
use App\Models\Appartement;
use App\Models\Immeuble;
use Illuminate\View\View;

class Appartementcontroller extends Controller
{
    public function index():View
    {
        $appartements = Appartement::all();
        return view('appartements.index')->with('appartements' ,$appartements);
    }

    public function create():View
    {
        $immeubles = Immeuble::all();
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

    public function show($id):View
    {
        $appartement = Appartement::find($id);
        $immeubles = Immeuble::all();
        return view('appartements.edit')->with([
            'appartement' => $appartement,
            'immeubles' => $immeubles
        ]);
    }
    
    public function edit($id):View
    {
        $appartement = Appartement::find($id);
        $immeubles = Immeuble::all();
        return view('appartements.edit')->with([
            'appartement' => $appartement,
            'immeubles' => $immeubles
        ]);
    }
    
    public function update($id, AppartementRequest $request)
    {
        $appartement = Appartement::find($id);
        $appartement->libelle = $request->libelle;
        $appartement->immeuble_id = $request->immeuble;
        $appartement->update();
        return redirect('appartements');
    }

    public function  destroy($id)
    {
        $appartement = Appartement::find($id);
        $appartement->delete();
        return to_route('appartements.index');
    }
}
