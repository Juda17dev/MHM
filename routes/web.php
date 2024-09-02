<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\Appartementcontroller;
use App\Http\Controllers\Immeublecontroler;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Proprietairecontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Visiteurcontroller;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 Route::get('test', function () {
     return view('test');
 });

// Route::get('/', function() {
//     return view('index');
// });

Route::get('/visiteurs/liste des visiteurs', [Visiteurcontroller::class, 'listeVisiteursParAgent'])->name('visiteurs.liste');


Route::get('/visites/liste des visites', [Visiteurcontroller::class, 'listeVisitesParLocataire'])->name('visites.liste');


Route::get('/locataires/liste', [Usercontroller::class, 'listeLocataires'])->name('users.locataires');


Route::get('/agents/liste', [Usercontroller::class, 'listeAgents'])->name('users.agents');


Route:: resource('agents', AgentController::class);


Route :: resource('locataires', LocataireController::class);


Route :: resource('proprietaires', Proprietairecontroller::class);


Route:: resource('users', Usercontroller::class);


Route:: resource('appartements',Appartementcontroller::class);


Route:: resource('immeubles',Immeublecontroler::class);


Route:: resource('visiteurs', Visiteurcontroller::class);


Route::get('/', function () {
    return view('auth.login');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
