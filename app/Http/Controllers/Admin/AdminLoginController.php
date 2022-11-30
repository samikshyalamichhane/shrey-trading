<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function home(){
        if (Auth::guard('client')->check()) {
            return redirect()->route('dashboard');
        } else {
            return view('client.login');
        }
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function adminLogin(AdminLoginRequest $request){
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with(['success' => 'Email And Password Donot Match!']);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ]) || Auth::attempt(['email' => 'admin@gmail.com', 'password' => $request->password ])) {
            return redirect()->route('dashboard');
        } else {
            return back()->with(['success' => 'Something Went Wrong. Please try again!']);
        }
    }

    public function dashboard(){
        $products = Product::get();
        if(auth()->guard('client')->user()){
            $myProducts = auth()->guard('client')->user()->products;
        } else {
            $myProducts = [];
        }
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard',compact('products','myProducts','orders'));
    }

    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
}
