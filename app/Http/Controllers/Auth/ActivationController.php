<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
        $user = User::where('email', $request->email)
            ->where('activation_token', $request->token)
            ->firstOrFail();
        
        $user->update([
            'active' => true,
            'activation_token' => null,
        ]);
    
        return redirect()->route('login')
            ->with('success', 'Thank for activating your account. You can login to your account now');
    }
}
