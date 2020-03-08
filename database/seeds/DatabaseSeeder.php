<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('clients')->delete();
        DB::table('trips')->delete();
        error_log('empty tables done.');
        factory(App\Client::class, 5)->create();
        error_log('Client seed done.');
        factory(App\Trip::class, 100)->create();
        error_log('Trip seed done.');
    }
}
