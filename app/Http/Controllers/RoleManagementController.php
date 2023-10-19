<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleManagementController extends Controller
{
    public function index()
    {
        $users=User::all();
        $administrator_power=User::whereNotIn('role',['visitor'])->get();
        $admin_power=User::where('role','co-admin')-> orWhere('role','author')->get();
        $co_admin_power=User::where('role','author')->get();

        return view('dashboard.role.index', compact('administrator_power','admin_power','co_admin_power'));
    }

    public function user()
    {
        $users=User::all();
        return view('dashboard.user.index', compact('users'));
    }


    public function administration_role_edit(Request $request)
    {

        User::find($request->user_id)->update([
            'role' => $request->role,
            'created_at' => now(),
        ]);
        return back();
    }
public function add_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password' => 'required|confirmed',
        ]);


        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
        ]);

        return back()->with('user_add_success', 'New user added successfully.');
    }

}
