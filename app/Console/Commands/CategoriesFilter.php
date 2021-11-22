<?php

namespace App\Console\Commands;

use App\Models\Anime;
use App\Models\Category;
use App\Models\CategorySync;
use Illuminate\Console\Command;

class CategoriesFilter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anime:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncs anime categories';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }

    public function cat()
    {
        $animes = Anime::whereNotNull('country')->get();

        foreach($animes as $anime)
        {
            $genres = explode(', ', $anime->country);
            foreach($genres as $genre)
            {
                $category = Category::where('name', $genre)->first();

                if($category)
                {
                    $anime_cat = new CategorySync();
                    $anime_cat->anime_id = $anime->id;
                    $anime_cat->category_id = $category->id;
                    $anime_cat->save();

                    $this->info($anime->name_english . ' Saved!');
                }
                else {
                    $this->info($genre . ' Doesn\'t Exists!!!');
                }

                $anime->country = NULL;
                $anime->save();
            }
        }
    }
}
