<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_zones', function (Blueprint $collection) {
            // $collection->id();

            $collection->foreignId('city')->references('name')->on('cities');

            $collection->decimal('sw_longitude', 10, 7);
            $collection->decimal('sw_latitude', 11, 8);
            $collection->decimal('ne_longitude', 10, 7);
            $collection->decimal('ne_latitude', 11, 8);

            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking_zones');
    }
}
