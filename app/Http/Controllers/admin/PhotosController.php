<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Photo;

class PhotosController extends Controller
{
    public function store(Post $post) {
        $this->validate(request(),['photo'=>'required|image|max:2048']);

        $photo=request()->file('photo')->store('posts','public');

        $post->photos()->create(['url'=> $photo]);
    }

    public function destroy(Photo $photo) {
        $photo->delete();
        return back()->with('flash','Picture Deleted');
    }
}
