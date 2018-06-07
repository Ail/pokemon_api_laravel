<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Pokemon;
use App\Profile;

class ProfileController extends Controller
{
    //
    function getProfiles(){
      $pokemon = DB::table('pokemons')->get();
      set_time_limit(2600);

      $client = new Client();
      $profile = new Profile();

      for($i=0; $i<count($pokemon); $i++){

        $res = $client->request('GET', $pokemon[$i]->url );
        $result= json_decode($res->getBody(), true);
        // var_dump($result['sprites']["front_default"]);


        if($result['height'] >= 50 && isset($result['sprites']["front_default"])){
          $profile->id = $result['id'];
          $profile->form = json_encode($result['forms']);
          $profile->abilities = json_encode($result['abilities']);
          $profile->stats = json_encode($result['stats']);
          $profile->name = $result['name'];
          $profile->weight = $result['weight'];
          $profile->moves = json_encode($result['moves']);
          $profile->sprites = json_encode($result['sprites']);
          $profile->held_items = json_encode($result['held_items']);
          $profile->location_area_encounters = $result['location_area_encounters'];
          $profile->height = $result['height'];
          $profile->is_default = $result['is_default'];
          $profile->species = json_encode($result['species']);
          $profile->order = $result['order'];
          $profile->game_indices = json_encode($result['game_indices']);
          $profile->base_experience = $result['base_experience'];
          $profile->types = json_encode($result['types']);
          $profile->save();

          sleep(1);
        }

      }

       return redirect('/');
    }

    function profileTable(){

      $profile = DB::connection('mysql2')->table('pokemon_profiles')->orderBy('weight', 'desc')->paginate(10);

      return view('welcome')->with('profile', $profile);

    }

    function pokemonKing(){

        $profiles = DB::connection('mysql2')->table('pokemon_profiles')->get();
        // var_dump(json_decode($profile, true));
        foreach (json_decode($profiles, true) as $pokemon) {
            $sum = 0;
            // dd($pokemon['stats']);
            foreach(json_decode($pokemon['stats'], true) as $stat){
              $sum += $stat['base_stat'];
            }
            $kingstat = 0;
            if($sum > $kingstat){
              $theKing = $pokemon;
            }
        }
        return view('welcome')->with('theKing', $theKing);
    }

}
