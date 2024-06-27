<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //return view 
    public function index(){
        $posts = Post::with('user','likes')->orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    //create post

    public function create(){
        return view('posts.create');
    }

    //store created post
    public function store(Request $request){
        
        Post::create([
            'content'=> $request->content,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->back();
    }

    //update post
    public function edit(int $id){
        $post= Post::findorfail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, int $id){
        $this->validate($request,[
            'content'=>['required','string','min:3','max:1000']
        ]);
        Post::findorfail($id)->update([
            'content'=>$request->content,
            'user_id'=>auth()->user()->id

        ]);
        return redirect()->route('Post.index');
    }

    //delete post
    public function destroy(int $id){
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->back();
    }

    
}
