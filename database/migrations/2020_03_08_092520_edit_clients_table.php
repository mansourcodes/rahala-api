<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function ($table) {

            try {
                $table->dropColumn('contact_wp_1');
                $table->dropColumn('contact_wp_2');
                $table->dropColumn('locations');
            } catch (Exception $e) {
            }


            $table->json('contact');
            $table->string('db_name', 50);
            $table->string('db_user', 50);
            $table->string('db_pass', 50);
            $table->string('db_host', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function ($table) {

            $table->bigInteger('contact_wp_1');
            $table->bigInteger('contact_wp_2');
            $table->string('locations', 100);

            $table->dropColumn('contact');
            $table->dropColumn('db_name', 50);
            $table->dropColumn('db_user', 50);
            $table->dropColumn('db_pass', 50);
            $table->dropColumn('db_host', 50);
        });
    }
}
