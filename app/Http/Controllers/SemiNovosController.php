<?php

namespace App\Http\Controllers\SeminovosController;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Helpers\CrawlerHelper;
use App\Helpers\UrlHelper;

use Symfony\Component\CssSelector\CssSelectorConverter;

class SemiNovosController extends BaseController
{
    public function search(Request $request) {
        try {
            $url = UrlHelper::createUrl($request);
            if(!$url){
                throw new Exception("Error during create the URL!");
            }

            $crawler = CrawlerHelper::generateCrawler($url);
            if(!$crawler){
                throw new Exception("Error during generate Crawler!");
                
            }

            $data = $crawler->filter('div.anuncio-container > div.anuncio-thumb-new')->each(function ($content) {
                $adLink = "https://seminovos.com.br".$content->filter('a[class="thumbnail"]')->attr('href');
                $adTitle = $content->filter('div.content > div.card-body > a >div.card-header > h4')->text();
                $adInfo = $content->filter('div.content > div.card-body > a > div.card-header > div.card-description > span')->text();
                $adPrice = $content->filter('div.content > div.value > h4 > a')->text();
                return [
                    "adLink" => $adLink,
                    "adTitle" => $adTitle,
                    "adInfo" => $adInfo,
                    "adPrice" => $adPrice
                ];
            }) ;

            return response()->json($data, 200);
        } catch (Exception $e) {
            $data = [
                "message"=> $e->getMessage()
            ]; 
            return response()->json($data, 500);
        }
    }

    public function searchAd(Request $request){
        try {
            $url = $request->url;

            $crawler = CrawlerHelper::generateCrawler($url);
            if(!$crawler){
                throw new Exception("Error during generate Crawler!");
                
            }

            $adTitle = $crawler->filter('h1[itemprop="name"]')->text();
            $adInfo = $crawler->filter('p[class="desc"]')->text();
            $yearModelAd = $crawler->filter('span[itemprop="modelDate"]')->text();        
            $mileageAd = $crawler->filter('span[itemprop="mileageFromOdometer"]')->text();        
            $transmissionAd = $crawler->filter('span[title="Tipo de transmissão"]')->text();        
            $amountPortsAd = $crawler->filter('span[title="Portas"]')->text();        
            $fuelTypeAd = $crawler->filter('span[itemprop="fuelType"]')->text();        
            $colorAd = $crawler->filter('span[title="Cor do veículo"]')->text();
            
            $data = [
                "adTitle" => $adTitle,
                "adLink" => $url,
                "adInfo" => $adInfo,
                "yearModelAd" => $yearModelAd,
                "mileageAd" => $mileageAd,
                "transmissionAd" => $transmissionAd,
                "amountPortsAd" => $amountPortsAd,
                "fuelTypeAd" => $fuelTypeAd,
                "colorAd" => $colorAd
            ];

            return response()->json($data, 200);
        } catch (Exception $e) {
            $data = [
                "message"=> $e->getMessage()
            ]; 
            return response()->json($data, 500);
        }
    }
}
