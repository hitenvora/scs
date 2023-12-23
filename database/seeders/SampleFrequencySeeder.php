<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sample_frequencies')->insert([
            [
                'name' => 'On Request',
            ],
            [
                'name' => 'Daily',
            ],
            [
                'name' => 'Weekly',
            ],
            [
                'name' => 'Monthly',
            ],
        ]);
    }
}
