<?php

namespace App\Helpers;

use \GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerHelper{
    public static function generateCrawler($url){
        try {
            $client = new \GuzzleHttp\Client([
                'base_uri' => $url,
                'verify' => false
            ]);
            $html = $client->get($url);
            $html = $html->getBody()->getContents();
    
            $crawler = new Crawler($html);
    
            return $crawler;
        } catch (Exception $e) {
            return false;
        }
        
    }

}