-- =====================================================
-- CẬP NHẬT ẢNH CHO DỰ ÁN REAL ESTATE PRO
-- Ngày: 13/12/2024
-- Mục đích: Cập nhật ảnh chính và ảnh gallery cho 4 sản phẩm
-- =====================================================

-- 1. CẬP NHẬT ẢNH CHÍNH (main_image) trong bảng properties
UPDATE properties SET main_image = '/images/11.1.jpg' WHERE title = 'Căn hộ cao cấp The Metropole';
UPDATE properties SET main_image = '/images/12.1.jpg' WHERE title = 'Nhà trọ cao cấp Quận 12';
UPDATE properties SET main_image = '/images/13.1.jpg' WHERE title = 'Căn hộ dịch vụ Quận 3';
UPDATE properties SET main_image = '/images/14.1.jpg' WHERE title = 'Căn hộ 2PN Sunrise City';

-- 2. CẬP NHẬT ẢNH GALLERY trong bảng property_images

-- 2.1. Căn hộ cao cấp The Metropole (ID: 53) -> ảnh 11.x
UPDATE property_images SET image = '/images/11.1.jpg' WHERE property_id = 53 AND image LIKE '%.1.jpg';
UPDATE property_images SET image = '/images/11.2.jpg' WHERE property_id = 53 AND image LIKE '%.2.jpg';
UPDATE property_images SET image = '/images/11.3.jpg' WHERE property_id = 53 AND image LIKE '%.3.jpg';
UPDATE property_images SET image = '/images/11.4.jpg' WHERE property_id = 53 AND image LIKE '%.4.jpg';
UPDATE property_images SET image = '/images/11.5.jpg' WHERE property_id = 53 AND image LIKE '%.5.jpg';
UPDATE property_images SET image = '/images/11.6.jpg' WHERE property_id = 53 AND image LIKE '%.6.jpg';

-- 2.2. Nhà trọ cao cấp Quận 12 (ID: 60) -> ảnh 12.x
UPDATE property_images SET image = '/images/12.1.jpg' WHERE property_id = 60 AND image LIKE '%.1.jpg';
UPDATE property_images SET image = '/images/12.2.jpg' WHERE property_id = 60 AND image LIKE '%.2.jpg';
UPDATE property_images SET image = '/images/12.3.jpg' WHERE property_id = 60 AND image LIKE '%.3.jpg';
UPDATE property_images SET image = '/images/12.4.jpg' WHERE property_id = 60 AND image LIKE '%.4.jpg';
UPDATE property_images SET image = '/images/12.5.jpg' WHERE property_id = 60 AND image LIKE '%.5.jpg';
UPDATE property_images SET image = '/images/12.6.jpg' WHERE property_id = 60 AND image LIKE '%.6.jpg';

-- 2.3. Căn hộ dịch vụ Quận 3 (ID: 55) -> ảnh 13.x
UPDATE property_images SET image = '/images/13.1.jpg' WHERE property_id = 55 AND image LIKE '%.1.jpg';
UPDATE property_images SET image = '/images/13.2.jpg' WHERE property_id = 55 AND image LIKE '%.2.jpg';
UPDATE property_images SET image = '/images/13.3.jpg' WHERE property_id = 55 AND image LIKE '%.3.jpg';
UPDATE property_images SET image = '/images/13.4.jpg' WHERE property_id = 55 AND image LIKE '%.4.jpg';
UPDATE property_images SET image = '/images/13.5.jpg' WHERE property_id = 55 AND image LIKE '%.5.jpg';
UPDATE property_images SET image = '/images/13.6.jpg' WHERE property_id = 55 AND image LIKE '%.6.jpg';

-- 2.4. Căn hộ 2PN Sunrise City (ID: 50) -> ảnh 14.x
UPDATE property_images SET image = '/images/14.1.jpg' WHERE property_id = 50 AND image LIKE '%.1.jpg';
UPDATE property_images SET image = '/images/14.2.jpg' WHERE property_id = 50 AND image LIKE '%.2.jpg';
UPDATE property_images SET image = '/images/14.3.jpg' WHERE property_id = 50 AND image LIKE '%.3.jpg';
UPDATE property_images SET image = '/images/14.4.jpg' WHERE property_id = 50 AND image LIKE '%.4.jpg';
UPDATE property_images SET image = '/images/14.5.jpg' WHERE property_id = 50 AND image LIKE '%.5.jpg';
UPDATE property_images SET image = '/images/14.6.jpg' WHERE property_id = 50 AND image LIKE '%.6.jpg';

-- 3. KIỂM TRA KẾT QUẢ
-- Chạy các lệnh này để kiểm tra xem đã cập nhật thành công chưa:

-- Kiểm tra ảnh chính
SELECT property_id, title, main_image FROM properties 
WHERE title IN (
    'Căn hộ cao cấp The Metropole',
    'Nhà trọ cao cấp Quận 12', 
    'Căn hộ dịch vụ Quận 3',
    'Căn hộ 2PN Sunrise City'
);

-- Kiểm tra ảnh gallery
SELECT pi.property_id, p.title, pi.image 
FROM property_images pi 
JOIN properties p ON pi.property_id = p.property_id 
WHERE p.title IN (
    'Căn hộ cao cấp The Metropole',
    'Nhà trọ cao cấp Quận 12', 
    'Căn hộ dịch vụ Quận 3',
    'Căn hộ 2PN Sunrise City'
)
ORDER BY pi.property_id, pi.image;

-- =====================================================
-- HOÀN THÀNH CẬP NHẬT
-- =====================================================