<?php

namespace App\Http\Controllers\API;

use \aalfiann\MyAnimeList;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\DomCrawler\Crawler;


class MALController extends Controller
{
    private $client;
    private $list;
    private $hello = array();

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        // $html = (string)file_get_contents('https://kissanimefree.to/anime-list/');
        // $crawler = new Crawler($html);
        $test = "/category/hackgu-returner";
        $exploded = explode('/', $test);
        $url = 'https://gogoanime.cm/'. end($exploded). '-episode-1';

        // $crawler->filter('body > div.wrapper > div.main-content.mt-3 > div.container > div.row.mt-3 > aside.col-xs-12.col-lg-8 > section > div.body > ul.anime-list-v');
        $crawler = $this->client->request('GET', $url);
        //dd($crawler);

        //$crawler->filter('body > div.wrapper > div.main-content.mt-3 > div.container > div.row.mt-3 > aside.col-xs-12.col-lg-8 > section > div.body > ul.anime-list-v > li > div.info > a')->each(function ($node) {
        //$crawler->filter('body > div#body > div.container > aside.main > section > div.body > ul.anime-list-v > li > div.info > a[href]')->each(function ($node) {
        $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_video_body > div.anime_muti_link > ul > li > a')->each(function ($node) {
            $this->list .= str_replace('Choose this server', '', $node->text()) . ' | ' . $node->attr('data-video') . '</br>';
        });
        // $hello = array('hi');
        // $img = $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_info_body > div.anime_info_body_bg > img')->attr('src');
        // $episodes = $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_video_body > ul#episode_page > li > a')->attr('ep_end');
        // $type = $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_info_body > div.anime_info_body_bg > p.type > a')->text();
        // $desc = $crawler->filter('body > div#wrapper_inside > div#wrapper > div#wrapper_bg > section.content > section.content_left > div.main_body > div.anime_info_body > div.anime_info_body_bg > p.type')->each(function ($node) {
        //     array_push($this->hello, $node->text());
        // });

        // $crawler->filter('body > div#body > div.container > aside.main > section > div.body > ul.anime-list-v > li > div.info')->each(function ($node) {
        //     $url = $node->filter('a');
        //     $ep = $node->filter('div.meta > div.ep');
        //     $this->list .= $url->text() . '|' . $url->attr('href') . '|' . $ep->text() . '</br>';
        // });

        // $crawler->filter('body > div.main-container > div.inner-main-container > div.notmain > div.maindark > div.infobox > div.infoboxc')->each(function ($node){
        //     $img = $node->filter('img')->attr('src');
        // });

        // $getMAL = new MyAnimeList();
        // $getMAL->pretty = true;

        // $this->list = json_decode($getMAL->findAnime('.hack//Gift', false));

        //animekisa.tv




        return $this->list;
        //return $crawler->html();
    }

}
