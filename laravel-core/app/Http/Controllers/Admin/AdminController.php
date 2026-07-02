<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function dashboard()
    {
        return view('admin.home');
    }

    /**
     * Display a listing of the users.
     */
    public function index()
    {
        if (!in_array(auth()->user()->role, ['super_admin', 'god_admin'])) {
            return redirect()->route('admin.home')->with('error', 'Unauthorized access.');
        }

        // Exclude God Admin from the list
        $users = User::where('role', '!=', 'god_admin')->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        if (!in_array(auth()->user()->role, ['super_admin', 'god_admin'])) {
            return response()->json(['success' => false, 'message' => 'Unauthorized access.'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:user,editor,admin,super_admin',
            'password' => 'required|string|min:8',
            'status' => 'required|string|in:active,inactive,unactivated',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'role' => $validated['role'],
                'status' => $validated['status'] ?? 'unactivated', // Default to unactivated
                'password' => Hash::make($validated['password'] ?? 'password'), // Default password if empty
            ]);

            // Send welcome email
            Mail::to($user->email)->send(new \App\Mail\UserCreated($user, $validated['password'] ?? 'password'));

            DB::commit();

            if ($request->wantsJson()) {
                $user->formatted_date = $user->created_at->format('M d, Y');
                return response()->json(['success' => true, 'message' => 'User created successfully and welcome email sent.', 'user' => $user]);
            }

            return redirect()->route('users.index')->with('success', 'User created successfully and welcome email sent.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to create user or send email: ' . $e->getMessage());
            
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Failed to send welcome email. User was not created. Please check SMTP settings.', 'errors' => ['email' => ['Failed to send welcome email.']]], 422);
            }
            
            return back()->withInput()->withErrors(['email' => 'Failed to send welcome email. User was not created. Please check SMTP settings.']);
        }
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        if (!in_array(auth()->user()->role, ['super_admin', 'god_admin'])) {
            return redirect()->route('admin.home')->with('error', 'Unauthorized access.');
        }

        // Super Admin cannot delete other Super Admins
        if (auth()->user()->role === 'super_admin' && $user->role === 'super_admin') {
            return redirect()->route('users.index')->with('error', 'You cannot delete another Super Admin.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Heartbeat to keep user status active.
     */
    public function heartbeat()
    {
        if (auth()->check()) {
            $user = auth()->user();
            // Using DB update to ensure it's written immediately without Eloquent overhead or dirty checks
            User::where('id', $user->id)->update(['updated_at' => now()]);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 401);
    }

    /**
     * Get user data for editing.
     */
    public function show(User $user)
    {
        if (!in_array(auth()->user()->role, ['super_admin', 'god_admin'])) {
            return response()->json(['success' => false, 'message' => 'Unauthorized access.'], 403);
        }

        return response()->json($user);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        if (!in_array(auth()->user()->role, ['super_admin', 'god_admin'])) {
            return response()->json(['success' => false, 'message' => 'Unauthorized access.'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,editor,admin,super_admin',
            'password' => 'nullable|string|min:8',
        ]);

        // Handle optional password update
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return response()->json(['success' => true, 'message' => 'User updated successfully.', 'user' => $user]);
    }
}
