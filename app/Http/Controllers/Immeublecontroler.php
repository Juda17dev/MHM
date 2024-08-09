<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImmeubleRequest;
use App\Models\Immeuble;
use Illuminate\View\View;

class Immeublecontroler extends Controller
{
    public function index():View
    {
        $immeubles = Immeuble::all();
        return view('immeubles.index')->with('immeubles' ,$immeubles);
    }

    public function create():View
    {
        return view('immeubles.create')->with('immeuble', new Immeuble());
    }

    public function store(ImmeubleRequest $request)
    {
        $immeuble = Immeuble::query()->create([
            'libelle' => $request->libelle,
            'adresse' => $request->adresse,
            'user_id' => 1,
        ]);
        return to_route('immeubles.index');
    }

    public function show($id):View
    {
        $immeuble = Immeuble::find($id);
        return view('immeubles.show')->with('immeuble',$immeuble);
    }

    public function edit($id):View
    {
        $immeuble = Immeuble::find($id);
        return view('immeubles.edit')->with('immeuble',$immeuble);
    }

    public function update($id, ImmeubleRequest $request)
    {
        $immmeuble = Immeuble::find($id);
        $immmeuble->libelle = $request->libelle;
        $immmeuble->adresse = $request->adresse;
        $immmeuble->update();
        return to_route('immeubles.index');
    }

    public function  destroy($id)
    {
        $immeuble = Immeuble::find($id);
        $immeuble->delete();
        return redirect('immeubles');
    }
}
