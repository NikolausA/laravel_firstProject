<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $users = User::query()->where('id', '!=', Auth::id())->get();
        return view ('admin.users', ['users' => $users]);
    }

//    public function edit(User $user) {
//        return view ('admin.editUser');
//    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User has been deleted');
    }

    public function setAdmin(User $user) {
        if ($user->id != Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();
            return redirect()->route('admin.user.index')->with('success', 'Done');
        } else {
            return redirect()->route('admin.user.index')->with('error', 'You cannot change your status');
        }

    }
}
