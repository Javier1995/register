<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    public function __contruct(){
      return $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request){
        if(!$post->linkedBy($request->user())){

                $post->likes()->create([
                    'user_id' => $request->user()->id,
                ]);

        }
        
        return back();
    }

    public function unlike(Post $post, Request $request){
        if($post->linkedBy($request->user())){

                $post->likes()->delete([
                    'user_id' => $request->user()->id,
                ]);
        }
        return back();
    }
}
