<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Storage;

class AdminPropertyController extends Controller
{
    // ================================
    // LIST
    // ================================
    public function index()
    {
        $properties = Properties::orderBy('property_id', 'DESC')->get();
        return view('admin.properties.index', compact('properties'));
    }

    // ================================
    // CREATE VIEW
    // ================================
    public function create()
    {
        return view('admin.properties.create');
    }

    // ================================
    // STORE PROPERTY
    // ================================
    public function store(Request $r)
    {
        // --- MAIN IMAGE (ảnh đại diện) ---
        $main_image_path = null;

        if ($r->hasFile('main_image')) {
            $main_image_path = $r->file('main_image')->store('properties', 'public');
        }

        // --- CREATE PROPERTY ---
        $property = Properties::create([
            "title"      => $r->title,
            "price"      => $r->price,
            "main_image" => $main_image_path, // LƯU ĐƯỜNG DẪN FILE
            "location"   => $r->location,
            "type"       => $r->type,
            "category"   => $r->category,
            "bedrooms"   => $r->bedrooms,
            "bathrooms"  => $r->bathrooms,
            "area"       => $r->area,
            "furnished"  => $r->furnished,
            "amenities"  => $r->amenities,
            "gps"        => $r->gps
        ]);

        // --- MULTI IMAGES UPLOAD ---
        if ($r->hasFile('images')) {
            foreach ($r->file('images') as $img) {
                $path = $img->store('properties/gallery', 'public');

                PropertyImage::create([
                    'property_id' => $property->property_id,
                    'image_path'  => $path // LƯU ĐƯỜNG DẪN
                ]);
            }
        }

        return redirect()->route('admin.properties.index');
    }

    // ================================
    // EDIT VIEW
    // ================================
    public function edit($id)
    {
        $property = Properties::findOrFail($id);
        $images = PropertyImage::where('property_id', $id)->get();

        return view('admin.properties.edit', compact('property', 'images'));
    }

    // ================================
    // UPDATE PROPERTY
    // ================================
    public function update(Request $r, $id)
    {
        $property = Properties::findOrFail($id);

        // --- MAIN IMAGE ---
        $main_image_path = $property->main_image;

        if ($r->hasFile('main_image')) {

            // Xoá ảnh cũ nếu tồn tại
            if ($main_image_path) {
                Storage::disk('public')->delete($main_image_path);
            }

            $main_image_path = $r->file('main_image')->store('properties', 'public');
        }

        // --- UPDATE PROPERTY ---
        $property->update([
            "title"      => $r->title,
            "price"      => $r->price,
            "main_image" => $main_image_path,
            "location"   => $r->location,
            "type"       => $r->type,
            "category"   => $r->category,
            "bedrooms"   => $r->bedrooms,
            "bathrooms"  => $r->bathrooms,
            "area"       => $r->area,
            "furnished"  => $r->furnished,
            "amenities"  => $r->amenities,
            "gps"        => $r->gps
        ]);

        // --- UPLOAD MORE GALLERY IMAGES ---
        if ($r->hasFile('images')) {
            foreach ($r->file('images') as $img) {

                $path = $img->store('properties/gallery', 'public');

                PropertyImage::create([
                    'property_id' => $property->property_id,
                    'image_path'  => $path
                ]);
            }
        }

        return redirect()->route('admin.properties.index');
    }

    // ================================
    // DELETE PROPERTY
    // ================================
    public function destroy(Request $r)
    {
        $property = Properties::findOrFail($r->property_id);

        // Xoá ảnh chính
        if ($property->main_image) {
            Storage::disk('public')->delete($property->main_image);
        }

        // Xoá ảnh gallery
        foreach ($property->images as $img) {
            Storage::disk('public')->delete($img->image_path);
            $img->delete();
        }

        // Xoá property
        $property->delete();

        return redirect()->back();
    }
}
