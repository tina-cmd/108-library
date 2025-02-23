<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function get_users() {
        $users = User::all();
        return Inertia::render('ManageUser', ['users' => $users]);
    }

    public function delete_user(User $id) {
        $id->delete();
        return redirect()->back();
    }

    public function update_user(Request $request, User $id) {

        // dd($request->role);
        $role = $request->validate([
            'role' => 'required',
        ]);

        $id->update($role);
        return redirect()->back();
    }
}
