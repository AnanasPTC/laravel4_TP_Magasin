<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

});

//Utilisateur
Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard')->middleware(['auth']);

//Admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'admin']);

Route::get('/dashboard', function () {
    if (Auth::check()) {
        return Auth::user()->is_admin 
            ? redirect()->route('admin.dashboard') 
            : redirect()->route('user.dashboard');
    }

    return redirect('/'); // Redirige vers la page d'accueil si non connecté
})->name('dashboard');

Route::resource('articles', ArticleController::class)->except(['show']);

Route::get('/commande/create/{id}', [CommandeController::class, 'create'])->name('commande.create');

Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');

Route::resource('commande', CommandeController::class)->except(['create']);







