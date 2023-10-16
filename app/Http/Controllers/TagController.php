<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(5);
        $trashes = Tag::onlyTrashed()->get();
        return view('dashboard.tag.index', compact('tags','trashes'));
    }

    public function tag_insert(Request $request)
    {
        $request->validate([
            'tag_title' => 'required',
        ]);

        tag::insert([
            'title' => $request->tag_title,
            'created_at' => now(),
        ]);

        return back()->with('tag_insert_success', 'New tag insert successfully.');
    }


    public function tag_delete($id)
    {
        tag::find($id)->delete();
        return back()->with('tag_delete_success', 'tag deleted successfully.');
    }

    public function status_change($id)
    {
        $tag = tag::where('id', $id)->first();

        if ($tag->status == 'active') {
            $tag = tag::find($id);
            $tag->status = 'deactive';
            $tag->created_at = now();
            $tag->save();
            return back()->with('status_change', 'Status Change successfully.');
        } else {
            $tag = tag::find($id);
            $tag->status = 'active';
            $tag->created_at = now();
            $tag->save();
            return back()->with('status_change', 'Status Change successfully.');
        }
    }

    public function tag_edit(Request $request, $id)
    {

        tag::find($id)->update([
            'title' => $request->tag_title,
            'created_at' => now(),
        ]);

        return back()->with('tag_edit_success', 'tag update successfully.');
    }

    public function tag_restore($id)
    {
        // tag::withTrashed()->where('id', $id)->restore();
        tag::onlyTrashed()->where('id', $id)->restore();

        return back()->with('tag_restore_success', 'tag restore successfully.');
    }
    public function tag_forcedelete($id)
    {
        // tag::$user->forceDelete();
        tag::onlyTrashed()->where('id', $id)->forceDelete();

        return back()->with('tag_forcedelete_success', 'tag delete parmanently.');
    }
}
