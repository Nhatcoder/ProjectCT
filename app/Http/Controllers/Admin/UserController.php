<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function listUser()
    {
        $listUser = User::select('id', 'first_name', 'last_name', 'birthdate', 'phone', 'email', 'avatar')->orderBy('id', 'desc')->get();

        return view('admin.user.index', [
            'listUser' => $listUser
        ]);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        if (!isset($user)) {
            return redirect()->route('admin.user')->with('error', 'Không tìm thấy người dùng');
        }
        return view('admin.user.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!isset($user)) {
            return redirect()->route('admin.user')->with('error', 'Không tìm thấy người dùng');
        }


        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . $user->id . '.' . $avatar->getClientOriginalExtension();
            $path = $avatar->storeAs('public/avatars', $avatarName);

            $user->avatar = $path;
        }


        $user->save();
        return redirect()->route('admin.user')->with('success', 'Cập nhật người dùng thành công');
    }
}
