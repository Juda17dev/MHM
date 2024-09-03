<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LocataireController extends Controller
{
    public function index():View{
        return view('locataires.index')->with([
            'locataires' => User::locataires()
        ]);
    }



}
