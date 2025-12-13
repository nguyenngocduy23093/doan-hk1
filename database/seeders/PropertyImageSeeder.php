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
        
        // Mapping đặc biệt cho một số properties
        $specialMappings = [
            // Căn hộ cao cấp The Metropole (property thứ 13) -> ảnh 11.x
            13 => 11,
            // Nhà trọ cao cấp Quận 12 (property thứ 20) -> ảnh 12.x  
            20 => 12,
            // Căn hộ dịch vụ Quận 3 (property thứ 15) -> ảnh 13.x
            15 => 13,
            // Căn hộ 2PN Sunrise City (property thứ 10) -> ảnh 14.x
            10 => 14,
        ];
        
        // Mỗi property có 6 ảnh (từ .1.jpg đến .6.jpg)
        foreach ($properties as $index => $property) {
            $propertyIndex = $index + 1; // Thứ tự property (1-20)
            
            // Kiểm tra xem có mapping đặc biệt không
            $actualImageIndex = $specialMappings[$propertyIndex] ?? $imageIndex;
            
            for ($imageNum = 1; $imageNum <= 6; $imageNum++) {
                $images[] = [
                    'property_id' => $property->property_id,
                    'image' => "/images/{$actualImageIndex}.{$imageNum}.jpg"
                ];
            }
            $imageIndex++;
        }
        
        \DB::table('property_images')->insert($images);
    }
}
