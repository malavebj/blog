<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class TagsController extends Controller
{
    public function show(Tag $tag) {
        
        $posts=$tag->posts()->published()->paginate(2);

        if(request()->wantsJson())
            return $posts;
        $title="Posts with Tag: '".$tag->name."'";
    
        return view('partials.home',compact('posts','title'));
    }   
}
