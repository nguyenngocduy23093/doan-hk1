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
                'main_image' => '/images/1.1.jpg',
                'location' => 'Quận Bình Thạnh, TP.HCM',
                'type' => 'apartment',
                'category' => 'featured',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 120,
                'furnished' => 1,
                'amenities' => 'Hồ bơi, Gym, Công viên, Siêu thị, Trường học',
                'gps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5970.657965214509!2d106.71641423551412!3d10.795902396406087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175298be4b72f09%3A0x518f5a5f68d9c974!2sLandmark%201%20%E2%80%93%20Vinhomes%20Central%20Park!5e1!3m2!1svi!2s!4v1765029456684!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'title' => 'Biệt thự đơn lập Phú Mỹ Hưng',
                'price' => 18000000000,
                'main_image' => '/images/2.1.jpg',
                'location' => 'Quận 7, TP.HCM',
                'type' => 'villa',
                'category' => 'featured',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'area' => 350,
                'furnished' => 1,
                'amenities' => 'Sân vườn, Garage, Hồ bơi riêng, BBQ',
                'gps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2985.9346036472334!2d106.7059582735513!3d10.734775959963574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f0a3f862e81%3A0x7988743b893d3f39!2zS2h1IGJp4buHdCB0aOG7sSBIxrBuZyBUaMOhaSAtIFBow7ogTeG7uSBIxrBuZw!5e1!3m2!1svi!2s!4v1765029561116!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'title' => 'Penthouse The Landmark 81',
                'price' => 25000000000,
                'main_image' => '/images/3.1.jpg',
                'location' => 'Quận Bình Thạnh, TP.HCM',
                'type' => 'apartment',
                'category' => 'featured',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'area' => 250,
                'furnished' => 1,
                'amenities' => 'Sky bar, Infinity pool, Private elevator, Spa',
                'gps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1492.67258023432!2d106.72145738822456!3d10.79427398209179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0b42fe348728f%3A0xa5708add5822d367!2zQ8SDbiBI4buZIExhbmRtYXJrIDgx!5e1!3m2!1svi!2s!4v1765029585366!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],

            // Properties for Rent
            [
                'title' => 'Căn hộ 2PN Masteri Thảo Điền',
                'price' => 15000000,
                'main_image' => '/images/4.1.jpg',
                'location' => 'Quận 2, TP.HCM',
                'type' => 'apartment',
                'category' => 'rent',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => 75,
                'furnished' => 1,
                'amenities' => 'Hồ bơi, Gym, Siêu thị',
                'gps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23882.717745911465!2d106.70013986976359!3d10.794821807472385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527974455a5ef%3A0xbd9bb262be107ad7!2sMasteri%20Thao%20Dien%20-%20T2!5e1!3m2!1svi!2s!4v1765029608932!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'title' => 'Nhà phố 1 trệt 2 lầu Gò Vấp',
                'price' => 12000000,
                'main_image' => '/images/5.1.jpg',
                'location' => 'Quận Gò Vấp, TP.HCM',
                'type' => 'house',
                'category' => 'rent',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'area' => 100,
                'furnished' => 0,
                'amenities' => 'Sân để xe, Ban công',
                'gps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95517.61233324862!2d106.52023764335934!3d10.836449000000018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175291c122be957%3A0xccf8e4fdc826ea0c!2zQsOhbiBuaMOgIHBo4buRIEfDsiBW4bqlcA!5e1!3m2!1svi!2s!4v1765029629979!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'title' => 'Studio The Sun Avenue',
                'price' => 8000000,
                'main_image' => '/images/6.1.jpg',
                'location' => 'Quận 2, TP.HCM',
                'type' => 'apartment',
                'category' => 'rent',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'area' => 35,
                'furnished' => 1,
                'amenities' => 'Hồ bơi, Gym, Bảo vệ 24/7',
                'gps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2985.428401432822!2d106.74788437355204!3d10.78589135902211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526757f98f317%3A0xfca603629a2a0aab!2zVGhlIFN1biBBdmVudWUsIDgvNS85IE1haSBDaMOtIFRo4buNLCBBbiBQaMO6LCBUaOG7pyDEkOG7qWMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCA3MDAwMCwgVmnhu4d0IE5hbQ!5e1!3m2!1svi!2s!4v1765029646492!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],

            // Properties for Sale
            [
                'title' => 'Căn hộ 3PN Saigon Pearl',
                'price' => 6800000000,
                'main_image' => '/images/7.1.jpg',
                'location' => 'Quận Bình Thạnh, TP.HCM',
                'type' => 'apartment',
                'category' => 'buy',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 135,
                'furnished' => 1,
                'amenities' => 'Hồ bơi, Gym, Công viên, Siêu thị',
                'gps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23885.26008805046!2d106.66260011083982!3d10.762786000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f28f845e3fd%3A0xdad907a2fc111ae5!2sSaigon%20Apartment!5e1!3m2!1svi!2s!4v1765029664478!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'title' => 'Nhà mặt tiền Phan Văn Trị',
                'price' => 15000000000,
                'main_image' => '/images/8.1.jpg',
                'location' => 'Quận Gò Vấp, TP.HCM',
                'type' => 'house',
                'category' => 'buy',
                'bedrooms' => 4,
                'bathrooms' => 4,
                'area' => 200,
                'furnished' => 0,
                'amenities' => 'Mặt tiền rộng, Gần chợ',
                'gps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23885.804975070307!2d106.642125248909!3d10.755907661609053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f02e47a33d1%3A0x78f63f120f5383fe!2zQ2h1bmcgQ8awIFBoYW4gVsSDbiBUcuG7iw!5e1!3m2!1svi!2s!4v1765029688076!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'title' => 'Đất nền KDC Phú Hữu',
                'price' => 3500000000,
                'main_image' => '/images/9.1.jpg',
                'location' => 'Quận 9, TP.HCM',
                'type' => 'land',
                'category' => 'buy',
                'bedrooms' => 0,
                'bathrooms' => 0,
                'area' => 100,
                'furnished' => 0,
                'amenities' => 'Điện nước đầy đủ, Đường nhựa',
                'gps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11941.190959819336!2d106.77168635541993!3d10.799046499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752696edbf6f1f%3A0x98533e62f0244beb!2zS0RDIFBow7ogSOG7r3U!5e1!3m2!1svi!2s!4v1765029703875!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'title' => 'Căn hộ 2PN Sunrise City',
                'price' => 4200000000,
                'main_image' => '/images/1.1.jpg',
                'location' => 'Quận 7, TP.HCM',
                'type' => 'apartment',
                'category' => 'buy',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => 90,
                'furnished' => 0,
                'amenities' => 'Hồ bơi, Gym, Công viên',
                'gps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95547.2176278686!2d106.55686854335937!3d10.743280100000009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fdf567ca299%3A0x3de2caf329bca8e7!2zQ8SDbiBo4buZIFN1bnJpc2UgQ2l0eQ!5e1!3m2!1svi!2s!4v1765029726034!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
        ];

        foreach ($properties as $property) {
            \App\Models\Properties::create($property);
        }
    }
}


