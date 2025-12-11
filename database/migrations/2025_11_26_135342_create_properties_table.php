<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {

            // Khóa chính đúng chuẩn project cũ
            $table->bigIncrements('property_id');

            // Thông tin cơ bản
            $table->string('title');
            $table->text('description')->nullable();

            // Giá tiền
            $table->decimal('price', 15, 2)->nullable();

            // Địa chỉ
            $table->string('location')->nullable();

            // Loại giao dịch: Buy / Rent
            $table->enum('type', ['buy', 'rent']);

            // Category: apartment, villa, house, studio...
            $table->string('category')->nullable();

            // Thông số nhà
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->string('furnishing')->nullable();
            $table->decimal('area', 10, 2)->nullable();

            // Ảnh đại diện (lưu đường dẫn file)
            $table->string('image_thumbnail')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
