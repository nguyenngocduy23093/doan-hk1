<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\Categories;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Tìm kiếm và lọc BDS
     * 
     * Cách hoạt động:
     * 1. Nhận các tham số tìm kiếm từ form (keyword, category, price, type, v.v)
     * 2. Build query động dựa trên các filter được chọn
     * 3. Thực hiện tìm kiếm trong database
     * 4. Phân trang kết quả
     * 5. Trả về view với kết quả tìm kiếm
     */
    public function search(Request $request)
    {
        // Bắt đầu query cơ bản
        $query = Properties::query();

        // FILTER 1: Tìm kiếm theo keyword (title hoặc location)
        // $request->filled('keyword') = kiểm tra có nhập keyword không
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            // where() với function = tạo group điều kiện (title LIKE hoặc location LIKE)
            // orWhere = điều kiện OR
            // '%'.$keyword.'%' = tìm kiếm có chứa keyword (ví dụ: 'nhà' tìm được 'nhà đẹp', 'bán nhà')
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('location', 'LIKE', '%' . $keyword . '%');
            });
        }

        // FILTER 2: Lọc theo category (buy/rent/featured)
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // FILTER 3: Lọc theo loại BDS (apartment/house/villa/land)
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // FILTER 4: Lọc theo khoảng giá
        // Giá tối thiểu
        if ($request->filled('min_price')) {
            // where('price', '>=', $request->min_price) = giá >= giá tối thiểu
            $query->where('price', '>=', $request->min_price);
        }
        // Giá tối đa
        if ($request->filled('max_price')) {
            // where('price', '<=', $request->max_price) = giá <= giá tối đa
            $query->where('price', '<=', $request->max_price);
        }

        // FILTER 5: Lọc theo số phòng ngủ
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }

        // FILTER 6: Lọc theo số phòng tắm
        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', '>=', $request->bathrooms);
        }

        // FILTER 7: Lọc theo diện tích (m²)
        if ($request->filled('min_area')) {
            $query->where('area', '>=', $request->min_area);
        }
        if ($request->filled('max_area')) {
            $query->where('area', '<=', $request->max_area);
        }

        // FILTER 8: Lọc theo tình trạng nội thất (furnished/unfurnished)
        if ($request->filled('furnished')) {
            $query->where('furnished', $request->furnished);
        }

        // Sắp xếp kết quả
        // Mặc định: mới nhất trước
        $sortBy = $request->get('sort_by', 'newest');
        switch ($sortBy) {
            case 'price_asc':
                // Giá thấp đến cao
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                // Giá cao đến thấp
                $query->orderBy('price', 'desc');
                break;
            case 'oldest':
                // Cũ nhất trước
                $query->orderBy('property_id', 'asc');
                break;
            default:
                // Mới nhất trước (mặc định)
                $query->orderBy('property_id', 'desc');
        }

        // Thực hiện query và phân trang (12 BDS/trang)
        // appends($request->all()) = giữ lại các filter khi chuyển trang
        $properties = $query->paginate(12)->appends($request->all());

        // Đếm tổng số kết quả
        $totalResults = $properties->total();

        // Lấy tất cả categories cho filter dropdown
        $categories = Categories::all();

        // Trả về view search với data
        return view('guest.search', compact(
            'properties',      // Danh sách BDS tìm được
            'totalResults',    // Tổng số kết quả
            'categories',      // Danh sách categories
            'request'          // Request để giữ lại giá trị filter trong form
        ));
    }
}
