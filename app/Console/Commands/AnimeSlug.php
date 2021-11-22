<?php

namespace App\Console\Commands;

use App\Models\Anime;
use App\Models\Episode;
use Illuminate\Console\Command;

class AnimeSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anime:slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix anime Slugs';

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
        $this->info('Fixing Animes Slugs');
        sleep(1);
        $this->Animes();
        $this->info('=======================');
        sleep(1);
        $this->info('Fixing Episodes Slugs');
        sleep(1);
        $this->Episodes();
        sleep(1);
        $this->info('Done!');
        return Command::SUCCESS;
    }

    public function Animes()
    {
        $animes = Anime::whereNull('slug')->get();
        if($animes)
        {
            foreach ($animes as $anime) {
                $slug = explode('/', $anime->link);
                $anime->slug = end($slug);
                $anime->save();
                $this->info($anime->name_english . ' Slug Saved!');
            }
        } else {
            $this->info('All Animes have slugs!');
        }

    }

    public function Episodes()
    {
        $episodes = Episode::whereNull('slug')->get();

        if($episodes)
        {
            foreach ($episodes as $episode) {
                $episode->slug = str_replace('https://gogoanime.cm/', '', $episode->link);
                $episode->save();
                $this->info($episode->title . ' Server => ' . $episode->server_name . ' Slug Saved!');
            }
        } else {
            $this->info('All Episodes have slugs!');
        }


    }
}
