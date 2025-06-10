<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->get();
        return view('components.front.categories', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = Post::with(['user', 'category'])
            ->where('status', 'publish')
            ->where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        
        return view('components.front.category-posts', compact('category', 'posts'));
    }
}
