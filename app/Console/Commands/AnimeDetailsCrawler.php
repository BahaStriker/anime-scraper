<?php

namespace App\Console\Commands;

use Goutte\Client;
use App\Models\Anime;
use \aalfiann\MyAnimeList;
use Illuminate\Console\Command;

class AnimeDetailsCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anime:details';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl Anime Details';

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
        @set_time_limit(0);
        ini_set('max_execution_time', -1);

        $this->scrape();
        return Command::SUCCESS;
    }

    public function scrape()
    {
        $animes = Anime::get();

        foreach ($animes as $anime) {
            if ($anime->mal_id == null) {
                $getMAL = new MyAnimeList();
                $getMAL->pretty = true;
                $result = $getMAL->findAnime($anime->name_english, false);
                $result = json_decode($result);
                if ($result->status == "success") {
                    if ($result->entry->title == $anime->name_english) {
                        $anime->name_japanese = $result->entry->japanese;
                        $anime->description = $result->entry->synopsis;
                        $anime->type = $result->entry->type;
                        $anime->studios = $result->metadata->studios;
                        $anime->aired = $result->entry->start_date;
                        $anime->status = $result->entry->status;
                        $anime->country = $result->metadata->source;
                        $anime->scores = $result->entry->score;
                        $anime->episodes = $result->entry->episodes;
                        $anime->thumnail = $result->entry->image;
                        $anime->mal_id = $result->entry->id;
                        $anime->save();
                        $this->info($result->entry->title . ' Updated!');
                    }
                }
                sleep(5);
            }
        }
    }
}
