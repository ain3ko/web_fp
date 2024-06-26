<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\Recipe;
use App\Models\Rating;
use App\Models\Category;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'rating' => 'required|numeric|between:1,5',
        'recipe_id' => 'required|exists:recipe,recipe_id',
    ]);

    // Create a new rating and associate it with the recipe
    Rating::create([
        'recipe_id' => $validatedData['recipe_id'],
        'rating' => $validatedData['rating']
    ]);

    // Calculate and update average rating (optional)
    $recipe = Recipe::findOrFail($validatedData['recipe_id']);
    $averageRating = $recipe->ratings()->avg('rating');
    $recipe->rating = $averageRating;
    $recipe->save();

    return redirect()->back()->with('success', 'Rating berhasil disimpan!');
}


}
