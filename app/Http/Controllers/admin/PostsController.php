<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;


class PostsController extends Controller
{
    function index() {
        $posts=Post::allowed()->get();
        return view('admin.posts.index',compact('posts'));
    }

    function store(Request $request) {

        $this->authorize('create',new Post);// authorize() invoca Policy
        $this->validate($request,['title'=>'required|min:3']);
        $post = Post::create([
            'title'=> $request->get('title'),
            'user_id'=> auth()->id()
        ]);
        return redirect()->route('admin.posts.edit', $post);
    }

    function edit(Post $post) {
        $this->authorize('update',$post);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit',compact('categories','tags','post'));
    }

    function update(StorePostRequest $request, Post $post) {
        $this->authorize('update',$post);
        $post->update($request->all());
        $post->syncTags($request->get('tags'));
        return redirect()->route('admin.posts.edit', $post)->with('flash','Your Post has been updated');
    }

    function destroy(Post $post) {
        //$post->tags()->detach();-> Esto lo enviamos al Model a una función boot
        //$post->photos()->delete();/* De esta manera NO se ejecutará el boot deleting del modelo*/
        /*foreach($post->$photos as $photo){//Asi, individual, SI se ejecuta el boot
          $photo->delete();  
        }*/
        /*Con mas Clase*/
        /*$post->photos->each(function($photo){
            $photo->delete();
        });-> Esto lo enviamos al Model a una función boot*/

        $this->authorize('delete',$post);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('flash','Your Post has been Deleted');
    }
}
