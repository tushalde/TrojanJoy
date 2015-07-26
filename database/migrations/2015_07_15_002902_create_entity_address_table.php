<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entity_address', function (Blueprint $table) {
            $sql = "CREATE TABLE `entity_address` (`id` INT(11) auto_increment primary key,
                    `entity_id` INT(11) UNSIGNED NOT NULL,
                    `entity_class` VARCHAR(80) NOT NULL,
                    `address` VARCHAR(100) NOT NULL,
                    `lat` POINT NOT NULL,
                    `lng` POINT NOT NULL)";
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('entity_address');
    }
}
