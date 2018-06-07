<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PokemonProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::connection('mysql2')->create('pokemon_profiles', function($table)
        {
            $table->integer('id');
            $table->json('form')->nullable();
            $table->json('abilities')->nullable();
            $table->json('stats')->nullable();
            $table->string('name');
            $table->integer('weight');
            $table->json('moves')->nullable();
            $table->json('sprites')->nullable();
            $table->json('held_items')->nullable();
            $table->string('location_area_encounters');
            $table->integer('height');
            $table->string('is_default');
            $table->json('species')->nullable();
            $table->integer('order');
            $table->json('game_indices')->nullable();
            $table->integer('base_experience');
            $table->json('types')->nullable();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
