<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
    public function administration_role_edit(Request $request)
    {

        User::find($request->user_id)->update([
            'role' => $request->role,
            'created_at' => now(),
        ]);
        return back();
    }

}
