<?php

namespace App\Http\Controllers;

use App\Models\Immeuble;
use App\Models\User;
use App\Models\Visiteur;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class Proprietairecontroller extends Controller
{
    public function index():View{
        // $visiteur = User;
        $proprietaire = Auth::user();
        $nbrAccepted = $this->getAcceptedVisites(2024);
        $nbrRefused = $this->getRefusedVisites(2024);
        $nbrimmeuble = Immeuble::query()->where('user_id', Auth::user()->id)->count();
        $nbragent = User::query()->where('role_id',1)->count();
        $nbrlocataire = User::query()->where('role_id',2)->count();
        $nbrvisiteur = Visiteur::query()->count();
        return view('proprietaires.index')->with([
            'nbrimmeuble' => $nbrimmeuble,
            'nbragent' => $nbragent,
            'nbrlocataire' => $nbrlocataire,
            'nbrvisiteur' => $nbrvisiteur,
            'nbrAccepterParMois' => $nbrAccepted,
            'nbrRefuserParMois' => $nbrRefused
        ]);
    }
    // >whereProprietaire(User)-

    public function getAcceptedVisites($year){
        $nbrAccepted = Visiteur::query()
        ->whereRelation('locataire.immeubles', function($builder){
            $builder->where('user_id',auth()->id());
        })
        ->where('statut', 'Accepter')->whereYear('created_at', $year)->get();
        $parMois = $nbrAccepted->groupBy(function ($accepted){
            return Carbon::parse($accepted->created_at)->translatedFormat('F');
        })->map(function ($row){
            return $row->count();
        });

        $data = [];
        for($m = 1; $m <= 12; $m++){
            $data[Carbon::create()->month($m)->translatedFormat('F')]=0;
        }
        foreach ($parMois as $mois => $count) {
            $data[$mois] = $count;
        }

        return $data;
    }



    public function getRefusedVisites($year){
        $nbrRefused = Visiteur::query()
        // ->whereRelation('locataire.immeubles', function($builder){
        //     $builder->where('user_id',auth()->id());
        // })
        ->where('statut', 'Refuser')->whereYear('created_at', $year)->get();
        $parMois = $nbrRefused->groupBy(function ($refused){
            return Carbon::parse($refused->created_at)->translatedFormat('F');
        })->map(function ($row){
            return $row->count();
        });

        $data = [];
        for($m = 1; $m <= 12; $m++){
            $data[Carbon::create()->month($m)->translatedFormat('F')]=0;
        }
        foreach ($parMois as $mois => $count) {
            $data[$mois] = $count;
        }

        return $data;
    }





    public function create():View{
        return view('proprietaires.create');
    }

    public function store(Request $request){
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'role_id' => User::PROPRIETAIRE,
            'immeuble_id' => null,
            'appartement_id' => null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('immeubles')->with('user',$user);
    }
}
