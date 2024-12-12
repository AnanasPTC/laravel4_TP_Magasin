<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $commandes = Auth::user()->commandes()->with('articles')->get();

        return view('dashboard', compact('commandes'));
    }
}
