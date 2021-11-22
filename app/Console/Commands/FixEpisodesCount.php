<?php

namespace App\Console\Commands;

use Goutte\Client;
use App\Models\Anime;
use Illuminate\Console\Command;

class FixEpisodesCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anime:fixcount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix Anime Episodes Count';

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
        $this->fix();
        return Command::SUCCESS;
    }

    public function fix()
    {
        $animes = Anime::where('episodes', 99)->get();

        foreach($animes as $anime) {
            $client = new Client();

            $crawler = $client->request('GET', 'https://gogoanime.cm' . $anime->link);
            $episodes = $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_video_body > ul#episode_page > li > a')->last()->attr('ep_end');
            $anime->episodes = $episodes ?? '';
            $anime->save();
            $this->info($anime->name_english . ' New count is ' . $episodes);

        }
    }
}
