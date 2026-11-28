<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            ProductSeeder::class,
            MemberSeeder::class,
            SocialMediaSeeder::class,
            OurBlogSeeder::class,
            OurGallerySeeder::class,
            CompanyValuesSeeder::class,
        ]);
    }
}
