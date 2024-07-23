<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Food;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\Category;
use Illuminate\Http\Request;

class ViewRecipeAdmin extends Controller
{
    public function index(Request $request)
    {

    // serch
    $query = Recipe::with(['food', 'ingredients', 'steps']);

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->whereHas('food', function ($q) use ($search) {
            $q->where('food_name', 'like', '%' . $search . '%');
        });
    }

    $recipes = $query->paginate(10);

    return view('admin.admin-beranda', [
        'recipes' => $recipes,
        "title" => "Beranda",
        'search' => $request->input('search'),
    ]);
    }
    public function destroy(Recipe $recipe)
    {
    $recipe->food->recipe()->delete();

    // Delete 
    $recipe->food()->delete();
    $recipe->ingredients()->delete();
    $recipe->steps()->delete();

    $recipe->delete();
    return redirect()->route('admin.admin-beranda')->with('success', 'Resep berhasil dihapus!')->withHeaders([
        'X-CSRF-TOKEN' => csrf_token()
    ]);

    }
}
