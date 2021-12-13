<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * @description Migration database connection.
     */
    protected $connection = 'mysql';


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $collection) {
            $collection->id('_id')->unique();
//            $collection->charset = 'utf8mb4';
//            $collection->collation = 'utf8mb4_unicode_ci';

            $collection->string('city');
            $collection->integer('capacity');
            $collection->integer('active');
            $collection->string('adress');
            $collection->string('postcode');
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
        Schema::dropIfExists('stations');
    }
}
