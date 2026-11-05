<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurBlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'id' => 1,
                'subtext' => 'Materials · 5 min read',
                'description' => 'Small changes in how we use wood can create meaningful value across the material lifecycle.',
                'title' => 'Wood Waste',
                'image' => 'ourblog/1.png',
            ],
            [
                'id' => 2,
                'subtext' => 'Insights · 4 min read',
                'description' => 'Thoughtful processing can turn wood by-products into a useful part of the resource cycle.',
                'title' => 'Biomass Use',
                'image' => 'ourblog/2.png',
            ],
            [
                'id' => 3,
                'subtext' => 'Our approach · 6 min read',
                'description' => 'Quality is built into every decision, from sourcing and sorting through to the final product.',
                'title' => 'Quality First',
                'image' => 'ourblog/3.png',
            ],
        ];

        foreach ($blogs as $blog) {
            DB::table('our_blogs')->updateOrInsert(['id' => $blog['id']], $blog);
        }
    }
}
