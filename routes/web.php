<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\BlogController;
use App\Http\Controllers\Front\Homepagecontroller;
use App\Http\Controllers\Front\BlogDetailController;

Route::get('/', [Homepagecontroller::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // blog route
    Route::resource('/member/blogs', BlogController::class)->names([
        'index' => 'member.blogs.index',
        'edit' => 'member.blogs.edit',
        'update' => 'member.blogs.update',
        'create' => 'member.blogs.create',
        'store' => 'member.blogs.store',
        'destroy' =>'member.blogs.destroy'
    ])->parameters([
        'blogs' => 'post'
    ]);
});

require __DIR__.'/auth.php';

Route::get('/{slug}',[BlogDetailController::class, 'detail'])->name('blog-detail');
Route::post('/upload', [UploadController::class, 'store'])->name('upload');

