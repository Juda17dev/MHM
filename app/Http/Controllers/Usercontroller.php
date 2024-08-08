<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Usercontroller extends Controller
{
    public function index():View
    {
        $users = User::all();
        return view('users.index')->with('users' ,$users);
    }

    public function create():View
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->password = $request->password;
        $user->role = $request->role;
        return redirect('users');
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
    //     $user->role = $request->role;
    //     $user->update();
    //     return redirect('users');
    // }

    // public function  delete($id)
    // {
    //     $user = User::find($id);
    //     $user->delete();
    //     return redirect('users');
    // }
}
