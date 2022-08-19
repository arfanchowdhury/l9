<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){

        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($request->only('email', 'password'))){

            $request->session()->regenerate();

            // dd(auth()->user()->roles()->pluck('slug')[0]);
            if(auth()->user()->roles()->first()->slug == 'admin'){

                return redirect()->route('admin.dashboard');
            }elseif(auth()->user()->roles()->first()->slug == 'user'){

                return redirect()->route('user.dashboard');
            }else{

                return $this->destroy();
            }
        }

        return back()->with("message", "invalid credentials!");
        
    }

    public function destroy(Request $request)
    {
        
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
