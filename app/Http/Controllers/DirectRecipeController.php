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
    $recipes = Recipe::with(['food.category', 'ingredients', 'steps'])
        ->take(3)
        ->get();

    foreach ($recipes as $recipe) {
        $averageRating = $recipe->ratings->avg('rating');
        $recipe->averageRating = number_format($averageRating, 1);
    }

    $newRecipes = Recipe::with(['food.category', 'ingredients', 'steps'])
        ->orderBy('recipe_id', 'desc')
        ->take(10)
        ->get();

    foreach ($newRecipes as $recipe) {
        $newaverageRating = $recipe->ratings->avg('rating');
        $recipe->newaverageRating = number_format($newaverageRating, 1);
    }

    return view('beranda', [
        'recipes' => $recipes,
        'newRecipes' => $newRecipes,
        "title" => "Beranda"
    ]);
}

    public function show($recipeId)
    {

    $recipe = Recipe::with(['food.category', 'ingredients', 'steps', 'ratings'])->find($recipeId);

    if (!$recipe) {
        abort(404);
    }

    $averageRating = $recipe->ratings()->avg('rating');
    $recipe->averageRating = $averageRating ? number_format($averageRating, 1) : '0.0';

    return view('detail-resep', ['recipe' => $recipe, "title" => "Detail Resep"]);

    }

    public function resep(Request $request)
    {
    $query = Recipe::with(['food.category', 'ingredients', 'steps']);

    if ($request->has('search')) {
        $searchTerm = strtolower($request->input('search'));

        if (str_contains($searchTerm, 'terbaik')) {
            $query->orderByDesc(
                Rating::select('rating')
                    ->whereColumn('recipe_id', 'recipe.recipe_id')
                    ->orderBy('rating', 'desc')
                    ->limit(1)
            );
        } elseif (str_contains($searchTerm, 'terbaru')) {
            $query->orderBy('recipe_id', 'desc');
        } else {
            $query->where(function ($q) use ($searchTerm) {
                $q->whereHas('food', function ($foodQuery) use ($searchTerm) {
                    $foodQuery->where('food_name', 'like', '%' . $searchTerm . '%');
                })->orWhereHas('food.category', function ($categoryQuery) use ($searchTerm) {
                    $categoryQuery->where('category_name', 'like', '%' . $searchTerm . '%');
                });
            });
        }
    }
    if ($request->has('category')) {
        $category = $request->input('category');
        $query->whereHas('food', function ($q) use ($category) {
            $q->where('category_id', $category);
        });
    }

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
