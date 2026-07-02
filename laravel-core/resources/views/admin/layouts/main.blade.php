@extends('admin.layouts.app')

@section('content')
    <style>
        /* Robust Sidebar Styling */
        @media (max-width: 767px) {
            #sidebar {
                position: fixed !important;
                top: 0;
                left: 0;
                bottom: 0;
                width: 256px;
                z-index: 50 !important;
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            #sidebar.active {
                transform: translateX(0);
            }

            #sidebarBackdrop {
                display: none;
            }

            #sidebarBackdrop.active {
                display: block;
                opacity: 1;
            }
        }
    </style>

    <div class="flex h-screen overflow-hidden relative">
        <!-- Sidebar Backdrop -->
        <div id="sidebarBackdrop"
            class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm z-40 transition-opacity duration-300 md:hidden">
        </div>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="flex flex-col md:w-64 glass border-r border-white/10 transition-transform duration-300 ease-in-out md:translate-x-0 md:static">
            <div class="h-20 flex items-center justify-between px-6 border-b border-white/10">
                <h1 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400">
                    <i class="fa-solid fa-cube mr-2"></i>LINKUSS
                </h1>
                <button id="closeSidebar" class="md:hidden text-slate-400 hover:text-white p-2">
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>
            </div>
            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-2 px-3">
                    <li>
                        <a href="{{ route('admin.home') }}"
                            class="flex items-center p-3 {{ request()->routeIs('admin.home') ? 'text-indigo-300 bg-white/10 border-indigo-500/30 shadow-[0_0_15px_rgba(99,102,241,0.3)]' : 'text-slate-400 hover:text-white hover:bg-white/5' }} rounded-xl transition-all duration-200 border border-transparent">
                            <i class="fa-solid fa-chart-pie w-6 text-center"></i>
                            <span class="ml-3 font-medium">Dashboard</span>
                        </a>
                    </li>
                    @if (in_array(auth()->user()->role, ['super_admin', 'god_admin']))
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="flex items-center p-3 {{ request()->routeIs('users.index') ? 'text-indigo-300 bg-white/10 border-indigo-500/30 shadow-[0_0_15px_rgba(99,102,241,0.3)]' : 'text-slate-400 hover:text-white hover:bg-white/5' }} rounded-xl transition-all duration-200 border border-transparent">
                                <i class="fa-solid fa-users w-6 text-center"></i>
                                <span class="ml-3 font-medium">Users</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('admin.contacts.index') }}"
                            class="flex items-center p-3 {{ request()->routeIs('admin.contacts.*') ? 'text-indigo-300 bg-white/10 border-indigo-500/30 shadow-[0_0_15px_rgba(99,102,241,0.3)]' : 'text-slate-400 hover:text-white hover:bg-white/5' }} rounded-xl transition-all duration-200 border border-transparent">
                            <i class="fa-solid fa-envelope w-6 text-center"></i>
                            <span class="ml-3 font-medium">Contact</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-3 text-slate-400 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-200">
                            <i class="fa-solid fa-layer-group w-6 text-center"></i>
                            <span class="ml-3 font-medium">Appointments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-3 text-slate-400 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-200">
                            <i class="fa-solid fa-gear w-6 text-center"></i>
                            <span class="ml-3 font-medium">Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto relative scroll-smooth flex flex-col justify-between">
            <div>
                @include('admin.layouts.header')

                <div class="p-6 md:p-8 space-y-8 max-w-7xl mx-auto">
                    @yield('admin-content')
                </div>
            </div>

            @include('admin.layouts.footer')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            const toggle = document.getElementById('sidebarToggle');
            const close = document.getElementById('closeSidebar');

            if (toggle) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log('Sidebar toggle clicked');
                    sidebar.classList.add('active');
                    backdrop.classList.add('active');
                });
            }

            const hideSidebar = () => {
                console.log('Hiding sidebar');
                sidebar.classList.remove('active');
                backdrop.classList.remove('active');
            };

            if (close) close.addEventListener('click', hideSidebar);
            if (backdrop) backdrop.addEventListener('click', hideSidebar);

            // Log to debug if elements are found
            console.log('Sidebar elements found:', {
                sidebar: !!sidebar,
                backdrop: !!backdrop,
                toggle: !!toggle,
                close: !!close
            });
        });
    </script>
@endsection
