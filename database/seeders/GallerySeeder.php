<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use Carbon\Carbon;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        // Gallery 1: Concours
        $gallery1 = Gallery::create([
            'title' => 'Concours CSO Internes',
            'date' => Carbon::parse('2024-06-15'),
            'cover_image' => 'img1.jpg', // Assuming this exists or will exist in img-stock
        ]);

        for ($i = 1; $i <= 5; $i++) {
            GalleryPhoto::create([
                'gallery_id' => $gallery1->id,
                'image_path' => 'img1.jpg', // Placeholder repetition
                'title' => 'Saut ' . $i,
            ]);
        }

        // Gallery 2: Fête du Club
        $gallery2 = Gallery::create([
            'title' => 'Fête du Club 2024',
            'date' => Carbon::parse('2024-06-30'),
            'cover_image' => 'img2.jpg',
        ]);

        for ($i = 1; $i <= 8; $i++) {
            GalleryPhoto::create([
                'gallery_id' => $gallery2->id,
                'image_path' => 'img2.jpg',
                'title' => 'Animation ' . $i,
            ]);
        }
        
        // Gallery 3: Stage
        $gallery3 = Gallery::create([
            'title' => 'Stage de Pâques',
            'date' => Carbon::parse('2024-04-10'),
            'cover_image' => 'test-photo-carrouselle.jpg',
        ]);
        
        GalleryPhoto::create([
            'gallery_id' => $gallery3->id,
            'image_path' => 'test-photo-carrouselle.jpg',
            'title' => 'Groupe complet',
        ]);
    }
}
