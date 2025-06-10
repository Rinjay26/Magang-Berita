<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|min:3',
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'is_approved' => true, // Default value, could be configurable
        ]);

        $comment->save();

        return redirect()->route('blog-detail', ['slug' => $post->slug])
            ->with('success', 'Komentar berhasil ditambahkan.');
    }
    
    /**
     * Store a newly created guest comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function storeGuest(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|min:3',
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment([
            'content' => $request->content,
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'post_id' => $post->id,
            'is_approved' => true, // Default value, could be configurable
        ]);

        $comment->save();

        return redirect()->route('blog-detail', ['slug' => $post->slug])
            ->with('success', 'Komentar berhasil ditambahkan.');
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        
        // Check if user is the owner of the comment or has admin rights
        if (Auth::id() === $comment->user_id) {
            $post = $comment->post;
            $comment->delete();
            
            return redirect()->route('blog-detail', ['slug' => $post->slug])
                ->with('success', 'Komentar berhasil dihapus.');
        }
        
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
    }
}
