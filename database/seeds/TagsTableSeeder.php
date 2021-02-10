<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=TagsTableSeeder
        $tags = collect(['Laravel', 'Bug']);
        $tags->each(function ($c) {
            \App\Tag::create([
                'name' => $c,
                'slug' => \Str::slug($c),
            ]);
        });
    }
}
