<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user_lists = User::get();
        return view('admin.user.list',compact('user_lists'));
    }

    public function create()
    {
        $user_info = null;
       return view('admin.user.create',compact('user_info'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:6|max:20',
            'email' => 'required|email|min:6|max:50|unique:users',
            'password' => 'required|min:6|max:20|confirmed',
        ]);
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->email_verified_at = Carbon::now();
            if ($request->hasFile('profile_image')) {
                $file = $request->profile_image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/user', $filename);
                $user->profile_image = $path;
            }
            $user->save();
            return redirect()->route('clients.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user_info  = User::findOrFail($id);
        return view('user::edit', compact('user_info'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|min:6|max:20',
            'email' => 'required|email|min:6|max:50|unique:users,id,' . $user->id,
            // 'branch' => 'required|integer',
            // 'role' => 'required'
        ]);
        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('profile_image')) {
                $file = $request->profile_image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/user', $filename);
                $user->profile_image = $path;
            }
            $user->save();
            return redirect()->route('clients.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('clients.index')->with('success', 'User removed successfully');
    }
}
