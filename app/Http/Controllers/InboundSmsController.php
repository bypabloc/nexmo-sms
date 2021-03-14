<?php

namespace App\Http\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response; 

class InboundSmsController extends Controller
{
    public function get(Request $req, Response $res){
        try{
            $sms = \Vonage\SMS\Webhook\Factory::createFromRequest($request);

            $getMsisdn = $sms->getMsisdn();
            $getText = $sms->getText();

            $configApp = config('app');

            $apiKey = $configApp['nexmo_api_key'];
            $apiSecret = $configApp['nexmo_api_secret'];
            $from = $configApp['nexmo_from'];

            $to = '+573503757074';
            $text = "Msj de {$getMsisdn} contiene el texto {$getText}";


            $basic  = new \Nexmo\Client\Credentials\Basic($apiKey, $apiSecret);
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => $to,
                'from' => $from,
                'text' => $text
            ]);
            
            return $res->withStatus(204);
        }catch(Exception $e){
            return response()->json([
                'errors' => [$e->getMessage()],
            ], 500);
        }
    }

    public function post(Request $req, Response $res){
        try{
            $sms = \Vonage\SMS\Webhook\Factory::createFromRequest($request);

            $getMsisdn = $sms->getMsisdn();
            $getText = $sms->getText();

            $apiKey = 'ea1fd49c';
            $apiSecret = 'BlR5hFXYQJuHMpbx';
            $from = '18335272127';
            $to = '+573503757074';
            $text = "Msj de {$getMsisdn} contiene el texto {$getText}";


            $basic  = new \Nexmo\Client\Credentials\Basic($apiKey, $apiSecret);
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => $to,
                'from' => $from,
                'text' => $text
            ]);
            
            return $res->withStatus(204);
        }catch(Exception $e){
            return response()->json([
                'errors' => [$e->getMessage()],
            ], 500);
        }
    }
}
