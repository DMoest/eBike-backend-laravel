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
        Schema::create('bikes', function (Blueprint $collection) {
            $collection->foreignId('city');
            $collection->string('status');
            $collection->boolean('active');
            $collection->decimal('longitude', 10, 7)->nullable();
            $collection->decimal('latitude', 11, 8)->nullable();
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
        Schema::dropIfExists('bikes');
    }
}
