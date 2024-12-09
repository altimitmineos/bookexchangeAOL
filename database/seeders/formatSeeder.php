<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class formatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $formats = [
            ['FormatName' => 'Soft Cover'],
            ['FormatName' => 'Hard Cover'],
            ['FormatName' => 'Digital']
        ];

        DB::table('formats')->insert($formats);
    }
}
