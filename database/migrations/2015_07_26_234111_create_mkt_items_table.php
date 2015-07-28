<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMktItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mkt_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id', false, true);
            $table->string('title', 45);
            $table->string('description', 45)->nullable();
            $table->string('price', 45);
            $table->integer('status_id', false, true);
            $table->integer('pickup_location', false, true);
            $table->integer('category_id', false, true);
            $table->timestamps();
            //$table->foreign('post_id')->references('id')->on('mkt_posts');
            //$table->foreign('pickup_location')->references('id')->on('entity_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mkt_items');
    }
}
