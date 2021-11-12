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
//            $table->id()->unique()->autoIncrement();
            $table->foreignId('city_id');
            $table->string('status');
            $table->boolean('active');
//            $table->string('longitude')->nullable();
//            $table->string('latitude')->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('latitude', 11, 8)->nullable();

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
