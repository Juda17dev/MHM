<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncidentRequest;
use App\Models\Incident;
use App\Models\Visiteur;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IncidentController extends Controller
{
    public function index():View{
        $user = Auth::user();
        $incidents = Incident::query()->where('immeuble_id',$user->immeuble_id)->get();
        return view('incidents.index')->with('incidents', $incidents);
    }

    public function create():View{
        return view('incidents.create')->with('incident', new Visiteur());
    }

    public function store(IncidentRequest $request){
        $incident = Incident::query()->create([
            'objet' => $request->objet,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'immeuble_id' => Auth::user()->immeuble_id
        ]);
        return to_route('incidents.index');
    }

    public function show(Incident $incident):View{
        return view('incidents.show')->with('incident', $incident);
    }
}
