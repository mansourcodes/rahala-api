<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\City;
use App\Airline;

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

        $random_cities = City::inRandomOrder()->select('ar_name')->limit(5)->get();
        $GLOBALS["random_cities"] = $random_cities->pluck('ar_name')->toArray();

        $random_airlines = Airline::inRandomOrder()->select('code')->limit(5)->get();
        $GLOBALS["random_airlines"] = $random_airlines->pluck('code')->toArray();

        factory(App\Client::class, 5)->create();
        error_log('Client seed done.');


        factory(App\Trip::class, 50)->create();
        error_log('Trip seed done.');


        factory(App\Quicksearch::class, 10)->create();
        error_log('Quicksearch seed done.');
    }
}
