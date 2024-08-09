<?php

namespace App\Http\Controllers;

use App\Enums\TypeStatutEnum;
use App\Http\Requests\VisiteurRequest;
use App\Models\User;
use App\Models\Visiteur;
use Illuminate\View\View;

class Visiteurcontroller extends Controller
{

    public function index():View{
        $visiteurs = Visiteur::all();
        return view('visiteurs.index')->with('visiteurs', $visiteurs);
    }

    public function create():View{
        $agents = User::query()->whereRole_id(User::AGENT)->get();
        $locataires = User::query()->whereRole_id(User::LOCATAIRE)->get();
        return view('visiteurs.create')->with([
            'visiteur' => new Visiteur(),
            'agents' => $agents,
            'locataires' => $locataires
        ]);
    }

    public function store(VisiteurRequest $request){

       $visiteur = Visiteur::query()->create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'identite' => $request->identite,
            'locataire_id' => $request->locataire,
            'agent_id' => $request->agent,
            'statut' => TypeStatutEnum::PENDING->value
        ]);

        return to_route('visiteurs.index');

    }

    public function show($id):View
    {
        $visiteur = Visiteur::find($id);
        return view('visiteurs.show')->with('visiteur',$visiteur);
    }

    public function edit($id):View
    {
        $visiteur = Visiteur::find($id);
        return view('visiteurs.edit')->with('visiteur',$visiteur);
    }

    public function update($id, VisiteurRequest $request)
    {
        $visiteur = Visiteur::find($id);
        $visiteur->nom = $request->nom;
        $visiteur->prenom = $request->prenom;
        $visiteur->identite = $request->identite;
        $visiteur->locataire_id = $request->locataire_id;
        $visiteur->agent_id = $request->agent_id;
        $visiteur->update();
        return to_route('visiteurs.index');
    }

    public function  destroy($id)
    {
        $visiteur = Visiteur::find($id);
        $visiteur->delete();
        return to_route('visiteurs.index');
    }

}
