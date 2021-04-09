<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoogleIdColumnToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('users', function (Blueprint $table) {
         $table->string('provider_id')->nullable();
         $table->string('provider')->nullable();
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
           $table->dropColumn('provider_id');
           $table->dropColumn('provider');
       });
     }
 }
