<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Rating;
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
            'recipes' => $recipes,
            'newRecipes' => $newRecipes,
            "title" => "Beranda"
        ]);
        return view('beranda', ['recipes' => $recipes, "title" => "Beranda"]);
    }

    public function show($recipeId)
    {
        $recipe = Recipe::with(['food', 'ingredients', 'steps'])->find($recipeId);

        if (!$recipe) {
            abort(404);
        }

        return view('detail-resep', ['recipe' => $recipe, "title" => "Detail Resep"]);
    }

    public function resep(Request $request)
{
    $query = Recipe::with(['food', 'ingredients', 'steps']);

    // Search Logic
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->whereHas('food', function ($q) use ($search) {
            $q->where('food_name', 'like', '%' . $search . '%');
        });
    }

    // Filter Logic (Category)
    if ($request->has('category')) {
        $category = $request->input('category');
        $query->whereHas('food', function ($q) use ($category) {
            $q->where('category_id', $category);
        });
    }
    // Filter Logic (Default to latest recipes)
    $orderBy = $request->input('orderBy', 'latest');
    if ($orderBy == 'latest') {
        $query->orderBy('recipe_id', 'desc');
    } elseif ($orderBy == 'a-z') {
        $query->join('food', 'recipe.food_id', '=', 'food.food_id')
            ->orderBy('food.food_name', 'asc');
    } elseif ($orderBy == 'z-a') {
        $query->join('food', 'recipe.food_id', '=', 'food.food_id')
            ->orderBy('food.food_name', 'desc');
    }

    $categories = Category::all();

    $recipes = $query->paginate(5);

    return view('resep', [
        'recipes' => $recipes,
        'search' => $request->input('search'),
        'orderBy' => $orderBy,
        'categories' => $categories,
        "title" => "Resep"
    ]);
}
}
