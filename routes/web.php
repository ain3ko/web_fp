<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::match(['get', 'post'], '/admin/admin-tambah', [RecipeController::class, 'create'])->name('admin.admin-tambah');
Route::post('/admin/admin-tambah', [RecipeController::class, 'store'])->name('admin.admin-tambah.store');
Route::post('/admin/admin-login', [AuthController::class, 'login'])->name('admin.login');