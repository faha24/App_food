<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
       
            $user = Auth::user();
            return view('client.User.profile', compact('user'));
   
    }
    public function edit()
    {
        $user = Auth::user();
        return view('client.User.edit-profile', compact('user'));
    }

    // Xử lý cập nhật thông tin
    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:users,name,'. $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|max:2048'
        ]);
        if ($request->hasFile('avatar')) {
            // Nếu người dùng đã có avatar cũ, xóa ảnh cũ
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }

            // Lưu ảnh mới
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        User::query()->find($user->id)->update($data);


        // Chuyển hướng với thông báo
        return back()->with('message', 'Thông tin cá nhân đã được cập nhật.');
    }
    public function showChagePass()
    {

        return view('client.User.update-pass');
    }

    // Xử lý cập nhật thông tin
    public function updatePass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'confirmed'],
        ]);

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác']);
        }
        // Cập nhật mật khẩu mới
        $user = Auth::user();
        $data['password'] = $request->new_password;
        User::query()->find($user->id)->update($data);
        // Chuyển hướng với thông báo
        return redirect('/profile')->with('message', 'Mật khẩu của bạn đã được thay đổi.');
    }
}
