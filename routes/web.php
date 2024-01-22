<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ElecteurController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ProgrammeLikeController;
use App\Http\Controllers\SecteurController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function (){
    Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

});
Route::controller(AuthController::class)->group(function (){
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/login', 'doLogin');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/register','doRegister');
});


/// route to Candidats
Route::controller(CandidatController::class)->group(function (){
    Route::get('/candidats','index')->name('candidat');
    Route::middleware('admin')->group(function (){
        Route::get('/addCandidats','create')->name('addCandidat');
        Route::post('/addCandidats', 'store')->name('storeCandidat');
        Route::get('/{candidat}/edit', 'edit')->name('editCandidat');
        Route::post('/{candidat}/edit', 'update')->name('updateCandidat');
        Route::delete('/delete-candidat/{candidat}', 'destroy')->name('delete.candidat');
    });
});

/// route to electeurs
Route::controller(ElecteurController::class)->group(function (){
    Route::get('/electeurs','index')->name('electeur');
    Route::middleware('admin')->group(function (){
        Route::get('/addElecteurs', 'create')->name('addElecteur');
        Route::post('/addElecteurs', 'store')->name('storeElecteur');
        Route::get('/edit/{electeur}', 'edit')->name('editElecteur');
        Route::post('/edit/{electeur}', 'update');
        Route::delete('/delete-electeur/{electeur}', 'destroy')->name('delete.electeur');

    });
});

/// route to programmes
Route::controller(ProgrammeController::class)->group(function (){
    Route::get('/programmes', 'index')->name('programme');
    Route::middleware('admin')->group(function (){
        Route::get('/addProgrammes', 'create')->name('addProgramme');
        Route::post('/addProgrammes', 'store')->name('storeProgramme');
        Route::delete('/delete-programme/{programme}', 'destroy')->name('delete.programme');

        Route::get('/edit-programme/{programme}', 'edit')->name('edit-programme');
        Route::post('/edit-programme/{programme}', 'update');
    });
});

/// route to secteurs
Route::get('/secteurs', [SecteurController::class, 'index'])->name('secteur');
Route::middleware('auth')->controller(SecteurController::class) ->group(function (){
    Route::middleware('admin')->group(function (){
        Route::post('/addSecteurs', 'store')->name('storeSecteur');
        Route::get('/addSecteurs','create')->name('addSecteur');

        Route::get('/edit-secteur/{secteur}', 'edit')->name('edit-secteur');
        Route::post('/edit-secteur/{secteur}', 'update');

        Route::delete('/delete-secteur/{secteur}', 'destroy')->name('delete.secteur');

    });
});



Route::middleware('auth')->group(function (){
    Route::post('/programme/{programme}/like', [ProgrammeLikeController::class, 'like'] )
        ->name('programme.like');
    Route::post('programmes/{programme}/unlike', [ProgrammeLikeController::class, 'unlike'])
        ->name('programme.unlike');
});
