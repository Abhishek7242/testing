@extends('admin.layouts.main')

@section('title', 'Users')

@section('admin-content')
    <!-- Custom CSS for "Freedom Absolute" Design -->
    <style>
        /* Base Glassmorphism */
        .glass-panel {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1.5rem;
            /* 24px */
        }

        /* Freedom Absolute - Table Styling */
        .freedom-table-container {
            position: relative;
            width: 100%;
        }

        .freedom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            color: #e2e8f0;
        }

        .freedom-table th {
            text-align: left;
            padding: 0.75rem 1rem;
            font-weight: 500;
            color: #94a3b8;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        @media (min-width: 768px) {
            .freedom-table th {
                padding: 1.25rem 1.5rem;
                font-size: 0.875rem;
            }
        }

        .freedom-table th.text-right {
            text-align: right;
        }

        .freedom-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.02);
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        @media (min-width: 768px) {
            .freedom-table td {
                padding: 1.25rem 1.5rem;
                font-size: 0.95rem;
            }
        }

        .freedom-table tr:hover td {
            background: rgba(255, 255, 255, 0.03);
            color: #fff;
        }

        .freedom-table tr:last-child td {
            border-bottom: none;
        }

        .current-user-row td {
            background: rgba(99, 102, 241, 0.05) !important;
        }

        .current-user-row td:first-child {
            border-left: 4px solid #6366f1;
        }
