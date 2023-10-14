<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function profile_details_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'created_at' => now(),
        ]);
        return back();
    }

    public function profile_image_update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:800',
        ]);
        $new_name = auth()->id() . "-" . auth()->user()->name . '.' . $request->file('image')->getClientOriginalExtension();
        $img = Image::make($request->file('image'))->resize(300, 200);
        $img->save(base_path('public/uploads/image/profile/' . $new_name), 60);

        User::find($id)->update([
            'image' => $new_name,
            'created_at' => now(),
        ]);
        return back();
    }

    

}
