<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todo_status')->truncate();

        DB::table('todo_status')->insert([
            [
                'status' => 'TODO',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => 'ONGOING',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => 'DONE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
