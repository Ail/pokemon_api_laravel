<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Pokemon;

class PokemonController extends Controller
{
    public function saveApiData(){

        $client = new Client();
        $res = $client->request('GET', 'http://pokeapi.co/api/v2/pokemon');

        $result= json_decode($res->getBody(), true);

        for($i=0; $i<count($result['results']); $i++){
          $Pokemon = new Pokemon();

          $Pokemon->name = $result['results'][$i]['name'];
          $Pokemon->url = $result['results'][$i]['url'];
          $Pokemon->save();
        }

        while(isset($result['next'])){
          $res = $client->request('GET', $result['next'] );
          $result= json_decode($res->getBody(), true);

          for($i=0; $i<count($result['results']); $i++){
            $Pokemon = new Pokemon();

            $Pokemon->name = $result['results'][$i]['name'];
            $Pokemon->url = $result['results'][$i]['url'];
            $Pokemon->save();
          }
        }


          return redirect('/');
    }




}
