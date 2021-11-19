<?php

namespace App\Console\Commands;

use Goutte\Client;
use App\Models\Anime;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class AnimeNameCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anime:names';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape anime list';

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
        $pages = 74;
        for($i=1;$i<=$pages;$i++)
        {
            $client = new Client();
            $crawler = $client->request('GET', 'https://gogoanime.cm/anime-list.html?page=' . $i);
            $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_list_body > ul.listing > li > a')->each(function ($node) {
                $url = $node->attr('href');
                $title = $node->text();
                $animeCheck = Anime::where('name_english', $title)->first();
                if (!$animeCheck) {
                    $anime = new Anime();
                    $anime->name_english = $title;
                    $anime->link = $url;
                    $anime->save();
                    $this->info($title . ' Saved!');
                } else {
                    $this->info($title . ' Exists!');
                }
            });
        }

    }
}
