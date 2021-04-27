<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
include_once (app_path()."/includes/listTableForeignKeys.php");

class CreateCalandarDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable("calendar_data")){
          Schema::create('calandar_data', function (Blueprint $table) {
              $table->id();
              $table->unsignedBigInteger("user_id");
              $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onUpdate("cascade")
                ->onDelete("cascade");
              $table->date("date")->nullable();;
              $table->boolean("pills");
              $table->boolean("excercise");
              $table->boolean("intercourse");
              $table->boolean("alcohol");
              $table->boolean("drugs");
              $table->char("physical_state", 255);
              $table->char("mental_state", 255);
              $table->char("mood", 255);
              $table->unsignedTinyInteger("weight");
              $table->timestamps();
          });
        } else {
          if(!Schema::hasColumn("calendar_data", "id")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->id();
            });
          }
          if(!Schema::hasColumn("calendar_data", "user_id")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->unsignedBigInteger("user_id");
              $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            });
          } else {
            $foreignKeys = listTableForeignKeys("calendar_data");
            if(!in_array("calendar_data_user_id_foreign", $foreignKeys)){
              Schema::table("calendar_data", function(Blueprint $table){
                $table->foreign("user_id")
                  ->references("id")
                  ->on("users")
                  ->onUpdate("cascade")
                  ->onDelete("cascade");
              });
            }
          }
          if(!Schema::hasColumn("calendar_data", "date")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->date("date")->nullable();
            });
          }
          if(!Schema::hasColumn("calendar_data", "pills")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->boolean("pills");
            });
          }
          if(!Schema::hasColumn("calendar_data", "excercise")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->boolean("excercise");
            });
          }
          if(!Schema::hasColumn("calendar_data", "intercourse")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->boolean("intercourse");
            });
          }
          if(!Schema::hasColumn("calendar_data", "alcohol")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->boolean("alcohol");
            });
          }
          if(!Schema::hasColumn("calendar_data", "drugs")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->boolean("drugs");
            });
          }
          if(!Schema::hasColumn("calendar_data", "physical_state")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->char("physical_state", 255);
            });
          }
          if(!Schema::hasColumn("calendar_data", "mental_state")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->char("mental_state", 255);
            });
          }
          if(!Schema::hasColumn("calendar_data", "mood")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->char("mood", 255);
            });
          }
          if(!Schema::hasColumn("calendar_data", "weight")){
            Schema::table("calendar_data", function(Blueprint $table){
              $table->unsignedTinyInteger("weight");
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
        Schema::dropIfExists('calandar_data');
    }
}
