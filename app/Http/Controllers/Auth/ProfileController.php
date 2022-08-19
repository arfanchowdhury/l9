<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit(){
        $user = Auth::user();
        return view('auth.profile')->with([ 'user' => $user]);
    }

    public function update(Request $request, User $user){
        
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);
        
        $user->update($data);

        return redirect()->back();
    }

}
