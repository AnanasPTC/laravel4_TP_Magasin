<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('dashboard_admin', compact('articles'));
    }
}
