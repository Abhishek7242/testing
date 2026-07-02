<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginLogController extends Controller
{
    /**
     * Display a listing of the login logs.
     */
    public function index()
    {
        if (!in_array(Auth::user()->role, ['super_admin', 'god_admin'])) {
            return redirect()->route('admin.home')->with('error', 'Unauthorized access.');
        }

        $logs = LoginLog::with('user')->latest()->paginate(20);
        
        return view('admin.logs.login_logs', compact('logs'));
    }
}
