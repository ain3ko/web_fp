<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('resep', ['categories' => $categories]); // Sesuaikan dengan nama view Anda
    }
}
