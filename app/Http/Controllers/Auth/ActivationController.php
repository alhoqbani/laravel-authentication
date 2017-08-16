<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserRequestedActivationToken;
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
    
    public function resend()
    {
        return view('auth.activation.resend');
    }
    
    public function send(Request $request)
    {
        $this->validateEmail($request);
    
        $user = User::where('email', $request->email)->first();
        
        if ($user) {
            event(new UserRequestedActivationToken($user));
        }
        
        return redirect()->route('login')
            ->withSuccess('Thank you. If we have your email in our record, we\'ll resend you the activation email');
    }
    
    /**
     * Validate the email for the given request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
    }
    
}
