@extends('admin.layouts.main')

@section('admin-content')
    <div class="flex flex-col md:flex-row justify-between items-end gap-4 mb-8">
        <div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-1">
                Contact <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-400">Messages</span>
            </h2>
            <p class="text-slate-400">Manage and respond to inquiries from your users.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="glass border-emerald-500/30 p-4 rounded-xl mb-6 flex items-center gap-3 text-emerald-400">
            <i class="fa-solid fa-circle-check"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="glass rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-white/10 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-white">All Messages</h3>
            <div class="flex gap-2">
                <span class="text-xs font-medium text-slate-400 bg-white/5 px-3 py-1 rounded-full border border-white/10">
                    Total: {{ $messages->total() }}
                </span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-slate-400 text-sm border-b border-white/5">
                        <th class="px-6 py-4 font-medium">Sender</th>
                        <th class="px-6 py-4 font-medium">Subject</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium">Date</th>
                        <th class="px-6 py-4 font-medium text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-white/5">
                    @forelse ($messages as $message)
                        <tr class="hover:bg-white/5 transition-colors group" id="message-row-{{ $message->id }}">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-white font-medium">{{ $message->first_name }} {{ $message->last_name }}</span>
                                    <span class="text-slate-500 text-xs">{{ $message->email }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-slate-300">{{ Str::limit($message->subject, 40) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusClasses = [
                                        'unread' => 'bg-amber-500/10 text-amber-400 border-amber-500/20',
                                        'read' => 'bg-indigo-500/10 text-indigo-400 border-indigo-500/20',
                                        'replied' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                                    ];
                                    $dotClasses = [
                                        'unread' => 'bg-amber-400',
                                        'read' => 'bg-indigo-400',
                                        'replied' => 'bg-emerald-400',
                                    ];
                                @endphp
                                <span id="status-badge-{{ $message->id }}"
                                    class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $statusClasses[$message->status] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $dotClasses[$message->status] }}"></span>
                                    {{ ucfirst($message->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-400">
                                {{ $message->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button onclick="viewMessage({{ $message->id }})" 
                                        class="p-2 text-slate-400 hover:text-indigo-400 hover:bg-indigo-400/10 rounded-lg transition-all" 
                                        title="View Message">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button onclick="deleteMessage({{ $message->id }})" 
                                        class="p-2 text-slate-400 hover:text-rose-400 hover:bg-rose-400/10 rounded-lg transition-all" 
                                        title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                <div class="flex flex-col items-center gap-2">
                                    <i class="fa-solid fa-inbox text-4xl opacity-20"></i>
                                    <p>No messages found.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($messages->hasPages())
            <div class="p-6 border-t border-white/5">
                {{ $messages->links() }}
            </div>
        @endif
    </div>

    <!-- View Message Modal -->
    <div id="viewModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-slate-950/80 backdrop-blur-sm" onclick="closeModal()"></div>
            
            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform glass rounded-2xl shadow-2xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-white/10">
                <div class="px-6 py-4 border-b border-white/10 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-white" id="modalSubject">Message Details</h3>
                    <button onclick="closeModal()" class="text-slate-400 hover:text-white transition-colors">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="px-6 py-6 space-y-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">From</p>
                            <p class="text-white font-medium" id="modalSender"></p>
                            <p class="text-indigo-400 text-sm" id="modalEmail"></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Date</p>
                            <p class="text-slate-300 text-sm" id="modalDate"></p>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Subject</p>
                        <p class="text-white" id="modalSubjectContent"></p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Message</p>
                        <div class="bg-white/5 rounded-xl p-4 text-slate-300 text-sm leading-relaxed max-h-60 overflow-y-auto" id="modalMessage">
                        </div>
                    </div>
                    <div class="flex items-center gap-3 pt-2">
                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Status:</p>
                        <select id="modalStatus" onchange="updateStatus()" class="bg-slate-900 border border-white/10 text-white text-xs rounded-lg px-2 py-1 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                            <option value="unread">Unread</option>
                            <option value="read">Read</option>
                            <option value="replied">Replied</option>
                        </select>
                    </div>
                </div>
                <div class="px-6 py-4 border-t border-white/10 bg-white/5 flex justify-end gap-3">
                    <button onclick="closeModal()" class="px-4 py-2 text-sm font-medium text-slate-400 hover:text-white transition-colors">
                        Close
                    </button>
                    <a id="replyBtn" href="#" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg text-sm font-medium transition-all flex items-center gap-2">
                        <i class="fa-solid fa-reply"></i> Reply
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentMessageId = null;

        async function viewMessage(id) {
            currentMessageId = id;
            try {
                const response = await fetch(`/admin/contacts/${id}`);
                const message = await response.json();

                document.getElementById('modalSender').textContent = `${message.first_name} ${message.last_name}`;
                document.getElementById('modalEmail').textContent = message.email;
                document.getElementById('modalDate').textContent = new Date(message.created_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
                document.getElementById('modalSubjectContent').textContent = message.subject;
                document.getElementById('modalMessage').textContent = message.message;
                document.getElementById('modalStatus').value = message.status;
                document.getElementById('replyBtn').href = `mailto:${message.email}?subject=Re: ${message.subject}`;

                // Update status in the table if it was unread
                if (message.status === 'read') {
                    const badge = document.getElementById(`status-badge-${id}`);
                    if (badge) {
                        badge.className = 'inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium border bg-indigo-500/10 text-indigo-400 border-indigo-500/20';
                        badge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span> Read';
                    }
                }

                document.getElementById('viewModal').classList.remove('hidden');
            } catch (error) {
                console.error('Error fetching message:', error);
                alert('Failed to load message details.');
            }
        }

        async function updateStatus() {
            const status = document.getElementById('modalStatus').value;
            try {
                const response = await fetch(`/admin/contacts/${currentMessageId}/status`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ status })
                });

                const result = await response.json();
                if (result.success) {
                    // Update badge in table
                    const badge = document.getElementById(`status-badge-${currentMessageId}`);
                    if (badge) {
                        const classes = {
                            unread: 'bg-amber-500/10 text-amber-400 border-amber-500/20',
                            read: 'bg-indigo-500/10 text-indigo-400 border-indigo-500/20',
                            replied: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20'
                        };
                        const dotClasses = {
                            unread: 'bg-amber-400',
                            read: 'bg-indigo-400',
                            replied: 'bg-emerald-400'
                        };
                        badge.className = `inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium border ${classes[status]}`;
                        badge.innerHTML = `<span class="w-1.5 h-1.5 rounded-full ${dotClasses[status]}"></span> ${status.charAt(0).toUpperCase() + status.slice(1)}`;
                    }
                }
            } catch (error) {
                console.error('Error updating status:', error);
                alert('Failed to update status.');
            }
        }

        async function deleteMessage(id) {
            if (!confirm('Are you sure you want to delete this message?')) return;

            try {
                const response = await fetch(`/admin/contacts/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const result = await response.json();
                if (result.success) {
                    document.getElementById(`message-row-${id}`).remove();
                    // Optional: Update total count or reload if last item on page
                }
            } catch (error) {
                console.error('Error deleting message:', error);
                alert('Failed to delete message.');
            }
        }

        function closeModal() {
            document.getElementById('viewModal').classList.add('hidden');
        }
    </script>

    <style>
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
@endsection
