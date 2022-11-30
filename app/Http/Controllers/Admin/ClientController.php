<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        $user_lists = Client::get();
        return view('admin.client.list',compact('user_lists'));
    }

    public function create()
    {
        $products = Product::get();
       return view('admin.client.create',compact('products'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:6|max:20',
            'email' => 'required|email|min:6|max:50|unique:users',
            'password' => 'required|min:6|max:20|confirmed',
            'address' => 'required',
        ]);
        try {
            $user = new Client();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->user_id = auth()->user()->id;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
            if ($request->hasFile('profile_image')) {
                $file = $request->profile_image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/user', $filename);
                $user->profile_image = $path;
            }
            $user->save();
            $user->products()->sync($request->product_id);
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
        $user_info  = Client::findOrFail($id);
        $products = Product::get();
        return view('admin.client.edit', compact('user_info','products'));
    }

    public function update(Request $request, $id)
    {
        $user = Client::findOrFail($id);
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
            $user->address = $request->address;
            $user->user_id = auth()->id();
            $user->status = $request->status ? 1 : 0;
            if ($request->hasFile('profile_image')) {
                $file = $request->profile_image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/user', $filename);
                $user->profile_image = $path;
            }
            $user->save();
            $user->products()->sync($request->product_id);
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
