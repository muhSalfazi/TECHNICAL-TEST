<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('members')->insert([
            ['code' => 'M001', 'name' => 'Angga'],
            ['code' => 'M002', 'name' => 'Ferry'],
            ['code' => 'M003', 'name' => 'Putri'],
        ]);
    }
}
