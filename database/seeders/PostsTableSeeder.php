<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Storage::disk('public')->deleteDirectory('posts');
        Post::truncate(); 
        Tag::truncate(); 
        for($i=1;$i<=6;$i++)
        {   $url='Mi post numero '.$i;
            $post = new Post;
            $post->title = 'Mi post numero '.$i;
            $post->excerpt = 'Descripción de Mi post numero '.$i;
            $post->body = 'Contenido Central de Mi post numero '.$i;
            $post->published_at = Carbon::now()->subDays($i);
            $post->category_id = $i;
            $post->user_id = $i;
            $post->save();
            $post->tags()->attach(Tag::create(['name'=>'Etiqueta_'.$i]));
        }

    }
}
