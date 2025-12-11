<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy("user_id", "DESC")->paginate(10);
        return view("admin.users.index", compact("users"));
    }

    public function create()
    {
        return view("admin.users.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6",
        ]);

        $data = $request->except("avatar");
        $data["password"] = Hash::make($request->password);

        if ($request->hasFile("avatar")) {
            $filename = time()."_".$request->avatar->getClientOriginalName();
            $request->avatar->move("uploads/users/", $filename);
            $data["avatar"] = "uploads/users/".$filename;
        }

        User::create($data);

        return redirect()->route("admin.users.index")->with("success", "Tạo tài khoản thành công!");
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("admin.users.edit", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->except(["avatar"]);

        if ($request->password) {
            $data["password"] = Hash::make($request->password);
        }

        if ($request->hasFile("avatar")) {
            $filename = time()."_".$request->avatar->getClientOriginalName();
            $request->avatar->move("uploads/users/", $filename);
            $data["avatar"] = "uploads/users/".$filename;
        }

        $user->update($data);

        return redirect()->route("admin.users.index")->with("success", "Cập nhật người dùng thành công!");
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with("success", "Xóa thành công!");
    }
}
