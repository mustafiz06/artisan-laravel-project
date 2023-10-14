<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category.index');
    }
    public function category_insert(Request $request)
    {
        $request->validate([
            'category_title' => 'required',
            'category_slug' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:800',
        ]);
        $new_name = $request->category_title . '.' . $request->file('image')->getClientOriginalExtension();
        $img = Image::make($request->file('image'))->resize(300, 200);
        $img->save(base_path('public/uploads/image/category/' . $new_name), 60);

        if ($request->hasFile('image')) {
            if ($request->category_slug) {
                Category::insert([
                    'title' => $request->category_title,
                    'slug' => Str::slug($request->category_slug),
                    'image' => $new_name,
                    'created_at' => now(),
                ]);
            } else {
                Category::insert([
                    'title' => $request->category_title,
                    'slug' => Str::slug($request->category_title),
                    'image' => $new_name,
                    'created_at' => now(),
                ]);
            }
        }
        return back()->with('category_insert_success','New Category insert successfully.');
    }
}
