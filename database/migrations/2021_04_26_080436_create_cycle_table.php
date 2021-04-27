<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
include_once (app_path()."/includes/listTableForeignKeys.php");

class CreateCycleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable("cycle")){
          Schema::create('cycle', function (Blueprint $table) {
              $table->id();
              $table->unsignedBigInteger("user_id");
              $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onUpdate("cascade")
                ->onDelete("cascade");
              $table->timestamp("menstruation_started");
              $table->unsignedTinyInteger("menstruation_duration");
              $table->timestamps();
          });
        } else {
          if(!Schema::hasColumn("cycle", "id")){
            Schema::table("cycle", function(Blueprint $table){
              $table->id();
            });
          }
          if(!Schema::hasColumn("cycle", "user_id")){
            Schema::table("cycle", function(Blueprint $table){
              $table->unsignedBigInteger("user_id");
              $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            });
          } else {
            $foreignKeys = listTableForeignKeys("cycle");
            if(!in_array("user_id_foreign", $foreignKeys)){
              Schema::table("cycle", function(Blueprint $table){
                $table->foreign("user_id")
                  ->references("id")
                  ->on("users")
                  ->onUpdate("cascade")
                  ->onDelete("cascade");
              });
            }
          }
          if(!Schema::hasColumn("cycle", "menstruation_started")){
            Schema::table("cycle", function(Blueprint $table){
              $table->timestamp("menstruation_started");
            });
          }
          if(!Schema::hasColumn("cycle", "menstruation_duration")){
            Schema::table("cycle", function(Blueprint $table){
              $table->unsignedTinyInteger("menstruation_duration");
            });
          }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cycle');
    }
}
