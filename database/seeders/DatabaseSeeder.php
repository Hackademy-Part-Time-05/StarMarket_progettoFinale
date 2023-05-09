<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->createCategory();
    }
    public function createCategory(){
        Category::create([
            'name'=>'Vari'
        ]);
        Category::create([
            'name'=>'Serie TV'
        ]);
        Category::create([
            'name'=>'Giochi da tavolo'
        ]);
        Category::create([
            'name'=>'Action Figure'
        ]);
        Category::create([
            'name'=>'Gadget'
        ]);
        Category::create([
            'name'=>'Manga e comics'
        ]);
        Category::create([
            'name'=>'Funko Pop'
        ]);
        Category::create([
            'name'=>'Da Collezione'
        ]);
        Category::create([
            'name'=>'Introvabili'
        ]);
        Category::create([
            'name'=>'Videogame e Console'
        ]);
    }
}
