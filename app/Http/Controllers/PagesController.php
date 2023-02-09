<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class PagesController extends Controller
{
    function spa(){
        return view('pages.spa'); 
    }

    function home (Request $request) {
        $query=Post::published();
        if(request('month'))
            $query->whereMonth('published_at',request('month'));
        if(request('year'))
            $query->whereYear('published_at',request('year'));
        $posts=$query->paginate(2);
        if($request->wantsJson())
            return $posts;
        return view('partials.home',compact('posts'));
    }


    function about () {
        $posts=Post::published()->paginate();
        return view('partials.about',compact('posts'));
    } 
    function archive () {
        $data = [
            'authors'=> User::latest()->take(4)->get(),
            'categories'=>Category::all(),
            'posts'=>Post::latest()->take(5)->get(),
            'archives'=>Post::published()->byYearAndMonth()->get()
        ];
        if(request()->wantsJson())
            return $data;
        
        return view('partials.archive',$data);
    }
    function contact () {
        $posts=Post::published()->paginate();
        return view('partials.contact',compact('posts'));
    }
}
