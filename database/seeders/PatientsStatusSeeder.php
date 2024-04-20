<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients_status')->insert([
            [
                'name' => 'Active',
                'user_id' => 1,
            ],
            [
                'name' => 'Inactive',
                'user_id' => 1,
            ],
            [
                'name' => 'Abbandon',
                'user_id' => 1,
            ],
            [
                'name' => 'Archive',
                'user_id' => 1,
            ],
        ]);
    }
}
