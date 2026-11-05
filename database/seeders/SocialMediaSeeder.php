<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('social_media')->updateOrInsert(
            ['id' => 1],
            [
                'id' => 1,
                'url' => 'https://www.instagram.com/arbo.ind/',
                'aria-label' => 'Instagram',
            ]
        );
    }
}
