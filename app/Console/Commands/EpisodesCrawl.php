<?php

namespace App\Console\Commands;

use Goutte\Client;
use App\Models\Anime;
use App\Models\Episode;
use Illuminate\Console\Command;

class EpisodesCrawl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anime:episodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrap anime episodes';

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
        $this->scrape();
        return Command::SUCCESS;
    }

    public function scrape()
    {
        $animes = Anime::get();

        foreach($animes as $anime)
        {
            $link = explode('/', $anime->link);

            for($i=1; $i<=(int)$anime->episodes; $i++)
            {
                $client = new Client();
                $url = 'https://gogoanime.cm/'. end($link). '-episode-' . $i;
                $crawler = $client->request('GET', $url);

                $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_video_body > div.anime_muti_link > ul > li > a')->each(function ($node) use($anime, $i, $url) {
                    $check = Episode::where('server_name', str_replace('Choose this server', '', $node->text()))->where('server_link', $node->attr('data-video'))->first();
                    if(!$check)
                    {
                        $episode = new Episode();

                        $episode->title = $anime->name_english . ' Episode ' . $i;
                        $episode->server_name = str_replace('Choose this server', '', $node->text());
                        $episode->server_link = $node->attr('data-video');
                        $episode->order = $i;
                        $episode->link = $url;
                        $episode->slug = str_replace('https://gogoanime.cm/', '', $episode->link);
                        $episode->anime_id = $anime->id;

                        $episode->save();

                        $this->info($anime->name_english . ' Episode ' . $i . ' With server ' . str_replace('Choose this server', '', $node->text()) . ' Was added!');
                    }
                    else {
                        $this->info($anime->name_english . ' Episode ' . $i . ' With server ' . str_replace('Choose this server', '', $node->text()) . ' Exists!!!');
                    }
                });
            }


        }
    }
}
