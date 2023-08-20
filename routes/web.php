<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ログイン完了画面→ホーム画面表示
Route::get('/home', [PostController::class, 'home'])->name('post.home');
//記録・登録画面表示
Route::get('post/form', [PostController::class, 'form'])->name('post.form');
//記録を保存
Route::post('post', [PostController::class, 'store'])->name('post.store');
//記録一覧画面
Route::get('index', [PostController::class, 'index'])->name('post.index');
//編集画面表示
Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
//編集内容保存
Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');
//記録削除
Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy') ;
//利用規約画面表示
Route::get('explanation', [PostController::class, 'explain'])->name('post.explain');

return require __DIR__.'/auth.php';
