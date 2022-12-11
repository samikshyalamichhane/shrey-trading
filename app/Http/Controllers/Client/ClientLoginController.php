<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientLoginController extends Controller
{
    public function form(){
        if (Auth::guard('client')->check()) {
            return redirect()->route('home');
        } else {
            return view('client.login');
        }
    }

    public function submit(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => 
            $request->password,'status'=>1] )) {
                // dd('hi');
                $user = auth()->guard('client')->user();
            return redirect()->intended(route('dashboard'));
            }

        // if(auth()->guard('client')->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ])) {
        //     $user = auth()->user();

        //     return redirect()->intended(url('/dashboard'));
        // } else {
        //     return redirect()->back()->withError('Credentials doesn\'t match.');
        // }
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('client.login-form');
    }
}
