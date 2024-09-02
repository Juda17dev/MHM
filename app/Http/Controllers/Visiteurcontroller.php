<?php

namespace App\Http\Controllers;

use App\Enums\TypeStatutEnum;
use App\Http\Requests\VisiteurRequest;
use App\Models\User;
use App\Models\Visiteur;
use App\Notifications\VisiteurNotification;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
       $visiteur = Visiteur::query()->create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'identite' => $request->identite,
            'locataire_id' => $request->locataire,
            'agent_id' => $request->agent,
            'statut' => TypeStatutEnum::PENDING->value
        ]);

        if ($user->role_id == User::PROPRIETAIRE) {
            return to_route('visiteurs.index');
        } elseif($user->role_id == User::LOCATAIRE) {
            return to_route('visites.liste');
            $agent->notify(new VisiteurNotification($visiteur));
        } elseif ($user->role_id == User::AGENT) {
            return to_route('visiteurs.liste');
            $locataire->notify(new VisiteurNotification($visiteur));
        }
        

    }

    public function show(Visiteur $visiteur):View
    {
        return view('visiteurs.show')->with('visiteur',$visiteur);
    }

    public function edit(Visiteur $visiteur):View
    {
        return view('visiteurs.edit')->with('visiteur',$visiteur);
    }

    public function update(VisiteurRequest $request, Visiteur $visiteur)
    {

        $user = Auth::user();

        $visiteur->nom = $request->nom;
        $visiteur->prenom = $request->prenom;
        $visiteur->identite = $request->identite;
        if ($user->role_id == 2) {
            $visiteur->locataire_id = $user->id;
            $visiteur->agent_id = $request->agent_id;
        } elseif($user->role_id == 1) {
            $visiteur->locataire_id = $request->locataire_id;
            $visiteur->agent_id = $user->id;
        }
        
        $visiteur->update();
        return to_route('visiteurs.index');
    }

    public function  destroy(Visiteur $visiteur)
    {
        $visiteur->delete();
        return to_route('visiteurs.index');
    }


    public function listeVisiteursParAgent():View{
        $visiteurs = Visiteur::query()->where('agent_id',Auth::user()->id)->get();
        return view('visiteurs.liste_visiteurs')->with('visiteurs', $visiteurs);
    }


    public function listeVisitesParLocataire():View{
        $visites = Visiteur::query()->where('locataire_id',Auth::user()->id)->get();
        return view('visiteurs.liste_visites')->with('visites', $visites);
    }

}
