<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\BlogController;
use App\Http\Controllers\Front\Homepagecontroller;
use App\Http\Controllers\Front\BlogDetailController;
use App\Http\Controllers\Front\CategoryController;

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

// Category Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Comment Routes
Route::middleware('auth')->group(function () {
    Route::post('/comment/{postId}', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{id}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.destroy');
});

// Guest Comment Route
Route::post('/guest-comment/{postId}', [App\Http\Controllers\CommentController::class, 'storeGuest'])->name('comment.store.guest');

Route::post('/upload', [UploadController::class, 'store'])->name('upload');
Route::post('/upload-trix-image', [UploadController::class, 'store'])->name('upload.trix');

// This should be the last route as it's a catch-all route
Route::get('/{slug}',[BlogDetailController::class, 'detail'])->name('blog-detail');


