<?php

namespace Bank\Controllers;

class ExchangesController
{
    //Your API Key: 73e2d27451d2a1bbb170edbc
    //Example Request: https://v6.exchangerate-api.com/v6/73e2d27451d2a1bbb170edbc/latest/USD
    //GET https://v6.exchangerate-api.com/v6/YOUR-API-KEY/latest/USD


    public static function conversation($base_price, $baseCurrency, $to)
    {
        $apiKey = '73e2d27451d2a1bbb170edbc';
        $req_url = 'https://v6.exchangerate-api.com/v6/'.$apiKey.'/latest/'.$baseCurrency;
        $response_json = file_get_contents($req_url);
        if(false !== $response_json) {
            try {
                $response = json_decode($response_json);
                if ('success' === $response->result) {
                    if ($to = 'LTL'){
                        $EUR_price = round(($base_price * 3.14), 2);
                    } else{

                    $EUR_price = round(($base_price * $response->conversion_rates->$to), 2);
                    }
                }
            }
            catch(Exception $e) {
                echo $e;
            }
        }
        return $EUR_price;
    }
}