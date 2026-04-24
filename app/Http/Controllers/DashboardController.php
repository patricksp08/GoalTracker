<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $total = auth()->user()->goals()->count();
        $concluidas = auth()->user()->goals()->where('completed', 1)->count();
        $pendentes = $total - $concluidas;
        $percent = $total > 0 ? ($concluidas / $total) * 100 : 0;

        return view('dashboard', compact('total', 'concluidas', 'pendentes', 'percent'));
    }
}
