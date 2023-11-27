<?php

use App\Http\Controllers\BienController;
use App\Http\Controllers\BienvenuController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Models\bien;
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

Route::get('/', [BienvenuController::class, 'index']);

// Route::get('/ajout/bien', [BienController::class, 'index'])->name('admin.ajoutbien');
Route::get('/dashboard/admin/listes', [BienController::class, 'index']);

Route::post("/dashboard/admin/ajouterBien",[BienController::class,"store"]);

// Route::get('/detail/produit', [BienController::class, 'create']);
Route::get('/ajout/bien', [BienController::class, 'create'])->name('admin.ajoutbien');

Route::get('/dashboard', [UsersController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/admin', [BienController::class, 'indexfirst'])->middleware(['admin'])->name('admin.dashboard');

Route::middleware('admin')->group(function () {
    Route::get('/ajout/bien', [BienController::class, 'index'])->name('admin.ajoutbien');
    Route::get('/detail/produit/{id}', [BienController::class, 'create']);
    Route::post('/savebien', [BienController::class, 'store']);
    Route::post('/update/bien/{id}', [BienController::class, 'update']);
    Route::get('/commentaire/admin/suppression/{commentaire}', [BienController::class, 'deletes']);

    Route::get('/back', function () {
        return redirect('/dashboard/admin');
    });
    Route::get('/delete/produit/{id}', [BienController::class, 'delete']);
    Route::get('/modifier/produit/{id}', [BienController::class, 'edit']);
    // ajout

    Route::get('/ajoutImage/{bien}',[BienController::class,'ajoutImage']);
    Route::post('/ajouterImage/{bien}',[BienController::class,'ajouterImage']);
});

Route::middleware('auth')->group(function () {

    Route::get('/voir/details/{id}', [BienController::class, 'showdetailsBien']);
    Route::post('/commentaire/modif/{commentaire}', [CommentaireController::class, 'update']);
    Route::get('/commentaire/modifier/{iduser}/{commentaire}', [CommentaireController::class, 'edit']);
    Route::get('/commentaire/suppression/{iduser}/{commentaire}', [CommentaireController::class, 'destroy']);
    Route::get('/details/commentaires/{id1}/{id2}', [CommentaireController::class, 'show']);
    Route::post('/commentaire/{id1}/{id2}', [CommentaireController::class, 'store']);
    Route::get('/commentaire/{id}', [CommentaireController::class, 'create']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
