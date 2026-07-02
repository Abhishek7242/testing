@extends('admin.layouts.main')

@section('admin-content')
    @php
        $hour = date('H');
        $greeting = 'Good Morning';
        if ($hour >= 12 && $hour < 17) {
            $greeting = 'Good Afternoon';
        } elseif ($hour >= 17) {
            $greeting = 'Good Evening';
        }
    @endphp

    <!-- Hero Section -->
    <div class="flex flex-col md:flex-row justify-between items-end gap-4">
        <div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-1">
                {{ $greeting }}, <span
                    class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-400">{{ Auth::user()->name }}</span>
            </h2>
            <p class="text-slate-400">Here's what's happening in your universe today.</p>
        </div>
        <div class="flex gap-2">
            <button
                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg text-sm font-medium shadow-lg shadow-indigo-500/30 transition-all flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> New Project
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="glass p-5 rounded-2xl relative overflow-hidden group">
            <div
                class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-500/20 rounded-full blur-2xl group-hover:bg-indigo-500/30 transition-all">
            </div>
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-slate-400 text-sm font-medium">Total Revenue</p>
                    <h3 class="text-2xl font-bold text-white mt-1">$124,592.00</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400">
                    <i class="fa-solid fa-dollar-sign"></i>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-emerald-400 flex items-center gap-1 bg-emerald-400/10 px-2 py-1 rounded-full">
                    <i class="fa-solid fa-arrow-trend-up text-xs"></i> +12.5%
                </span>
                <span class="text-slate-500 ml-2">vs last month</span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="glass p-5 rounded-2xl relative overflow-hidden group">
            <div
                class="absolute -right-4 -top-4 w-24 h-24 bg-purple-500/20 rounded-full blur-2xl group-hover:bg-purple-500/30 transition-all">
            </div>
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-slate-400 text-sm font-medium">Active Users</p>
                    <h3 class="text-2xl font-bold text-white mt-1">45,231</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center text-purple-400">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-emerald-400 flex items-center gap-1 bg-emerald-400/10 px-2 py-1 rounded-full">
                    <i class="fa-solid fa-arrow-trend-up text-xs"></i> +4.2%
                </span>
                <span class="text-slate-500 ml-2">vs last month</span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="glass p-5 rounded-2xl relative overflow-hidden group">
            <div
                class="absolute -right-4 -top-4 w-24 h-24 bg-rose-500/20 rounded-full blur-2xl group-hover:bg-rose-500/30 transition-all">
            </div>
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-slate-400 text-sm font-medium">Bounce Rate</p>
                    <h3 class="text-2xl font-bold text-white mt-1">42.3%</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-rose-500/20 flex items-center justify-center text-rose-400">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-rose-400 flex items-center gap-1 bg-rose-400/10 px-2 py-1 rounded-full">
                    <i class="fa-solid fa-arrow-trend-down text-xs"></i> +1.5%
                </span>
                <span class="text-slate-500 ml-2">vs last month</span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="glass p-5 rounded-2xl relative overflow-hidden group">
            <div
                class="absolute -right-4 -top-4 w-24 h-24 bg-amber-500/20 rounded-full blur-2xl group-hover:bg-amber-500/30 transition-all">
            </div>
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-slate-400 text-sm font-medium">Server Load</p>
                    <h3 class="text-2xl font-bold text-white mt-1">34%</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-amber-500/20 flex items-center justify-center text-amber-400">
                    <i class="fa-solid fa-server"></i>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-emerald-400 flex items-center gap-1 bg-emerald-400/10 px-2 py-1 rounded-full">
                    <i class="fa-solid fa-check text-xs"></i> Optimal
                </span>
                <span class="text-slate-500 ml-2">State</span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Chart -->
        <div class="glass p-6 rounded-2xl lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-white">Revenue Overview</h3>
                <div class="flex gap-2">
                    <button class="px-3 py-1 text-xs font-medium text-white bg-indigo-600 rounded-lg">All</button>
                    <button
                        class="px-3 py-1 text-xs font-medium text-slate-400 hover:text-white hover:bg-white/5 rounded-lg">1Y</button>
                    <button
                        class="px-3 py-1 text-xs font-medium text-slate-400 hover:text-white hover:bg-white/5 rounded-lg">6M</button>
                    <button
                        class="px-3 py-1 text-xs font-medium text-slate-400 hover:text-white hover:bg-white/5 rounded-lg">3M</button>
                </div>
            </div>
            <div class="h-64 w-full">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Traffic Chart -->
        <div class="glass p-6 rounded-2xl">
            <h3 class="text-lg font-semibold text-white mb-6">Traffic Sources</h3>
            <div class="h-48 w-full flex justify-center relative">
                <canvas id="trafficChart"></canvas>
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-2xl font-bold text-white">Total</span>
                    <span class="text-xs text-slate-400">Visits</span>
                </div>
            </div>
            <div class="mt-6 space-y-3">
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-indigo-500"></span>
                        <span class="text-slate-300">Direct</span>
                    </div>
                    <span class="text-white font-medium">35%</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-cyan-500"></span>
                        <span class="text-slate-300">Social</span>
                    </div>
                    <span class="text-white font-medium">25%</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-purple-500"></span>
                        <span class="text-slate-300">Referral</span>
                    </div>
                    <span class="text-white font-medium">40%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="glass rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-white/10 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-white">Recent Transactions</h3>
            <button class="text-indigo-400 hover:text-indigo-300 text-sm font-medium">View All</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-slate-400 text-sm border-b border-white/5">
                        <th class="px-6 py-4 font-medium">Customer</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium">Date</th>
                        <th class="px-6 py-4 font-medium">Amount</th>
                        <th class="px-6 py-4 font-medium text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-white/5">
                    <tr class="hover:bg-white/5 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-white font-bold text-xs">
                                    JD
                                </div>
                                <div class="text-white">John Doe</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Completed
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">Oct 24, 2024</td>
                        <td class="px-6 py-4 text-white font-medium">$450.00</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-white transition-colors"><i
                                    class="fa-solid fa-ellipsis"></i></button>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-indigo-900 flex items-center justify-center text-indigo-200 font-bold text-xs">
                                    AS
                                </div>
                                <div class="text-white">Alice Smith</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Pending
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">Oct 23, 2024</td>
                        <td class="px-6 py-4 text-white font-medium">$120.50</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-white transition-colors"><i
                                    class="fa-solid fa-ellipsis"></i></button>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-rose-900 flex items-center justify-center text-rose-200 font-bold text-xs">
                                    RM
                                </div>
                                <div class="text-white">Robert Martin</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-500/10 text-rose-400 border border-rose-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span> Failed
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-400">Oct 23, 2024</td>
                        <td class="px-6 py-4 text-white font-medium">$950.00</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-white transition-colors"><i
                                    class="fa-solid fa-ellipsis"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Revenue Chart
        const ctx = document.getElementById('revenueChart').getContext('2d');

        // Gradient for the chart line
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(99, 102, 241, 0.5)'); // Indigo
        gradient.addColorStop(1, 'rgba(99, 102, 241, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue',
                    data: [30000, 45000, 42000, 50000, 75000, 60000, 80000, 85000, 90000, 110000, 125000,
                        130000
                    ],
                    borderColor: '#6366f1', // Indigo 500
                    backgroundColor: gradient,
                    borderWidth: 3,
                    tension: 0.4, // Curvy line
                    pointRadius: 0,
                    pointHoverRadius: 6,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 23, 42, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#cbd5e1',
                        padding: 10,
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 1,
                        displayColors: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.05)',
                            drawBorder: false,
                        },
                        ticks: {
                            color: '#94a3b8',
                            callback: function(value) {
                                return '$' + value / 1000 + 'k';
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            color: '#94a3b8'
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
            }
        });

        // Traffic Doughnut Chart
        const ctx2 = document.getElementById('trafficChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Direct', 'Social', 'Referral'],
                datasets: [{
                    data: [35, 25, 40],
                    backgroundColor: [
                        '#6366f1', // Indigo 500
                        '#06b6d4', // Cyan 500
                        '#a855f7' // Purple 500
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 23, 42, 0.9)',
                        padding: 10,
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 1
                    }
                }
            }
        });
    </script>
@endsection
