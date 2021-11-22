<?php

namespace App\Console\Commands;

use Goutte\Client;
use App\Models\Anime;
use \aalfiann\MyAnimeList;
use Illuminate\Support\Str;
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

    private $data = array();

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

        foreach($animes as $anime)
        {
            if($anime->thumnail == NULL)
            {
                $client = new Client();

                $crawler = $client->request('GET', 'https://gogoanime.cm' . $anime->link);
                $img = $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_info_body > div.anime_info_body_bg > img')->attr('src');
                $episodes = $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_video_body > ul#episode_page > li > a')->attr('ep_end');
                $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_info_body > div.anime_info_body_bg > p.type')->each(function ($node) {
                    array_push($this->data, $node->text());
                });

                $array = array();

                foreach ($this->data as $data) {
                    $key = strtok($data, ':');
                    $array[$key] = substr($data, strpos($data, ":") + 2);
                }

                $anime->thumnail = $this->downloadThumbnail($img);
                $anime->type = $array['Type'] ?? '';
                $anime->description = $array['Plot Summary'] ?? '';
                $anime->genres = $array['Genre'] ?? '';
                $anime->year = $array['Released'] ?? '';
                $anime->status = $array['Status'] ?? '';
                $anime->name_japanese = $array['Other name'] ?? '';
                $anime->episodes = $episodes ?? '';

                if ($anime->save()) {
                    $this->info($anime->name_english . ' Saved!');
                } else {
                    $this->info($anime->name_english . ' ERROR!!!!');
                }
                sleep(1);
            }

        }
    }

    private function downloadThumbnail($url){
        try {
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $filename = 'animes/thumbnails/'.Str::random(5).'.'.$extension;
            $fullpath = 'public/'.$filename;
            $file = file_get_contents($url);
            file_put_contents($fullpath, $file);

            return $filename;
        } catch (\Exception $e) {
            //dd($e);
        }
        return null;
    }

    public function scrapeMAL()
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
