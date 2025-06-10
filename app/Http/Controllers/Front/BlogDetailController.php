<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\PaginationState;

class BlogDetailController extends Controller
{
    function detail($slug){
        // echo $slug;
        $data = Post::with(['category', 'user'])
            ->where('status', 'publish')
            ->where('slug', $slug)
            ->firstOrFail();
        $pagination = $this->pagination($data->id);
        $comments = $data->comments()->with('user')->where('is_approved', true)->get();
        return view('components.front.blog-detail', compact('data', 'pagination', 'comments'));
    }

    private function pagination($id){
        $dataPrev = Post::where('status', 'publish')->where('id','<',$id)->orderBy('id','desc')->first();
        $dataNext = Post::where('status', 'publish')->where('id','>',$id)->orderBy('id','desc')->first();

        $data = [
            'prev' => $dataPrev,
            'next' => $dataNext
        ];
        return $data;
    }
}
