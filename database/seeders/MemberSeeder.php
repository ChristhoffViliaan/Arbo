<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            ['id' => 1, 'name' => 'Catherine Sanjaya', 'title' => 'CEO', 'image' => 'members/Catherine Sanjaya.png'],
            ['id' => 2, 'name' => 'Rio Marcellino', 'title' => 'CFO', 'image' => 'members/Rio Marcellino.png'],
            ['id' => 3, 'name' => 'Jannice Ruvinda Sufianto', 'title' => 'Director', 'image' => 'members/Jannice Ruvinda Sufianto.png'],
            ['id' => 4, 'name' => 'James Devara Isnardy', 'title' => 'COO', 'image' => 'members/James Devara Isnardy.png'],
            ['id' => 5, 'name' => 'Gabriella Maria Taffyanna Santoso', 'title' => 'CFO', 'image' => 'members/Gabriella Maria Taffyanna Santoso.png'],
        ];

        foreach ($members as $member) {
            DB::table('members')->updateOrInsert(['id' => $member['id']], $member);
        }
    }
}
