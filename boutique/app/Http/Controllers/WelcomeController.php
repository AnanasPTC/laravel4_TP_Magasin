<?php

namespace App\Http\Controllers;

use App\Models\Article;

class WelcomeController extends Controller
{
    public function index()
    {
        //Ordre alphabétique
        $articles = Article::orderBy('nom', 'asc')->get();

        return view('welcome', compact('articles'));
    }
}
