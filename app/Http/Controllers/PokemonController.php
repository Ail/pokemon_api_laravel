<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PokemonController extends Controller
{
    public function saveApiData(){

        $client = new Client();
        $res = $client->request('GET', 'http://pokeapi.co/api/v2/pokemon');

        $result= json_decode($res->getBody(), true);
        echo $result['next'];

        return view('welcome');
    }
}
