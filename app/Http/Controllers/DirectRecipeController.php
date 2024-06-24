<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Food;
use App\Models\Ingredient;
use App\Models\Step;

use Illuminate\Http\Request;

class DirectRecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with(['food', 'ingredients', 'steps'])
            ->take(3)
            ->get();
            
        $newRecipes = Recipe::with(['food', 'ingredients', 'steps'])
            ->orderBy('recipe_id', 'desc') 
            ->take(10) 
            ->get();

        return view('beranda', [
            'recipes' => $recipes, // All recipes
            'newRecipes' => $newRecipes, // Latest recipes
            "title" => "Beranda"
        ]);
        return view('beranda', ['recipes' => $recipes, "title" => "Beranda"]);
    }

    public function show($recipeId)
    {
        $recipe = Recipe::with(['food', 'ingredients', 'steps'])->find($recipeId);
        
        if (!$recipe) {
            abort(404); // Handle if the recipe is not found
        }

        return view('detail-resep', ['recipe' => $recipe, "title" => "Detail Resep"]);
    }
}