.edit-btn{
    margin-bottom: 0px;
}
        /* Action Buttons */
        .action-btn {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 0.625rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            color: #94a3b8;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .action-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: translateY(-2px);
        }

        /* Badge/Status via Dots */
        .status-dot-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
        }

        .status-dot {
            width: 0.75rem;
            height: 0.75rem;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 10px currentColor;
        }

        .status-active {
            background-color: #22c55e;
            /* Green */
            color: rgba(34, 197, 94, 0.5);
            box-shadow: 0 0 10px rgba(34, 197, 94, 0.5);
        }

        .status-inactive {
            background-color: #eab308;
            /* Yellow */
            color: rgba(234, 179, 8, 0.5);
            box-shadow: 0 0 10px rgba(234, 179, 8, 0.5);
        }

        @keyframes beat {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.5);
                opacity: 0.5;
            }
        }

        .status-unactivated {
            background-color: #ef4444;
            /* Red */
            color: rgba(239, 68, 68, 0.5);
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.5);
            animation: beat 1.5s infinite ease-in-out;
        }

        /* Absolute Modal Overlay */
        .absolute-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 50;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(8px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .absolute-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Modal Content */
        .custom-modal {
            width: 100%;
            max-width: 28rem;
            /* 448px - Closer to image width */
            background: #0f172a;
            /* Darker Slate */
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
            transform: scale(0.95) translateY(10px);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .absolute-modal-overlay.active .custom-modal {
            transform: scale(1) translateY(0);
        }

        /* Modal Header */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #fff;
        }

        .modal-close-btn {
            color: #94a3b8;
            cursor: pointer;
            transition: color 0.2s;
            background: none;
            border: none;
            font-size: 1.25rem;
        }

        .modal-close-btn:hover {
            color: #fff;
        }

        /* Form Inputs */
        .freedom-input-group {
            margin-bottom: 1.25rem;
            position: relative;
        }

        .freedom-input-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            color: #cbd5e1;
            font-weight: 500;
        }

        .freedom-input {
            width: 100%;
            background: #1e293b;
            /* Slate 800 */
            border: 1px solid #334155;
            /* Slate 700 */
            color: #fff;
            padding: 0.625rem 0.875rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            outline: none;
            transition: all 0.2s ease;
        }

        .freedom-input:focus {
            border-color: #6366f1;
            /* Indigo */
            box-shadow: 0 0 0 1px #6366f1;
        }

        .password-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-input-wrapper .freedom-input {
            padding-right: 8rem;
            /* Space for buttons */
        }

        .password-actions {
            position: absolute;
            right: 0.5rem;
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .password-action-btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .btn-eye {
            color: #94a3b8;
            background: rgba(148, 163, 184, 0.1);
        }

        .btn-eye:hover {
            background: rgba(148, 163, 184, 0.2);
            color: #fff;
        }

        .btn-generate {
            color: #6366f1;
            background: rgba(99, 102, 241, 0.1);
        }

        .btn-generate:hover {
            background: rgba(99, 102, 241, 0.2);
        }


        .helper-text {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 0.5rem;
        }

        /* Modal Actions */
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .btn-cancel {
            padding: 0.625rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #cbd5e1;
            background: transparent;
            border: 1px solid #334155;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-cancel:hover {
            border-color: #cbd5e1;
            color: #fff;
        }

        .btn-submit {
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #fff;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 6px -1px rgba(99, 102, 241, 0.3);
        }

        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* Glowing Orbs for Modal Background */
        .modal-orb {
            position: absolute;
            width: 15rem;
            height: 15rem;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            z-index: -1;
        }

        .orb-1 {
            top: -5rem;
            left: -5rem;
            background: #6366f1;
            /* Indigo */
        }

        .orb-2 {
            bottom: -5rem;
            right: -5rem;
            background: #d946ef;
            /* Fuchsia */
        }

        /* Cyber Button */
        .btn-cyber {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.4);
            border-radius: 0.75rem;
            color: #c7d2fe;
            font-weight: 600;
            font-size: 0.75rem;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 0 0 1px rgba(99, 102, 241, 0.1), 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(4px);
        }

        @media (min-width: 768px) {
            .btn-cyber {
                padding: 0.75rem 1.5rem;
                font-size: 0.875rem;
            }
        }

        .btn-cyber:hover {
            background: rgba(99, 102, 241, 0.2);
            border-color: #818cf8;
            color: #fff;
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.3), 0 0 30px rgba(99, 102, 241, 0.1);
            transform: translateY(-1px);
        }

        .btn-cyber i {
            transition: transform 0.3s ease;
        }

        .btn-cyber:hover i {
            transform: rotate(90deg);
            color: #fff;
        }

        .btn-cyber::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transition: left 0.6s ease;
        }

        .btn-cyber:hover::before {
            left: 100%;
        }

        /* Amber Cyber Button for Logs */
        .btn-cyber-amber {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.4);
            border-radius: 0.75rem;
            color: #fde68a;
            font-weight: 600;
            font-size: 0.75rem;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 0 0 1px rgba(245, 158, 11, 0.1), 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(4px);
        }

        @media (min-width: 768px) {
            .btn-cyber-amber {
                padding: 0.75rem 1.5rem;
                font-size: 0.875rem;
            }
        }

        .btn-cyber-amber:hover {
            background: rgba(245, 158, 11, 0.2);
            border-color: #fbbf24;
            color: #fff;
            box-shadow: 0 0 15px rgba(245, 158, 11, 0.3), 0 0 30px rgba(245, 158, 11, 0.1);
            transform: translateY(-1px);
        }

        .btn-cyber-amber i {
            transition: transform 0.3s ease;
        }

        .btn-cyber-amber:hover i {
            transform: rotate(15deg);
            color: #fff;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes progress {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }

        .animate-slide-in-right {
            animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }

        .animate-progress {
            animation: progress 3s linear forwards;
        }

        .toast-dark {
            background-color: #0f172a;
            /* Slate 900 */
            border: 1px solid rgba(51, 65, 85, 0.5);
            /* Slate 700 */
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        /* Custom Horizontal Scrollbar for Table */
        .custom-scrollbar::-webkit-scrollbar {
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.1);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(99, 102, 241, 0.2);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(99, 102, 241, 0.4);
        }
    </style>
    <!-- Success Message Container -->
    <div id="flash-messages" class="fixed top-5 right-5 w-auto max-w-sm" style="z-index: 9999999;">
        @if (session('success'))
            <div
                class="toast-dark relative overflow-hidden rounded-xl shadow-2xl flex items-center gap-4 px-5 py-4 pr-12 animate-slide-in-right">
                <div class="flex-shrink-0 text-emerald-400 bg-emerald-500/10 rounded-full p-1.5 ring-1 ring-emerald-500/20">
                    <i class="fa-solid fa-check text-sm"></i>
                </div>
                <div class="text-slate-200 text-sm font-medium tracking-wide">
                    {{ session('success') }}
                </div>
                <button onclick="this.parentElement.remove()"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-white transition-colors p-1">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
                <!-- Progress Bar -->
                <div class="absolute bottom-0 left-0 h-0.5 bg-emerald-500 animate-progress"></div>
            </div>
        @endif
    </div>

    <div class="space-y-6 relative">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-4 mb-6">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-white tracking-tight">Users</h2>
                <p class="text-slate-400 mt-1 text-sm md:text-base">Manage platform access and permissions.</p>
            </div>
            <div class="grid grid-cols-2 md:flex md:flex-row gap-3">
                <a href="{{ route('admin.logs.index') }}" class="btn-cyber-amber group w-full md:w-auto justify-center">
                    <i class="fa-solid fa-clock-rotate-left text-xs"></i>
                    <span>Logs</span>
                </a>
                <button onclick="toggleModal('addUserModal')" class="btn-cyber group w-full md:w-auto justify-center">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>Add</span>
                </button>
            </div>
        </div>

        <!-- Freedom Table -->
        <div class="glass-panel freedom-table-container overflow-x-auto custom-scrollbar">
            <div class="min-w-[800px] md:min-w-full">
                <table class="freedom-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Role</th>
                            <th class="text-center">Status</th>
                            <th>Joined</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="{{ $user->id === Auth::id() ? 'current-user-row' : '' }}">
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold text-[10px] md:text-sm shadow-lg shadow-indigo-500/20">
                                            {{ substr($user->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <div class="font-medium text-white text-xs md:text-base">{{ $user->name }}
                                            </div>
                                            <div class="text-[9px] md:text-xs text-slate-400">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] md:text-xs font-medium bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 capitalize">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td>
                                    <div class="status-dot-container flex justify-center mx-auto">
                                        @php
                                            $isOnline =
                                                $user->updated_at && $user->updated_at->diffInSeconds(now()) < 120;
                                        @endphp

                                        @if ($isOnline)
                                            <div class="status-dot status-active" title="Online"
                                                style="animation: beat 2s infinite;"></div>
                                        @elseif ($user->status === 'unactivated')
                                            <div class="status-dot status-unactivated" title="Unactivated"></div>
                                        @else
                                            <div class="status-dot status-inactive" title="Inactive"></div>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-slate-400 text-sm tracking-tight">{{ $user->created_at->format('M d, Y') }}
                                </td>
                                <td class="text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        @if ($user->id === Auth::id())
                                            <span
                                                class="text-[10px] md:text-xs font-medium text-indigo-400/70 italic px-2">You</span>
                                        @elseif (Auth::user()->role === 'god_admin' || Auth::user()->role === 'super_admin' || $user->role !== 'super_admin')
                                            <button
                                                class="edit-btn action-btn hover:text-indigo-400 hover:bg-indigo-500/10 hover:border-indigo-500/20"
                                                onclick="openEditModal({{ $user->id }})">
                                                <i class="fa-solid fa-pen text-sm"></i>
                                            </button>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="action-btn hover:text-rose-400 hover:bg-rose-500/10 hover:border-rose-500/20">
                                                    <i class="fa-solid fa-trash text-sm"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span
                                                class="text-[10px] md:text-xs font-medium text-slate-500 italic px-2">Managed
                                                by
                                                God Admin</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-8 text-slate-500">
                                    No users found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Freedom Absolute - Add User Modal -->
    <div id="addUserModal" class="absolute-modal-overlay">
        <div class="custom-modal p-6">
            <!-- Background Orbs -->
            <div class="modal-orb orb-1"></div>
            <div class="modal-orb orb-2"></div>

            <!-- Header -->
            <div class="modal-header">
                <h3 class="modal-title">Add New User</h3>
                <button onclick="toggleModal('addUserModal')" class="modal-close-btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Form -->
            <form action="{{ route('users.store') }}" method="POST" id="addUserForm">
                @csrf
                <div class="freedom-input-group">
                    <label class="freedom-input-label">Full Name</label>
                    <input type="text" name="name" class="freedom-input" placeholder="e.g. Sarah Connor"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-xs text-red-400 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="freedom-input-group">
                    <label class="freedom-input-label">Email Address</label>
                    <input type="email" name="email" class="freedom-input" placeholder="sarah@skynet.com"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-xs text-red-400 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="freedom-input-group">
                    <label class="freedom-input-label">Role</label>
                    <div class="relative">
                        <select name="role" class="freedom-input appearance-none">
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>Editor</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            @if (in_array(Auth::user()->role, ['god_admin', 'super_admin']))
                                <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super
                                    Admin</option>
                            @endif
                        </select>
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="status" value="active">

                <div class="freedom-input-group">
                    <label class="freedom-input-label">Password</label>
                    <div class="password-input-wrapper">
                        <input type="password" name="password" class="freedom-input" value="12345678"
                            id="passwordInput">
                        <div class="password-actions">
                            <button type="button" class="password-action-btn btn-eye"
                                onclick="togglePasswordVisibility('passwordInput', 'eyeIcon')">
                                <i class="fa-regular fa-eye" id="eyeIcon"></i>
                            </button>
                            <button type="button" class="password-action-btn btn-generate"
                                onclick="generatePassword('passwordInput')">
                                <i class="fa-solid fa-key"></i> Generate
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" onclick="toggleModal('addUserModal')" class="btn-cancel">
                        Cancel
                    </button>
                    <button type="submit" class="btn-submit">
                        Create Admin
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Freedom Absolute - Edit User Modal -->
    <div id="editUserModal" class="absolute-modal-overlay">
        <div class="custom-modal p-6">
            <!-- Background Orbs -->
            <div class="modal-orb orb-1"></div>
            <div class="modal-orb orb-2"></div>

            <!-- Header -->
            <div class="modal-header">
                <h3 class="modal-title">Edit User</h3>
                <button onclick="toggleModal('editUserModal')" class="modal-close-btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Form -->
            <form action="" method="POST" id="editUserForm">
                @csrf
                @method('PUT')
                <div class="freedom-input-group">
                    <label class="freedom-input-label">Full Name</label>
                    <input type="text" name="name" id="edit_name" class="freedom-input" placeholder="Name"
                        required>
                </div>

                <div class="freedom-input-group">
                    <label class="freedom-input-label">Email Address</label>
                    <input type="email" name="email" id="edit_email" class="freedom-input" placeholder="Email"
                        required>
                </div>

                <div class="freedom-input-group">
                    <label class="freedom-input-label">Role</label>
                    <div class="relative">
                        <select name="role" id="edit_role" class="freedom-input appearance-none">
                            <option value="user">User</option>
                            <option value="editor">Editor</option>
                            <option value="admin">Admin</option>
                            @if (in_array(Auth::user()->role, ['god_admin', 'super_admin']))
                                <option value="super_admin">Super Admin</option>
                            @endif
                        </select>
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>

                <div class="freedom-input-group">
                    <label class="freedom-input-label">Password <span class="text-[10px] opacity-50 ml-2">(Leave blank
                            to keep current)</span></label>
                    <div class="password-input-wrapper">
                        <input type="password" name="password" id="editPasswordInput" class="freedom-input"
                            placeholder="New password">
                        <div class="password-actions">
                            <button type="button" class="password-action-btn btn-eye"
                                onclick="togglePasswordVisibility('editPasswordInput', 'editEyeIcon')">
                                <i class="fa-regular fa-eye" id="editEyeIcon"></i>
                            </button>
                            <button type="button" class="password-action-btn btn-generate"
                                onclick="generatePassword('editPasswordInput')">
                                <i class="fa-solid fa-key"></i> Generate
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" onclick="toggleModal('editUserModal')" class="btn-cancel">
                        Cancel
                    </button>
                    <button type="submit" class="btn-submit">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Toggle Script -->
    <!-- Toast Container -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-50 flex flex-col gap-2"></div>

    <!-- Modal Toggle Script & AJAX Logic -->
    <script>
        function showTopFlash(message, type = 'success') {
            const container = document.getElementById('flash-messages');
            const icon = type === 'success' ? 'fa-check' : 'fa-exclamation-triangle';
            const iconColor = type === 'success' ? 'text-emerald-400' : 'text-rose-400';
            const ringColor = type === 'success' ? 'ring-emerald-500/20' : 'ring-rose-500/20';
            const bgColor = type === 'success' ? 'bg-emerald-500/10' : 'bg-rose-500/10';
            const progressBarColor = type === 'success' ? 'bg-emerald-500' : 'bg-rose-500';

            const flashHtml = `
                <div class="toast-dark relative overflow-hidden rounded-xl shadow-2xl flex items-center gap-4 px-5 py-4 pr-12 animate-slide-in-right">
                    <div class="flex-shrink-0 ${iconColor} ${bgColor} rounded-full p-1.5 ring-1 ${ringColor}">
                        <i class="fa-solid ${icon} text-sm"></i>
                    </div>
                    <div class="text-slate-200 text-sm font-medium tracking-wide">
                        ${message}
                    </div>
                    <button onclick="this.parentElement.remove()" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-white transition-colors p-1">
                        <i class="fa-solid fa-xmark text-sm"></i>
                    </button>
                    <div class="absolute bottom-0 left-0 h-0.5 ${progressBarColor} animate-progress"></div>
                </div>
            `;

            container.innerHTML = flashHtml;
            setTimeout(() => {
                container.innerHTML = '';
            }, 3000);
        }

        function showToast(message, type = 'success') {
            if (type === 'success') {
                showTopFlash(message, type);
                return;
            }

            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            const colorClass = type === 'success' ? 'bg-green-900/40 border-green-500/50 text-green-400' :
                'bg-red-900/40 border-red-500/50 text-red-400';
            const icon = type === 'success' ? '<i class="fa-solid fa-check-circle"></i>' :
                '<i class="fa-solid fa-exclamation-circle"></i>';

            toast.className =
                `flex items-center gap-3 px-4 py-3 rounded-xl border backdrop-blur-md shadow-lg transform transition-all duration-300 translate-y-10 opacity-0 ${colorClass}`;
            toast.innerHTML = `${icon}<span class="font-medium text-sm">${message}</span>`;
            container.appendChild(toast);

            requestAnimationFrame(() => toast.classList.remove('translate-y-10', 'opacity-0'));
            setTimeout(() => {
                toast.classList.add('translate-y-10', 'opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Generic Modal Toggle
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) return;
            modal.classList.toggle('active');
            document.body.style.overflow = modal.classList.contains('active') ? 'hidden' : '';
        }

        // Password Helpers
        function togglePasswordVisibility(id, iconId) {
            const input = document.getElementById(id);
            const icon = document.getElementById(iconId);
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            icon.classList.toggle('fa-eye', !isPassword);
            icon.classList.toggle('fa-eye-slash', isPassword);
        }

        function generatePassword(id) {
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
            const password = Array.from(crypto.getRandomValues(new Uint32Array(16)))
                .map(x => charset[x % charset.length]).join('');
            document.getElementById(id).value = password;
        }

        // Edit Modal Flow
        async function openEditModal(userId) {
            try {
                const response = await fetch(`/admin/users/${userId}`);
                const user = await response.json();

                document.getElementById('edit_name').value = user.name;
                document.getElementById('edit_email').value = user.email;
                document.getElementById('edit_role').value = user.role;
                document.getElementById('editUserForm').action = `/admin/users/${userId}`;
                document.getElementById('editPasswordInput').value = '';

                toggleModal('editUserModal');
            } catch (err) {
                showToast('Failed to fetch user data', 'error');
            }
        }

        // Form Submission (Add & Edit)
        async function handleFormSubmit(e, formId, modalId) {
            e.preventDefault();
            const form = e.target;
            const submitBtn = form.querySelector('.btn-submit');
            const originalText = submitBtn.innerText;

            form.querySelectorAll('.error-msg').forEach(el => el.remove());
            submitBtn.disabled = true;
            submitBtn.innerText = 'Processing...';

            try {
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                const data = await response.json();
                if (response.ok && data.success) {
                    toggleModal(modalId);
                    showToast(data.message, 'success');
                    setTimeout(() => window.location.reload(),
                        1000); // Reloading for consistent state across complex UI
                } else if (data.errors) {
                    Object.keys(data.errors).forEach(key => {
                        const input = form.querySelector(`[name="${key}"]`);
                        if (input) {
                            const err = document.createElement('span');
                            err.className = 'text-xs text-red-400 mt-1 block error-msg';
                            err.innerText = data.errors[key][0];
                            input.parentElement.appendChild(err);
                        }
                    });
                } else {
                    showToast(data.message || 'Error occurred', 'error');
                }
            } catch (err) {
                showToast('Network error', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerText = originalText;
            }
        }

        document.getElementById('addUserForm').addEventListener('submit', e => handleFormSubmit(e, 'addUserForm',
            'addUserModal'));
        document.getElementById('editUserForm').addEventListener('submit', e => handleFormSubmit(e, 'editUserForm',
            'editUserModal'));

        // Global Event Listeners
        window.onclick = e => {
            if (e.target.classList.contains('absolute-modal-overlay')) toggleModal(e.target.id);
        };

        document.onkeydown = e => {
            if (e.key === 'Escape') {
                const active = document.querySelector('.absolute-modal-overlay.active');
                if (active) toggleModal(active.id);
            }
        };
    </script>
@endsection
