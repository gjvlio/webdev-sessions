<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['name' => 'draft',     'display_name' => 'Draft',     'created_at' => now(), 'updated_at' => now()],
            ['name' => 'published', 'display_name' => 'Published', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'archived',  'display_name' => 'Archived',  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
