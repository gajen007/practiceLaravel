<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTableUserData extends Migration
{
    public function up(){
        Schema::create('userdata', function (Blueprint $table) {
            $table->bigIncrements('relationid');
            $table->bigInteger('userid');
            $table->bigInteger('vehicleid');
            $table->string('VIN',255);
            $table->timestamps();
        });
    }
    
    public function down(){
        Schema::dropIfExists('userdata');
    }
}