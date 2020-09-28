<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeStreetFighterV extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
                if (Schema::hasTable('street_fighter_vs')) {
            // テーブルが存在していればリターン
            return;
        }
        
         Schema::create('street_fighter_vs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('article_id')->nullable();
            $table->unsignedInteger('battle_lounge')->nullable();
            $table->unsignedInteger('battle_lounge_win')->nullable();
            $table->unsignedInteger('rank_match')->nullable();
            $table->unsignedInteger('rank_match_win')->nullable();
            $table->unsignedInteger('casual_match')->nullable();
            $table->unsignedInteger('casual_match_win')->nullable();
            $table->timestamps();
            
            
            $table->foreign('article_id')->references('id')->on('articles'); 
});
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('street_fighter_vs');
    }
}
