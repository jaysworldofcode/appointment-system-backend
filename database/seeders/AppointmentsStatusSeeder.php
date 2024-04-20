<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments_status')->insert([
            [
                'name' => 'Successful',
                'user_id' => 1,
            ],
            [
                'name' => 'Cancelled',
                'user_id' => 1,
            ],
            [
                'name' => 'Not Arrived',
                'user_id' => 1,
            ],
        ]);
    }
}
