<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    //

    public function store(Request $request, Post $post){
        $comment= new PostComment();
        $comment->content=$request->content;
        $comment->user_id=auth()->user()->id;
        $comment->post_id=$post->id;
        $comment->save();
        return redirect()->route('Post.index')->with('success','comment addes successfully!');

    }
      
}
