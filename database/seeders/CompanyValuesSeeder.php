<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyValuesSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            [
                'id' => 1,
                'icon' => 'accountability',
                'title' => 'Accountability',
                'description' => 'We take ownership and stand behind our work.',
            ],
            [
                'id' => 2,
                'icon' => 'reliability',
                'title' => 'Reliability',
                'description' => 'Consistency and care in every commitment.',
            ],
            [
                'id' => 3,
                'icon' => 'breakthrough',
                'title' => 'Breakthrough',
                'description' => 'Curiosity and collaboration move us forward.',
            ],
            [
                'id' => 4,
                'icon' => 'ownership',
                'title' => 'Ownership',
                'description' => 'We care for our people, materials, and results.',
            ],
        ];

        foreach ($values as $value) {
            DB::table('company_values')->updateOrInsert(['id' => $value['id']], $value);
        }
    }
}
