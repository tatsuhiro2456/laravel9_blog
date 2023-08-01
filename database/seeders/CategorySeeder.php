<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
                'name' => 'hobby',
                'created_at' => now(),
                'updated_at' => new DateTime(),
            ]);
            
        Category::create([
                'name' => 'work',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
            ]);
            
            
        Category::create([
                'name' => 'private',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
            ]);
    }
}
