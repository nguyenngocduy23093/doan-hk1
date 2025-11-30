<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Hiển thị trang chủ
     * 
     * Cách hoạt động:
     * 1. Truy vấn database lấy các BDS (properties) theo từng loại
     * 2. Lấy danh sách categories để hiển thị menu
     * 3. Truyền tất cả data vào view home.blade.php
     * 4. View sẽ hiển thị các BDS nổi bật, cho thuê, bán
     */
    public function index()
    {
        // Lấy 6 BDS nổi bật (featured) mới nhất
        // where('category', 'featured') = lọc những BDS có category là 'featured'
        // orderBy('property_id', 'desc') = sắp xếp theo ID giảm dần (mới nhất trước)
        // limit(6) = chỉ lấy 6 cái
        // get() = thực thi query và lấy kết quả
        $featuredProperties = Properties::where('category', 'featured')
            ->orderBy('property_id', 'desc')
            ->limit(6)
            ->get();

        // Lấy 6 BDS cho thuê (rent) mới nhất
        // Logic tương tự như trên, chỉ khác category là 'rent'
        $rentProperties = Properties::where('category', 'rent')
            ->orderBy('property_id', 'desc')
            ->limit(6)
            ->get();

        // Lấy 6 BDS bán (buy) mới nhất
        // Logic tương tự như trên, chỉ khác category là 'buy'
        $buyProperties = Properties::where('category', 'buy')
            ->orderBy('property_id', 'desc')
            ->limit(6)
            ->get();

        // Lấy tất cả categories từ database
        // all() = lấy tất cả records trong bảng categories
        $categories = Categories::all();

        // Trả về view 'guest.home' (file: resources/views/guest/home.blade.php)
        // compact() = tạo array với key là tên biến, value là giá trị biến
        // Các biến này sẽ được truyền vào view để hiển thị
        return view('guest.home', compact(
            'featuredProperties',  // Danh sách BDS nổi bật
            'rentProperties',      // Danh sách BDS cho thuê
            'buyProperties',       // Danh sách BDS bán
            'categories'           // Danh sách categories
        ));
    }
}
