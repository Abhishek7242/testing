<header class="h-20 glass sticky top-0 z-10 border-b border-white/10 px-6 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <button id="sidebarToggle" class="md:hidden text-slate-400 hover:text-white">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>
    <div class="flex items-center gap-4">
        <button
            class="w-10 h-10 rounded-full bg-slate-800/50 flex items-center justify-center text-slate-400 hover:text-white hover:bg-indigo-500/20 transition-all relative">
            <i class="fa-regular fa-bell"></i>
            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
        </button>
        <button
            class="w-10 h-10 rounded-full bg-slate-800/50 flex items-center justify-center text-slate-400 hover:text-white hover:bg-indigo-500/20 transition-all">
            <i class="fa-regular fa-envelope"></i>
        </button>

        <!-- Profile Button -->
        <div class="relative">
            <button id="profileToggle" class="profile-avatar-btn">
                <div class="avatar-circle">
                    <span>{{ substr(Auth::user()->name, 0, 2) }}</span>
                </div>
                <div class="avatar-info hidden md:block">
                    <h4>{{ Auth::user()->name }}</h4>
                    <p>{{ ucfirst(Auth::user()->role) }}</p>
                </div>
            </button>

            <!-- Profile Dropdown Modal -->
            <div id="profileDropdown" class="profile-dropdown">
                <!-- Header -->
                <div class="dropdown-header">
                    <div class="header-icon">
                        <i class="fa-solid fa-user-circle"></i>
                    </div>
                    <h2>Linkuss Admin</h2>
                </div>

                <!-- Profile Content -->
                <div class="dropdown-content">
                    <!-- Avatar Section -->
                    <div class="avatar-section">
                        <div class="avatar-wrapper">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&size=120&background=6366f1&color=fff"
                                alt="Profile Avatar" class="avatar-img">
                            <button class="edit-avatar-btn">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </div>
                    </div>

                    <!-- User Info -->
                    <div class="user-info">
                        <div class="user-name">
                            <h3>{{ Auth::user()->name }}</h3>
                            <button class="edit-name-btn">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </div>
                        <p class="user-email">{{ Auth::user()->email }}</p>
                        <span class="user-role">{{ ucfirst(Auth::user()->role) }}</span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('admin.password.change') }}" class="action-btn">
                            <i class="fa-solid fa-key"></i>
                            <span>Change Password</span>
                        </a>

                        <form method="POST" action="{{ route('admin.logout') }}" id="logout-form" class="w-full">
                            @csrf
                            <button type="submit" class="action-btn logout-btn">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</header>

