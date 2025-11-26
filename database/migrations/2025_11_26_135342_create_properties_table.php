<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
        $table->id();
        $table->string('title');          // Tên tiêu đề (Search by name/title)
        $table->text('description');      // Mô tả
        $table->decimal('price', 15, 2);  // Giá tiền (Filter price range)
        $table->string('location');       // Địa chỉ (Filter location)
        
        // Các cột phục vụ cho bộ lọc (Filter options)
        $table->enum('type', ['buy', 'rent']); // Mua hay Thuê
        $table->string('category')->nullable(); // Loại: Apartment, Villa...
        $table->integer('bedrooms');      // Số phòng ngủ
        $table->integer('bathrooms');     // Số phòng tắm
        $table->string('furnishing')->nullable(); // Nội thất (Furnished...)
        $table->decimal('area', 10, 2)->nullable(); // Diện tích
        
        $table->string('image_thumbnail')->nullable(); // Ảnh đại diện
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
