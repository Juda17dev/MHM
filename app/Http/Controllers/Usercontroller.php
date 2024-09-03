<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Immeuble;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class Usercontroller extends Controller
{
    public function index():View
    {
        $users = User::query()->whereNot('role_id', User::PROPRIETAIRE)->get();
        return view('users.index')->with('users' ,$users);
    }

    public function create(): View
    {
        $user = Auth::user();
        $immeubles = Immeuble::query()->where('user_id', $user->id)->get();
        $appartements = Appartement::query()
            ->whereIn('immeuble_id', $immeubles->pluck('id'))
            ->get()
            ->groupBy('immeuble_id');
        $roles = DB::table('roles')->whereNotIn('id', [3])->get();

        // Returning the data as a JSON response
        if (request()->ajax()) {
            return response()->json([
                'roles' => $roles,
                'immeubles' => $immeubles,
                'appartements' => $appartements
            ]);
        }

        return view('users.create')->with([
            'roles' => $roles,
            'immeubles' => $immeubles,
            'appartements' => $appartements
        ]);
    }


    // public function create():View
    // {
    //     $user = Auth::user();
    //     $immeubles = Immeuble::query()->where('proprietaire_id', $user->id);
    //     $appartements = Appartement::query()->where('', $user->id);
    //     $roles = DB::table('roles')->whereNotIn('id', [3])->get();
    //     return view('users.create')->with('roles', $roles);
    // }

    public function store(Request $request)
    {
        $user = User::query()->create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
            'appartement_id'  => $request->appartement,
            'immeuble_id' => $request->immeuble
        ]);
        return redirect('users');
    }

    public function show(User $user):View{
        return view('users.show')->with('user', $user);
    }


    public function profile():View{
        $user = Auth::user();
        return view('users.profile')->with('user', $user);
    }


    // public function edit($id):View
    // {
    //     $user = User::find($id);
    //     return view('users.edit')->with('user',$user);
    // }

    // public function update($id, Request $request)
    // {
    //     $user = User::find($id);
    //     $user->nom = $request->nom;
    //     $user->prenom = $request->prenom;
    //     $user->email = $request->email;
    //     $user->tel = $request->tel;
    //     $user->password => $request->password;
    //     $user->update();
    //     return redirect('users');
    // }

    // public function  destroy($id)
    // {
    //     $user = User::find($id);
    //     $user->delete();
    //     return redirect('users');
    // }






    public function listeLocataires():View{
        $user = Auth::user();
        $locataires = User::locataires()->where('immeuble_id', $user->immeuble_id);
        return view('locataires.liste')->with('locataires',$locataires);
    }


    public function listeAgents():View{
        $user = Auth::user();
        $agents = User::agents()->where('immeuble_id', $user->immeuble_id);
        return view('agents.liste')->with('agents', $agents);
    }
}
