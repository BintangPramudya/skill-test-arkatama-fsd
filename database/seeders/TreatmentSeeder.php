<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Treatment::insert([
            ['name' => 'VAKSIN'],
            ['name' => 'GROOMING'],
            ['name' => 'PEMERIKSAAN'],
        ]);
    }
}
