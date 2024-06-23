<?php

namespace App\Http\Controllers;

use App\Models\Food;

class BerandaController extends Controller
{
    public function index()
    {
        $popularFoods = Food::with('recipe') // Atau logika popularitas lainnya
            ->limit(3)
            ->get();

        $NewFoods = Food::with('recipe')
            ->orderBy('food_id', 'desc')
            ->limit(10)
            ->get();

        return view('beranda', [
            'popularFoods' => $popularFoods,
            'NewFoods' => $NewFoods,
            'title' => "Beranda"
        ]);
    }
}

