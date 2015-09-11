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
                    `street_name` VARCHAR(50) NOT NULL,
                    `street_number` VARCHAR(20) NOT NULL,
                    `city` VARCHAR(100) NOT NULL,
                    `state` VARCHAR(100) NOT NUll,
                    `postal_zip` VARCHAR(20) NOT NULL,
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
