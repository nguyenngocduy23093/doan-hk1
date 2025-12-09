<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\Categories;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Hiển thị danh sách BDS theo category (buy/rent/featured)
     * 
     * Cách hoạt động:
     * 1. Nhận category từ URL (buy, rent, hoặc featured)
     * 2. Lấy tất cả BDS thuộc category đó từ database
     * 3. Hỗ trợ filter theo giá, loại, số phòng ngủ, v.v
     * 4. Phân trang kết quả (12 BDS mỗi trang)
     * 5. Trả về view với danh sách BDS
     */
    public function listing($category)
    {
        // Kiểm tra category có hợp lệ không (chỉ chấp nhận buy, rent, featured)
        if (!in_array($category, ['buy', 'rent', 'featured'])) {
            // Nếu không hợp lệ, redirect về trang chủ
            return redirect('/');
        }

        // Bắt đầu query lấy BDS theo category
        $query = Properties::where('category', $category);

        // Lấy tất cả BDS và phân trang (12 BDS/trang)
        // paginate() tự động tạo links phân trang
        $properties = $query->orderBy('property_id', 'desc')
            ->paginate(12);

        // Lấy tất cả categories cho menu
        $categories = Categories::all();

        // Trả về view listing với data
        return view('guest.categories.listing', compact(
            'properties',    // Danh sách BDS đã phân trang
            'category',      // Category hiện tại (buy/rent/featured)
            'categories'     // Tất cả categories
        ));
    }

    /**
     * Hiển thị chi tiết 1 BDS
     * 
     * Cách hoạt động:
     * 1. Nhận property_id từ URL
     * 2. Tìm BDS trong database theo ID
     * 3. Nếu không tìm thấy, redirect về trang chủ
     * 4. Lấy các BDS liên quan (cùng category)
     * 5. Hiển thị chi tiết BDS
     */
    public function detail($id)
    {
        // Tìm BDS theo ID và load images
        // find() trả về 1 record hoặc null nếu không tìm thấy
        // with('images') = eager load relationship images
        $property = Properties::with('images')->find($id);

        // Nếu không tìm thấy BDS, redirect về trang chủ
        if (!$property) {
            return redirect('/')->with('error', 'Không tìm thấy bất động sản');
        }

        // Lấy 4 BDS liên quan (cùng category, khác ID)
        // where('category', $property->category) = cùng category
        // where('property_id', '!=', $id) = loại trừ BDS hiện tại
        // inRandomOrder() = sắp xếp ngẫu nhiên
        // limit(4) = chỉ lấy 4 cái
        $relatedProperties = Properties::where('category', $property->category)
            ->where('property_id', '!=', $id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        // Trả về view detail với data
        return view('guest.properties.detail', compact(
            'property',           // Thông tin BDS hiện tại
            'relatedProperties'   // Danh sách BDS liên quan
        ));
    }
}
