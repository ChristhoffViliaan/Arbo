<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurGallerySeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            '1.png', '2.png', '3.png', '4.png', '5.png',
            '6.png', '7.png', '8.png', '9.png', '10.png',
        ];

        foreach ($images as $index => $image) {
            $id = $index + 1;

            DB::table('our_galleries')->updateOrInsert(
                ['id' => $id],
                [
                    'id' => $id,
                    'image' => 'ourgallery/' . $image,
                    'alt_text' => 'Arbo wood materials and production, gallery image ' . $id,
                ]
            );
        }
    }
}
