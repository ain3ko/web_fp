<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DirectRecipeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewRecipeAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda', [
    "title" => "Beranda"
    ]);
});

Route::get('/detail-resep', function () {
    return view('detail-resep', [
    "title" => "Detail Resep"
    ]);
});

Route::get('/kebijakan', function () {
    return view('kebijakan', [
        "title" => "Kebijakan"
        ]);
});
Route::get('/resep', function () {
    return view('resep', [
        "title" => "Resep"
        ]);
});
Route::get('/tentang-kami', function () {
    return view('tentang-kami', [
        "title" => "Tentang Kami"
        ]);
});
Route::get('/admin/admin-beranda', function () {
    return view('admin/admin-beranda', [
        "title" => "Beranda"
    ]);
});

Route::get('/admin/admin-login', function () {
    return view('admin/admin-login', [
        "title" => "login"
        ]);
});

Route::delete('/admin-beranda/{recipe}', [ViewRecipeAdmin::class, 'destroy'])->name('admin.admin-beranda.destroy');
Route::match(['get', 'post'], '/admin/admin-tambah', [RecipeController::class, 'create'])->name('admin.admin-tambah');
Route::post('/admin/admin-tambah', [RecipeController::class, 'store'])->name('admin.admin-tambah.store');
Route::post('/admin/admin-login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/', [DirectRecipeController::class, 'index'])->name('beranda');
Route::get('/detail-resep/{recipeId}', [DirectRecipeController::class, 'show'])->name('detail-resep');
Route::get('/resep', [DirectRecipeController::class, 'resep'])->name('resep');
// routes/web.php
Route::post('/rate', [RatingController::class, 'store'])->name('rate.recipe');


Route::get('/admin/admin-beranda', [ViewRecipeAdmin::class, 'index'])
    ->middleware('auth')
    ->name('admin.admin-beranda');
Route::get('/admin/admin-login', [AuthController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('admin.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


