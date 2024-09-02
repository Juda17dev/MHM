<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImmeubleRequest;
use App\Models\Appartement;
use App\Models\Immeuble;
use App\Models\User;
use App\Models\Visiteur;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Immeublecontroler extends Controller
{
    public function index():View
    {
        $immeubles = Immeuble::query()->where('user_id',Auth::user()->id)->get();
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
            'user_id' => Auth::user()->id
        ]);
        return to_route('immeubles.index');
    }

    public function show(Immeuble $immeuble):View
    {
        $nbrappartement = Appartement::query()->where('immeuble_id', $immeuble->id)->count();
        $nbragent = User::query()->where('role_id',User::AGENT)->where('immeuble_id', $immeuble->id)->count();
        $nbrlocataire = User::query()->where('role_id',User::LOCATAIRE)->where('immeuble_id', $immeuble->id)->count();
        // $nbrvisiteur = Visiteur::query()->where(, $immeuble->id)->count();
        $agents = User::query()->where('role_id', User::AGENT)->where('immeuble_id', $immeuble->id)->get();
        $appartements = Appartement::query()->where('immeuble_id', $immeuble->id)->get();
        return view('immeubles.show')->with([
            'immeuble' => $immeuble,
            'appartements' => $appartements,
            'agents' => $agents,
            'nbrappartement' => $nbrappartement,
            'nbragent' => $nbragent,
            'nbrlocataire' => $nbrlocataire,
            // 'nbrvisiteur' => $nbrvisiteur,
        ]);
    }

    public function edit($id):View
    {
        $immeuble = Immeuble::find($id);
        return view('immeubles.edit')->with('immeuble',$immeuble);
    }

    public function update(ImmeubleRequest $request, Immeuble $immeuble)
    {
        $immeuble->libelle = $request->libelle;
        $immeuble->adresse = $request->adresse;
        $immeuble->update();
        return to_route('immeubles.index');
    }

    public function  destroy(Immeuble $immeuble)
    {
        if( $immeuble->appartements->isNotEmpty()){
            return back();
        }
        $immeuble->delete();
        return to_route('immeubles.index');
    }
}
