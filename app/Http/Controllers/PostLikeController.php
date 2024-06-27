<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLike;
use App\Models\User;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    //

    public function toggleLike(Post $post, User $user){
        if(! PostLike::Where('post_id', $post->id)->Where('user_id', $user->id)->exists()){
            PostLike::create([
                'user_id'=> $user->id,
                'post_id'=> $post->id
            ]);
            }else{
                PostLike::Where('post_id', $post->id)
                ->Where('user_id', $user->id)
                ->delete();
            }
            return redirect()->route('Post.index');

    }
}
