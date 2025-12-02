# 🚀 Hướng dẫn Setup Project

## Yêu cầu
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL (XAMPP/WAMP/Laragon)

## Các bước setup

### 1. Clone project
```bash
git clone https://github.com/nguyenngocduy23093/doan-hk1.git
cd doan-hk1
```

### 2. Install dependencies
```bash
composer install
npm install
```

### 3. Setup environment
```bash
# Copy file .env.example thành .env
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Config database
Mở file `.env` và sửa thông tin database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=realestatepro
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Tạo database
- Mở phpMyAdmin (http://localhost/phpmyadmin)
- Tạo database mới tên `realestatepro`
- Import file `RealEstatePro.sql` (nếu có)

### 6. Build assets
```bash
npm run build
```

### 7. Chạy server
```bash
php artisan serve
```

Mở browser: http://127.0.0.1:8000

## ⚠️ Lỗi thường gặp

### Lỗi: Vite manifest not found
**Nguyên nhân:** Chưa build assets

**Cách fix:**
```bash
npm install
npm run build
```

### Lỗi: Database connection refused
**Nguyên nhân:** MySQL chưa chạy

**Cách fix:**
- Mở XAMPP Control Panel
- Start MySQL
- Refresh lại browser

### Lỗi: Class not found
**Nguyên nhân:** Chưa install composer

**Cách fix:**
```bash
composer install
```

## 📝 Lưu ý
- Luôn chạy `npm run build` sau khi pull code mới
- Không commit file `.env` lên Git
- Không commit folder `node_modules` và `vendor`
