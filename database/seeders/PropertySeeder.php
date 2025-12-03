<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            // Featured Properties
            [
                'title' => 'Căn hộ cao cấp Vinhomes Central Park',
                'price' => 5500000000,
                'image_main_url' => '/images/1.1.jpg',
                'location' => 'Quận Bình Thạnh, TP.HCM',
                'description' => 'Căn hộ 3 phòng ngủ view sông Saigon tuyệt đẹp, nội thất cao cấp, đầy đủ tiện nghi.',
                'type' => 'apartment',
                'category' => 'featured',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 120,
                'furnishing' => 'furnished',
                'amenities' => 'Hồ bơi, Gym, Công viên, Siêu thị, Trường học',
                'gps' => '10.7881,106.7217'
            ],
            [
                'title' => 'Biệt thự đơn lập Phú Mỹ Hưng',
                'price' => 18000000000,
                'image_main_url' => '/images/2.1.jpg',
                'location' => 'Quận 7, TP.HCM',
                'description' => 'Biệt thự sang trọng 2 tầng, sân vườn rộng, khu an ninh 24/7.',
                'type' => 'villa',
                'category' => 'featured',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'area' => 350,
                'furnishing' => 'furnished',
                'amenities' => 'Sân vườn, Garage, Hồ bơi riêng, BBQ',
                'gps' => '10.7411,106.6985'
            ],
            [
                'title' => 'Penthouse The Landmark 81',
                'price' => 25000000000,
                'image_main_url' => '/images/3.1.jpg',
                'location' => 'Quận Bình Thạnh, TP.HCM',
                'description' => 'Penthouse đỉnh cao xa xỉ tại tòa nhà cao nhất Việt Nam.',
                'type' => 'apartment',
                'category' => 'featured',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'area' => 250,
                'furnishing' => 'furnished',
                'amenities' => 'Sky bar, Infinity pool, Private elevator, Spa',
                'gps' => '10.7945,106.7218'
            ],

            // Properties for Rent
            [
                'title' => 'Căn hộ 2PN Masteri Thảo Điền',
                'price' => 15000000,
                'image_main_url' => '/images/4.1.jpg',
                'location' => 'Quận 2, TP.HCM',
                'description' => 'Căn hộ hiện đại, đầy đủ nội thất, view đẹp, gần trung tâm.',
                'type' => 'apartment',
                'category' => 'rent',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => 75,
                'furnishing' => 'furnished',
                'amenities' => 'Hồ bơi, Gym, Siêu thị',
                'gps' => '10.8006,106.7442'
            ],
            [
                'title' => 'Nhà phố 1 trệt 2 lầu Gò Vấp',
                'price' => 12000000,
                'image_main_url' => '/images/5.1.jpg',
                'location' => 'Quận Gò Vấp, TP.HCM',
                'description' => 'Nhà mới xây, thoáng mát, gần chợ, trường học.',
                'type' => 'house',
                'category' => 'rent',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'area' => 100,
                'furnishing' => 'unfurnished',
                'amenities' => 'Sân để xe, Ban công',
                'gps' => '10.8376,106.6676'
            ],
            [
                'title' => 'Studio The Sun Avenue',
                'price' => 8000000,
                'image_main_url' => '/images/6.1.jpg',
                'location' => 'Quận 2, TP.HCM',
                'description' => 'Studio nhỏ gọn, đầy đủ tiện nghi, phù hợp sinh viên, người đi làm.',
                'type' => 'apartment',
                'category' => 'rent',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'area' => 35,
                'furnishing' => 'furnished',
                'amenities' => 'Hồ bơi, Gym, Bảo vệ 24/7',
                'gps' => '10.7943,106.7442'
            ],

            // Properties for Sale
            [
                'title' => 'Căn hộ 3PN Saigon Pearl',
                'price' => 6800000000,
                'image_main_url' => '/images/7.1.jpg',
                'location' => 'Quận Bình Thạnh, TP.HCM',
                'description' => 'Căn góc view sông, nội thất cao cấp, sổ hồng chính chủ.',
                'type' => 'apartment',
                'category' => 'buy',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 135,
                'furnishing' => 'furnished',
                'amenities' => 'Hồ bơi, Gym, Công viên, Siêu thị',
                'gps' => '10.7881,106.7217'
            ],
            [
                'title' => 'Nhà mặt tiền Phan Văn Trị',
                'price' => 15000000000,
                'image_main_url' => '/images/8.1.jpg',
                'location' => 'Quận Gò Vấp, TP.HCM',
                'description' => 'Nhà mặt tiền kinh doanh sầm uất, 1 trệt 3 lầu.',
                'type' => 'house',
                'category' => 'buy',
                'bedrooms' => 4,
                'bathrooms' => 4,
                'area' => 200,
                'furnishing' => 'unfurnished',
                'amenities' => 'Mặt tiền rộng, Gần chợ',
                'gps' => '10.8376,106.6676'
            ],
            [
                'title' => 'Đất nền KDC Phú Hữu',
                'price' => 3500000000,
                'image_main_url' => '/images/9.1.jpg',
                'location' => 'Quận 9, TP.HCM',
                'description' => 'Đất nền sổ đỏ, khu dân cư cao cấp, hạ tầng hoàn thiện.',
                'type' => 'land',
                'category' => 'buy',
                'bedrooms' => 0,
                'bathrooms' => 0,
                'area' => 100,
                'furnishing' => 'unfurnished',
                'amenities' => 'Điện nước đầy đủ, Đường nhựa',
                'gps' => '10.8411,106.7943'
            ],
            [
                'title' => 'Căn hộ 2PN Sunrise City',
                'price' => 4200000000,
                'image_main_url' => '/images/1.1.jpg',
                'location' => 'Quận 7, TP.HCM',
                'description' => 'Căn hộ view đẹp, nội thất cơ bản, giá tốt.',
                'type' => 'apartment',
                'category' => 'buy',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => 90,
                'furnishing' => 'unfurnished',
                'amenities' => 'Hồ bơi, Gym, Công viên',
                'gps' => '10.7411,106.6985'
            ],
        ];

        foreach ($properties as $property) {
            \App\Models\Properties::create($property);
        }
    }
}
