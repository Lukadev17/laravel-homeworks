<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(AddCommentRequest $request, Post $post)
    {
        $validated = $request->validated();
        $comment = new Comment();
        $comment->body = $validated['comment'];
        $comment->user_id = Auth::id();
        $post->comments()->save($comment);
        return redirect()->action([PostController::class, 'show'], $post);
    }

    public function destroy(Comment $comment)
    {
        $post = $comment->post;
        $comment->delete();
        return redirect()->action([PostController::class, 'show'], $post);
    }
}
