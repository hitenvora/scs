<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'admin',
                'mobile' => '1234567890',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'admin2',
                'mobile' => '0123456789',
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
