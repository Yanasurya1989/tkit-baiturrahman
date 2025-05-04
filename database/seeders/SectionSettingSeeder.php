<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('section_settings')->insert([
            ['section_name' => 'carousel', 'order' => 1, 'is_active' => true],
            ['section_name' => 'fasilities', 'order' => 2, 'is_active' => true],
            ['section_name' => 'about', 'order' => 3, 'is_active' => true],
            ['section_name' => 'caltoaction', 'order' => 4, 'is_active' => true],
            ['section_name' => 'classes', 'order' => 5, 'is_active' => true],
            ['section_name' => 'appointment', 'order' => 6, 'is_active' => true],
            ['section_name' => 'teams', 'order' => 7, 'is_active' => true],
            ['section_name' => 'testimonials', 'order' => 8, 'is_active' => true],
        ]);
    }
}
