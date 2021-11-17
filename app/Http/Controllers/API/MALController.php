<?php

namespace App\Http\Controllers\API;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\DomCrawler\Crawler;


class MALController extends Controller
{
    private $client;
    private $list;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        // $html = (string)file_get_contents('https://kissanimefree.to/anime-list/');
        // $crawler = new Crawler($html);

        // $crawler->filter('body > div.wrapper > div.main-content.mt-3 > div.container > div.row.mt-3 > aside.col-xs-12.col-lg-8 > section > div.body > ul.anime-list-v');
        $crawler = $this->client->request('GET', 'https://kissanimefree.to/anime-list/');
        $crawler->filter('body > div.wrapper > div.main-content.mt-3 > div.container > div.row.mt-3 > aside.col-xs-12.col-lg-8 > section > div.body > ul.anime-list-v > li > div.info > a')->each(function ($node) {
            $this->list .= $node->text() . "</br>";
        });

        $hi = explode(' ', $this->list);

        return $this->list;
        //return $crawler->html();
    }
}