<style>
    /* Profile Avatar Button */
    .profile-avatar-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 4px;
        background: rgba(30, 41, 59, 0.5);
        border: 1px solid rgba(71, 85, 105, 0.3);
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    @media (min-width: 768px) {
        .profile-avatar-btn {
            gap: 12px;
            padding: 6px 12px 6px 6px;
        }
    }

    .profile-avatar-btn:hover {
        background: rgba(30, 41, 59, 0.8);
        border-color: rgba(99, 102, 241, 0.3);
    }

    .avatar-circle {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    @media (min-width: 768px) {
        .avatar-circle {
            width: 40px;
            height: 40px;
        }
    }

    .avatar-circle span {
        color: #ffffff;
        font-size: 14px;
        font-weight: 600;
    }

    @media (min-width: 768px) {
        .avatar-circle span {
            font-size: 16px;
        }
    }

    .avatar-info h4 {
        color: #ffffff;
        font-size: 14px;
        font-weight: 600;
        margin: 0;
        text-align: left;
    }

    .avatar-info p {
        color: #94a3b8;
        font-size: 12px;
        margin: 0;
        text-align: left;
    }

    /* Profile Dropdown */
    .profile-dropdown {
        position: absolute;
        top: calc(100% + 12px);
        right: 0;
        width: 320px;
        background: linear-gradient(145deg, #1a1f2e 0%, #0f1419 100%);
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6),
            0 0 0 1px rgba(255, 255, 255, 0.05);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        z-index: 50;
    }

    .profile-dropdown.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* Dropdown Header */
    .dropdown-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-radius: 16px 16px 0 0;
    }

    .header-icon {
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 18px;
    }

    .dropdown-header h2 {
        color: #ffffff;
        font-size: 16px;
        font-weight: 600;
        margin: 0;
    }

    /* Dropdown Content */
    .dropdown-content {
        padding: 24px 20px;
    }

    /* Avatar Section */
    .avatar-section {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .avatar-wrapper {
        position: relative;
    }

    .avatar-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 3px solid rgba(99, 102, 241, 0.3);
        box-shadow: 0 8px 24px rgba(99, 102, 241, 0.2);
    }

    .edit-avatar-btn {
        position: absolute;
        bottom: 2px;
        right: 2px;
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border: 3px solid #1a1f2e;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 12px;
    }

    .edit-avatar-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
    }

    /* User Info */
    .user-info {
        text-align: center;
        margin-bottom: 20px;
    }

    .user-name {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-bottom: 6px;
    }

    .user-name h3 {
        color: #ffffff;
        font-size: 18px;
        font-weight: 600;
        margin: 0;
    }

    .edit-name-btn {
        width: 24px;
        height: 24px;
        background: rgba(148, 163, 184, 0.1);
        border: none;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 10px;
    }

    .edit-name-btn:hover {
        background: rgba(148, 163, 184, 0.2);
        color: #cbd5e1;
    }

    .user-email {
        color: #94a3b8;
        font-size: 13px;
        margin: 0 0 10px 0;
    }

    .user-role {
        display: inline-block;
        padding: 5px 14px;
        background: linear-gradient(135deg, #8b5cf6 0%, #a855f7 100%);
        color: #ffffff;
        font-size: 12px;
        font-weight: 500;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
    }

    /* Action Buttons */
    .action-buttons {
        margin-bottom: 16px;
        padding-bottom: 16px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .action-btn {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: rgba(45, 55, 75, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        color: #e2e8f0;
        text-decoration: none;
        margin-bottom: 10px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        box-sizing: border-box;
        position: relative;
    }

    .action-btn:last-child {
        margin-bottom: 0;
    }

    .action-btn i {
        font-size: 16px;
        color: #94a3b8;
        width: 20px;
        text-align: center;
        flex-shrink: 0;
    }

    .action-btn span {
        font-size: 14px;
        font-weight: 500;
        white-space: nowrap;
    }

    .action-btn:hover {
        background: rgba(51, 65, 85, 0.6);
        border-color: rgba(99, 102, 241, 0.4);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .logout-btn:hover {
        background: rgba(239, 68, 68, 0.15);
        border-color: rgba(239, 68, 68, 0.4);
    }

    .logout-btn:hover i {
        color: #ef4444;
    }

    /* Settings Section */
    .settings-section {
        margin-top: 16px;
    }

    .settings-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 14px;
        background: rgba(51, 65, 85, 0.3);
        border: 1px solid rgba(71, 85, 105, 0.3);
        border-radius: 10px;
        color: #e2e8f0;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .settings-btn i {
        font-size: 14px;
        color: #94a3b8;
    }

    .settings-btn span {
        font-size: 13px;
        font-weight: 500;
    }

    .settings-btn:hover {
        background: rgba(51, 65, 85, 0.5);
        border-color: rgba(99, 102, 241, 0.3);
        transform: translateX(4px);
    }
</style>

<script>
    // Profile Dropdown Toggle - Wait for DOM to load
    document.addEventListener('DOMContentLoaded', function() {
        const profileToggle = document.getElementById('profileToggle');
        const profileDropdown = document.getElementById('profileDropdown');
        let isProfileOpen = false;

        if (profileToggle && profileDropdown) {
            profileToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                isProfileOpen = !isProfileOpen;
                profileDropdown.classList.toggle('show', isProfileOpen);
                console.log('Profile dropdown toggled:', isProfileOpen);
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!profileDropdown.contains(e.target) && !profileToggle.contains(e.target)) {
                    isProfileOpen = false;
                    profileDropdown.classList.remove('show');
                }
            });

            // Prevent dropdown from closing when clicking inside it
            profileDropdown.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        } else {
            console.error('Profile elements not found:', {
                profileToggle: !!profileToggle,
                profileDropdown: !!profileDropdown
            });
        }
    });
</script>
