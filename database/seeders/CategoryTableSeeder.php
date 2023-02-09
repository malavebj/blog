<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Category::truncate(); 
        for($i=1;$i<=8;$i++)
        {    
            $category = new Category;
            $category->name = 'Category '.$i;
            $category->save();
        }
    }
}
