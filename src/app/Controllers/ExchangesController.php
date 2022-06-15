<?php

namespace Bank\Controllers;

class ExchangesController
{
    public static function exchange()
    {
        $endpoint = 'live';
        $access_key = 'RifB0lReVwy849s9N9mehlTIO30O2DZ5';
        $ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'');
      //  curl_setopt($ch, CURLOPT_URL, 'https://api.apilayer.com/exchangerates_data/live?base=USD&symbols=EUR,GBP');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        $exchangeRates = json_decode($output, true);

        return $exchangeRates['quotes']['USDGBP'];
    }
    public static function conversation(){
        // set API Endpoint, Access Key, required parameters
        $endpoint = 'convert';
        $access_key = 'RifB0lReVwy849s9N9mehlTIO30O2DZ5';

        $from = 'USD';
        $to = 'EUR';
        $amount = 10;

// initialize CURL:
        $ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// get the (still encoded) JSON data:
        $json = curl_exec($ch);
        curl_close($ch);

// Decode JSON response:
        $conversionResult = json_decode($json, true);

// access the conversion result
        echo $conversionResult['result'];
    }

}