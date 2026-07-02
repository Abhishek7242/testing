@extends('admin.layouts.main')

@section('content')
    <div class="px-6 py-8">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8 animate__animated animate__fadeIn">
            <div>
                <h2 class="text-3xl font-bold text-white tracking-tight">Sign-in Logs</h2>
                <p class="text-slate-400 mt-1">Monitor platform authentication activity.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('users.index') }}" class="btn-cyber-amber group">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                    <span>Back to Users</span>
                </a>
            </div>
        </div>

        <!-- Logs Table -->
        <div class="freedom-card animate__animated animate__fadeInUp" style="animation-delay: 0.1s">
            <table class="freedom-table">
                <thead>
                    <tr>
                        <th>User / Email</th>
                        <th>Event</th>
                        <th>Status</th>
                        <th>IP Address</th>
                        <th>Device / User Agent</th>
                        <th class="text-right">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>
                                <div class="flex flex-col">
                                    <span
                                        class="text-white font-semibold">{{ $log->user ? $log->user->name : $log->email ?? 'Unknown' }}</span>
                                    <span class="text-slate-400 text-xs">{{ $log->email }}</span>
                                </div>
                            </td>
                            <td>
                                @php
                                    $eventColor = match ($log->event) {
                                        'login' => 'text-emerald-400',
                                        'logout' => 'text-amber-400',
                                        'failed' => 'text-rose-400',
                                        default => 'text-slate-400',
                                    };
                                    $eventIcon = match ($log->event) {
                                        'login' => 'fa-right-to-bracket',
                                        'logout' => 'fa-right-from-bracket',
                                        'failed' => 'fa-triangle-exclamation',
                                        default => 'fa-circle-info',
                                    };
                                @endphp
                                <div class="flex items-center gap-2 {{ $eventColor }}">
                                    <i class="fa-solid {{ $eventIcon }} text-xs"></i>
                                    <span class="font-medium uppercase text-xs tracking-wider">{{ $log->event }}</span>
                                </div>
                            </td>
                            <td>
                                @if ($log->status === 'success')
                                    <span
                                        class="px-2 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-bold uppercase tracking-widest border border-emerald-500/20">
                                        Success
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 rounded-full bg-rose-500/10 text-rose-400 text-[10px] font-bold uppercase tracking-widest border border-rose-500/20">
                                        Failure
                                    </span>
                                @endif
                            </td>
                            <td>
                                <span class="text-slate-300 font-mono text-xs">{{ $log->ip_address }}</span>
                            </td>
                            <td>
                                <div class="max-w-[200px] truncate text-slate-400 text-xs cursor-help"
                                    title="{{ $log->user_agent }}">
                                    {{ $log->user_agent }}
                                </div>
                            </td>
                            <td class="text-right text-slate-400 text-xs">
                                {{ $log->created_at->diffForHumans() }}
                                <div class="text-[10px] opacity-50">{{ $log->created_at->format('M d, H:i:s') }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-12 text-slate-500">
                                <i class="fa-solid fa-inbox text-4xl mb-4 block opacity-20"></i>
                                No sign-in logs found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            @if ($logs->hasPages())
                <div class="px-6 py-4 border-t border-white/5">
                    {{ $logs->links() }}
                </div>
            @endif
        </div>
    </div>

    <style>
        .freedom-card {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .freedom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .freedom-table th {
            text-align: left;
            padding: 1.25rem 1.5rem;
            background: rgba(255, 255, 255, 0.02);
            color: #94a3b8;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .freedom-table td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.2s ease;
        }

        .freedom-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .freedom-table tr:last-child td {
            border-bottom: none;
        }
    </style>
@endsection
