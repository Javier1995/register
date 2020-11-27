<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index(){
        
        $posts = Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(5);
        return view('post.index', ['posts'=>$posts]);
    }

    public function store(Request $request){

        $this->validate($request,[
          'body'=>'required'
        ]);
        

        $request->user()->posts()->create($request->only('body'));



        return back()->with(['status'=>'Se ha guardado correctamente']);
    }
}
