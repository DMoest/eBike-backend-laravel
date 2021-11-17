<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * Database Migration class.
 */
class CreateLinkedSocialAccountsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    final public function up(): void
    {
        Schema::create('linked_social_accounts', function (Blueprint $collection) {
//            $collection->increments('_id');
            $collection->charset = 'utf8mb4';
            $collection->collation = 'utf8mb4_unicode_ci';

            $collection->string('provider_id');
            $collection->string('provider_name');
            $collection->string('user_id');
            $collection->timestamps();
            $collection->foreignId('user_id')->references('_id')->on('users');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    final public function down(): void
    {
        Schema::dropIfExists('linked_social_accounts');
    }
}
