<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;


class CategoriesController extends Controller
{
    public function show(Category $category) {
        
        $posts=$category->posts()->published()->paginate(1);
        if(request()->wantsJson())
            return $posts;
        $title="Posts from '".$category->name."' Category";
    
        return view('partials.home',compact('posts','title'));
    }
}
