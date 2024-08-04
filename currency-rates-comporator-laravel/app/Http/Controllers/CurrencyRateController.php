<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;
use App\Models\CurrencyRate;

class CurrencyRateController extends Controller
{
    
    public static function getAndInsertApis($apis = []){
        foreach($apis as $api){
            ApiModel::insert(['apiUrl' => $api]);
        }
    }

    public function setMinCurrencyArray(){
      //  dd(CurrencyRate::lowestPrice()->first());
        $findLowest = CurrencyRate::lowestPrice()->get();
        return view('welcome', ['minCurrencyRates' => $findLowest]);
    }

    public static function getAndInsertCurrencyRates(){

       $apiUrls = ApiModel::all();
       $currencyRates = [];
       self::getRatesFromApis($currencyRates, $apiUrls);
       self::insertRates($currencyRates);
    }

    private static function getRatesFromApis(&$currencyRates, $apiUrls){
        foreach($apiUrls as $apiUrl){
            try {
                $response = Http::get($apiUrl->apiUrl);
                \Log::alert("Response from api " . $response);
                $currencyRates[] = json_decode($response->body(), true);
            } catch (Throwable $th) {
                \Log::alert("Response from api with error " . $th);
                report($th); 
                return [];
            }
        }
    }

    private static function insertRates($currencyRates){
        foreach ($currencyRates as $rate) {
            foreach($rate as $rateInfo){
                CurrencyRate::insert(
                    ['shortCode' => $rateInfo['shortCode'], 
                    'symbol' => $rateInfo['symbol'],
                    'price' => $rateInfo['price'], 
                    'name' => $rateInfo['name']],
                );
            }
        }
    }
}
