<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('dashboard.blog.index', compact('blogs'));
    }

    // add blog ....................
    public function blog_add()
    {
        $categories = Category::paginate(5);
        return view('dashboard.blog.add_blog', compact('categories'));
    }
    public function blog_add_post(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'date' => 'required',
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:800',
        ]);
        $new_name = $request->title . '.' . $request->file('image')->getClientOriginalExtension();
        $img = Image::make($request->file('image'))->resize(300, 200);
        $img->save(base_path('public/uploads/image/blogs/' . $new_name), 60);

        if ($request->hasFile('image')) {
            Blog::insert([
                'user_id' => auth()->id(),
                'category_id' => $request->category,
                'title' => $request->title,
                'date' => $request->date,
                'details' => $request->details,
                'image' => $new_name,
                'created_at' => now(),
            ]);

            return back()->with('blog_insert_success', 'New blog insert successfully.');
        } else {
            return back()->with('blog_insert_error', 'New blog insert error.');
        }
    }


    public function blog_delete($id)
    {
        Blog::find($id)->delete();
        return back()->with('blog_delete_success', 'Blog deleted successfully.');
    }


    public function blog_status_change($id)
    {
        $blogs = Blog::where('id', $id)->first();

        if ($blogs->status == 'active') {
            $blogs = Blog::find($id);
            $blogs->status = 'deactive';
            $blogs->created_at = now();
            $blogs->save();
            return back()->with('status_change', 'Status Change successfully.');
        } else {
            $blogs = Blog::find($id);
            $blogs->status = 'active';
            $blogs->created_at = now();
            $blogs->save();
            return back()->with('status_change', 'Status Change successfully.');
        }
    }


    public function blog_trash()
    {
        $blog_trashes = Blog::onlyTrashed()->get();
        return view('dashboard.blog.trash', compact('blog_trashes'));
    }

    public function blog_restore($id)
    {
        if ($id) {
            Blog::onlyTrashed()->where('id', $id)->restore();
            return back()->with('blog_restore_success', 'Blog restore successfully.');
        }
    }
    public function blog_forcedelete($id)
    {
        // blog::$user->forceDelete();
        Blog::onlyTrashed()->where('id', $id)->forceDelete();

        return back()->with('blog_forcedelete_success', 'blog delete parmanently.');
    }
}
