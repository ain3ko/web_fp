<?php
namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Ingridient;
use App\Models\Step;
use App\Models\Recipe;
use App\Models\Category; // Tambahkan ini untuk menggunakan model Category
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try {
            // 1. Validasi data input (disesuaikan dengan kebutuhan)
            $validatedData = $request->validate([
                'food_name' => 'required|string',
                'food_desc' => 'required|string',
                'category_id' => 'required|exists:categories,category_id',
                'food_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar (opsional)
                // ... validasi untuk input lainnya ...
            ]);
            dd($request->all());
            Log::info($request->all());

            // 2. Simpan data ke tabel 'food'z
            $food = Food::create($validatedData);

            // 3. Simpan data ke tabel 'ingridients'
            $ingredients = new Ingridient($request->only([
                'ingridient_1', 'ingridient_2', 'ingridient_3', 'ingridient_4',
                'ingridient_5', 'ingridient_6', 'ingridient_7', 'ingridient_8'
            ]));
            $food->ingridient()->save($ingredients);

            // 4. Simpan data ke tabel 'steps'
            $steps = new Step($request->only([
                'step_1', 'step_2', 'step_3', 'step_4',
                'step_5', 'step_6', 'step_7', 'step_8'
            ]));
            $food->step()->save($steps);

            // 6. Redirect atau berikan response lainnya
            return response()->json(['success' => 'Resep berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }

    }
}
