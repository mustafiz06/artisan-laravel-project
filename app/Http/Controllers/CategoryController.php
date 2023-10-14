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
        $categories = Category::all();
        return view('dashboard.category.index', compact('categories'));
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
        return back()->with('category_insert_success', 'New Category insert successfully.');
    }
    public function category_delete($id)
    {
        Category::find($id)->delete();
        return back()->with('category_delete_success', 'Category deleted successfully.');
    }

    public function status_change($id)
    {
        $category = Category::where('id', $id)->first();

        if ($category->status == 'active') {
            $category = Category::find($id);
            $category->status = 'deactive';
            $category->created_at = now();
            $category->save();
            return back()->with('status_change', 'Status Change successfully.');
        } else {
            $category = Category::find($id);
            $category->status = 'active';
            $category->created_at = now();
            $category->save();
            return back()->with('status_change', 'Status Change successfully.');
        }
    }



    public function category_edit(Request $request, $id)
    {

        return back()->with('category_edit_success', 'Category update successfully.');
    }
}
