<?php

namespace App\Http\Controllers;

use Exception;
use Vonage\Client;
use Illuminate\Http\Request;
use Vonage\Client\Credentials\Basic;

class NexmoApiController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        {
            $basic  = new Basic('7807dffe', 'O5CEH2nHTVzFCxSX');
            $client = new Client($basic);

            $client->message()->send([
                'to' => '8801836135392',
                'from' => 'play',
                'text' => 'A simple hello message sent from Vonage SMS API'
            ]);

            dd('SMS message has been delivered.');
        }
    }
}
