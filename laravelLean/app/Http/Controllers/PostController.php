<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        $data['posts'] = $posts;
        return view('posts.index', $data);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request   $request)
    {
        $this->validate($request,[
            'title' => 'required|min:5',
            'content' => 'required|min:5'
        ]);
        $post=new Post();
        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/posts');        
    }

    public function edit($post_id)
    {
        try{
            $post = Post::findOrFail($post_id);

        }catch (Exception $e){
            return abort(404);
        }
        $data['post'] = $post;
        return view('posts.edit',$data);
    }

    public function update(Request $request, $post_id)
    {
        $this->validate($request,[
            'title' => 'required|min:5',
            'content' => 'required|min:5'
        ]);
        try {
            $post = Post::findOrFail($post_id);
        }catch (Exception $e){
            return abort(404);
        }
        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/posts/edit/'.$post_id);
    }
}
