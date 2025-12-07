<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy tất cả property_id từ database
        $properties = \DB::table('properties')->orderBy('property_id')->get();
        
        $images = [];
        $imageIndex = 1;
        
        // Mỗi property có 6 ảnh (từ .1.jpg đến .6.jpg)
        foreach ($properties as $property) {
            for ($imageNum = 1; $imageNum <= 6; $imageNum++) {
                $images[] = [
                    'property_id' => $property->property_id,
                    'image' => "/images/{$imageIndex}.{$imageNum}.jpg"
                ];
            }
            $imageIndex++;
        }
        
        \DB::table('property_images')->insert($images);
    }
}
