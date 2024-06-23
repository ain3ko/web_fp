<?php
namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class RecipeController extends Controller
{
    public function create()
{
    $categories = Category::all();
    return view('admin.admin-tambah', [
        'title' => 'Tambah Resep',
        'categories' => $categories
    ]);
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'food_name' => 'required|string',
        'food_desc' => 'required|string',
        'category_id' => 'required|exists:category,category_id', // Pastikan id adalah primary key di tabel categories
        'food_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        DB::beginTransaction();

        // Simpan gambar (jika ada)
        if ($request->hasFile('food_img')) {
            $imagePath = $request->file('food_img')->store('images', 'public');
            $validatedData['food_img'] = $imagePath;
        }

        $food = Food::create($validatedData);

        $ingredients = Ingredient::create([
            'ingredient_1' => $request->input('ingredients.0'), // Menggunakan indeks 0
            'ingredient_2' => $request->input('ingredients.1'), // Menggunakan indeks 1
            'ingredient_3' => $request->input('ingredients.2'), // Menggunakan indeks 1
            'ingredient_4' => $request->input('ingredients.3'), // Menggunakan indeks 1
            'ingredient_5' => $request->input('ingredients.4'), // Menggunakan indeks 1
            'ingredient_6' => $request->input('ingredients.5'), // Menggunakan indeks 1
            'ingredient_7' => $request->input('ingredients.6'), // Menggunakan indeks 1
            'ingredient_8' => $request->input('ingredients.7'), // Menggunakan indeks 1

        ]);

        $steps = Step::create([
            'step_1' => $request->input('steps.0'), // Menggunakan indeks 0
            'step_2' => $request->input('steps.1'), // Menggunakan indeks 1
            'step_3' => $request->input('steps.2'), // Menggunakan indeks 1
            'step_4' => $request->input('steps.3'), // Menggunakan indeks 1
            'step_5' => $request->input('steps.4'), // Menggunakan indeks 1
            'step_6' => $request->input('steps.5'), // Menggunakan indeks 1
            'step_7' => $request->input('steps.6'), // Menggunakan indeks 1
            'step_8' => $request->input('steps.7'), // Menggunakan indeks 1

        ]);

        $recipe = new Recipe([
            'food_id' => $food->id,
            'ingredient_id' => $ingredients->id,
            'step_id' => $steps->id,
        ]);
        $recipe->save();

        DB::commit();

        return redirect()->route('admin.admin-beranda')->with('success', 'Resep berhasil ditambahkan');

    } catch (\Exception $e) {
        DB::rollback();
        Log::error($e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan resep');
    }
}
}
