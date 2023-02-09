<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate(); 
        for($i=1;$i<=3;$i++)
        {    
            $tag = new Tag;
            $tag->name = 'Etiqueta '.$i;
            $tag->save();
        }
    }
}
