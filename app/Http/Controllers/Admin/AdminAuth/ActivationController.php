<?php

namespace App\Http\Controllers\Admin\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\OtpMail;
use App\Models\User;

class ActivationController extends Controller
{
    public function showActivationForm()
    {
        if (Auth::user()->status !== 'unactivated') {
            return redirect()->route('admin.home');
        }
        return view('admin.auth.activate');
    }

    public function initiateActivation(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $otp = rand(100000, 999999);
        
        Session::put('activation_password', Hash::make($request->password));
        Session::put('activation_otp', $otp);
        Session::put('activation_otp_expires', now()->addMinutes(10));

        Mail::to(Auth::user()->email)->send(new OtpMail($otp));

        return response()->json([
            'success' => true, 
            'message' => 'OTP sent successfully',
            'redirect' => route('admin.verify.otp')
        ]);
    }

    public function showVerifyForm()
    {
        if (Auth::user()->status !== 'unactivated' || !Session::has('activation_otp')) {
            return redirect()->route('admin.home');
        }
        return view('admin.auth.verify_otp');
    }

    public function verifyActivation(Request $request)
    {
        $request->validate(['otp' => 'required']);

        $sessionOtp = Session::get('activation_otp');
        $expires = Session::get('activation_otp_expires');

        if (!$sessionOtp || now()->greaterThan($expires)) {
             return response()->json(['success' => false, 'errors' => ['otp' => ['OTP expired or invalid']]], 422);
        }

        if ($request->otp != $sessionOtp) {
            return response()->json(['success' => false, 'errors' => ['otp' => ['Invalid OTP']]], 422);
        }

        $user = Auth::user();
        
        /** @var \App\Models\User $user */
        $user->password = Session::get('activation_password');
        $user->status = 'active';
        $user->save();

        Session::forget(['activation_otp', 'activation_password', 'activation_otp_expires']);

        return response()->json(['success' => true, 'redirect' => route('admin.home')]);
    }
}
