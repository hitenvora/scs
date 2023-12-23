<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('route_lists')->insert([
            [
                'name' => 'Metoda Route',
            ],
            [
                'name' => 'Shapar Route',
            ],
            [
                'name' => 'Rajkot City',
            ],
            [
                'name' => 'Vavdi-kotharia',
            ],
        ]);
    }
}
