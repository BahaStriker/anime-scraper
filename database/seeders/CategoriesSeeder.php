<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = [
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'Cars'],
            ['name' => 'Comedy'],
            ['name' => 'Crime'],
            ['name' => 'Dementia'],
            ['name' => 'Demons'],
            ['name' => 'Drama'],
            ['name' => 'Dub'],
            ['name' => 'Ecchi'],
            ['name' => 'Family'],
            ['name' => 'Fantasy'],
            ['name' => 'Game'],
            ['name' => 'Gourmet'],
            ['name' => 'Harem'],
            ['name' => 'Hentai'],
            ['name' => 'Historical'],
            ['name' => 'Horror'],
            ['name' => 'Josei'],
            ['name' => 'Kids'],
            ['name' => 'Magic'],
            ['name' => 'Martial Arts'],
            ['name' => 'Mecha'],
            ['name' => 'Military'],
            ['name' => 'Music'],
            ['name' => 'Mystery'],
            ['name' => 'Parody'],
            ['name' => 'Police'],
            ['name' => 'Psychological'],
            ['name' => 'Romance'],
            ['name' => 'Samurai'],
            ['name' => 'School'],
            ['name' => 'Sci-Fi'],
            ['name' => 'Seinen'],
            ['name' => 'Shoujo'],
            ['name' => 'Shoujo Ai'],
            ['name' => 'Shounen'],
            ['name' => 'Shounen Ai'],
            ['name' => 'Slice of Life'],
            ['name' => 'Space'],
            ['name' => 'Sports'],
            ['name' => 'Super Power'],
            ['name' => 'Supernatural'],
            ['name' => 'Suspense'],
            ['name' => 'Thriller'],
            ['name' => 'Vampire'],
            ['name' => 'Yaoi'],
            ['name' => 'Yuri'],
        ];

        foreach ($categories as $category)
        {
            Category::create($category);
        }
    }
}
