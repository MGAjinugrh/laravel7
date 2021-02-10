<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=CategoriesTableSeeder
        $categories = collect(['Framework', 'Code']);
        $categories->each(function ($c) {
            \App\Category::create([
                'name' => $c,
                'slug' => \Str::slug($c),
            ]);
        });
    }
}
