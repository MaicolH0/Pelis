<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Category();
        $category->name = 'Aventura';
        $category->description = 'Peliculas que narran historias';
        $category->save();

        $category = new Category;
        $category->name = 'Terror';
        $category->description = 'Peliculas de miedo';
        $category->save();

        $category = new Category;
        $category->name = 'Acción';
        $category->description = 'Peliculas emocionantes';
        $category->save();
    }
}
