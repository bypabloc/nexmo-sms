<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class SendController extends Controller
{

    public function __construct(){
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('sms.send');
    }

    public function send(Request $req){
        try{
            $data = $req->params;

            $configApp = config('app');

            $apiKey = $configApp['nexmo_api_key'];
            $apiSecret = $configApp['nexmo_api_secret'];
            $from = $configApp['nexmo_from'];
            $to = $data['to'];
            $text = $data['text'];

            $basic  = new \Nexmo\Client\Credentials\Basic($apiKey, $apiSecret);
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => $to,
                'from' => $from,
                'text' => $text
            ]);
            
            return response()->json([
                'data' => $data,
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'errors' => [$e->getMessage()],
            ], 500);
        }
    }
}
