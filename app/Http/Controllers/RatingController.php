<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\Recipe;
use App\Models\Rating; 
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function store(Request $request, $recipeId)
    {
        $validatedData = $request->validate([
            'rating' => 'required|numeric|between:1,5',
        ]);

        $recipe = Recipe::findOrFail($recipeId);

    // Check if a rating already exists for the recipe
    $rating = $recipe->rating; // Load existing rating if any

    if ($rating) {
        // Update existing rating
        $rating->rating = $validatedData['rating'];
        $rating->save();
    } else {
        // Create a new rating
        $rating = Rating::create([
            'recipe_id' => $recipeId,
            'rating' => $validatedData['rating']
        ]);
        
        // Associate the rating with the recipe (assign the rating_id)
        $recipe->rating_id = $rating->id; // Only assign the ID
        $recipe->save();
    }

    return redirect()->back()->with('success', 'Rating berhasil disimpan!');
    }

}
