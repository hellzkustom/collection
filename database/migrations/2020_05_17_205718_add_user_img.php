<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserImg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
              Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('image_id');//追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                   Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image_id');
          
        });
    }
}
