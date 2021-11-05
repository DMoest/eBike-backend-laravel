<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->boolean('active');
            $table->string('city');
            $table->string('longitude');
            $table->string('latitude');
            $table->foreignId('city_id')->nullable(); // TODO - ÄNDRA SENARE SOM ICKE NULL....

//            $table->decimal('longitude', 10, 7);
//            $table->decimal('latitude', 11, 8);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bikes');
    }
}
