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

class PasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('admin.auth.change_password');
    }

    public function initiatePasswordChange(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $otp = rand(100000, 999999);
        
        Session::put('change_password_new', Hash::make($request->password));
        Session::put('change_password_otp', $otp);
        Session::put('change_password_otp_expires', now()->addMinutes(10));

        Mail::to(Auth::user()->email)->send(new OtpMail($otp));

        return response()->json([
            'success' => true, 
            'message' => 'OTP sent successfully to your email',
            'redirect' => route('admin.password.verify')
        ]);
    }

    public function showVerifyOtpForm()
    {
        if (!Session::has('change_password_otp')) {
            return redirect()->route('admin.password.change');
        }
        return view('admin.auth.verify_password_otp');
    }

    public function verifyAndUpdatePassword(Request $request)
    {
        $request->validate(['otp' => 'required']);

        $sessionOtp = Session::get('change_password_otp');
        $expires = Session::get('change_password_otp_expires');

        if (!$sessionOtp || now()->greaterThan($expires)) {
             return response()->json(['success' => false, 'errors' => ['otp' => ['OTP expired or invalid']]], 422);
        }

        if ($request->otp != $sessionOtp) {
            return response()->json(['success' => false, 'errors' => ['otp' => ['Invalid OTP']]], 422);
        }

        $user = Auth::user();
        /** @var \App\Models\User $user */
        $user->password = Session::get('change_password_new');
        $user->save();

        Session::forget(['change_password_otp', 'change_password_new', 'change_password_otp_expires']);

        return response()->json([
            'success' => true, 
            'message' => 'Password updated successfully',
            'redirect' => route('admin.home')
        ]);
    }
}
