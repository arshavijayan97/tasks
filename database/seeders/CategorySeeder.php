<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $categories = [
        [
            'name' => 'high'
        ],
        [
            'name' => 'medium'
        ],
        [
            'name' => 'low'
        ],
        

      ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
