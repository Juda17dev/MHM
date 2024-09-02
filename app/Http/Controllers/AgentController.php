<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visiteur;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AgentController extends Controller
{
    public function index():View{
        $nbrvisiteur = Visiteur::query()->where('agent_id',Auth::user()->id)->count();
        $nbrlocataire = User::query()->where('role_id',2)->count();
        return view('agents.index')->with([
            'nbrlocataire' => $nbrlocataire,
            'nbrvisiteur' => $nbrvisiteur
        ]);
    }

    // public function index():View{
    //     $nbrimmeuble = Immeuble::query()->where('user_id', Auth::user()->id)->count();
    //     $nbragent = User::query()->where('role_id',1)->count();

    //     $nbrvisiteur = Visiteur::query()->count();
    //     return view('proprietaires.index')->with([
    //         'nbrimmeuble' => $nbrimmeuble,
    //         'nbragent' => $nbragent,
    //         'nbrlocataire' => $nbrlocataire,
    //
    //     ]);
    // }
}










































































// public function index():View{
//     $nbrAccepted = $this->getAcceptedVisites(2023);
//     $nbrRefused = $this->getRefusedVisites(2023);
//     $nbrvisiteur = Visiteur::query()->where('agent_id',Auth::user()->id)->count();
//     $nbrlocataire = User::query()->where('role_id',2)->count();
//     return view('agents.index')->with([
//         'nbrlocataire' => $nbrlocataire,
//         'nbrvisiteur' => $nbrvisiteur,
//         'nbrAccepterParMois' => $nbrAccepted,
//         'nbrRefuserParMois' => $nbrRefused
//     ]);

// }


// public function getAcceptedVisites($year){
//     $nbrAccepted = Visiteur::query()->where('statut', 'Accepter')->whereYear('created_at', $year)->get();
//     $parMois = $nbrAccepted->groupBy(function ($accepted){
//         return Carbon::parse($accepted->created_at)->translatedFormat('F');
//     })->map(function ($row){
//         return $row->count();
//     });

//     $data = [];
//     for($m = 1; $m <= 12; $m++){
//         $data[Carbon::create()->month($m)->translatedFormat('F')]=0;
//     }
//     foreach ($parMois as $mois => $count) {
//         $data[$mois] = $count;
//     }

//     return $data;
// }



// public function getRefusedVisites($year){
//     $nbrRefused = Visiteur::query()->where('statut', 'Refuser')->whereYear('created_at', $year)->get();
//     $parMois = $nbrRefused->groupBy(function ($refused){
//         return Carbon::parse($refused->created_at)->translatedFormat('F');
//     })->map(function ($row){
//         return $row->count();
//     });

//     $data = [];
//     for($m = 1; $m <= 12; $m++){
//         $data[Carbon::create()->month($m)->translatedFormat('F')]=0;
//     }
//     foreach ($parMois as $mois => $count) {
//         $data[$mois] = $count;
//     }

//     return $data;
// }
