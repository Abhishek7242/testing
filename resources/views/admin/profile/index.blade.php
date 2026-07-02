<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Linkuss Admin</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="profile-page">
        <!-- Profile Card -->
        <div class="profile-card">
            <!-- Header -->
            <div class="profile-header">
                <div class="header-icon">
                    <i class="fa-solid fa-user-circle"></i>
                </div>
                <h2>Linkuss Admin</h2>
            </div>

            <!-- Profile Content -->
            <div class="profile-content">
                <!-- Avatar Section -->
                <div class="avatar-section">
                    <div class="avatar-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Abhishek+Verma&size=120&background=6366f1&color=fff"
                            alt="Profile Avatar" class="avatar-img">
                        <button class="edit-avatar-btn">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </div>
                </div>

                <!-- User Info -->
                <div class="user-info">
                    <div class="user-name">
                        <h3>Abhishek verma</h3>
                        <button class="edit-name-btn">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </div>
                    <p class="user-email">abhishek17242@gmail.com</p>
                    <span class="user-role">Super admin</span>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <a href="#" class="action-btn">
                        <i class="fa-solid fa-key"></i>
                        <span>Change Password</span>
                    </a>
                    {{-- <a href="#" class="action-btn">
                        <i class="fa-solid fa-link"></i>
                        <span>Urlmg Panel</span>
                    </a> --}}
                    <a href="#" class="action-btn logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </div>

                <!-- Settings Button -->
                {{-- <div class="settings-section">
                    <a href="#" class="settings-btn">
                        <i class="fa-solid fa-gear"></i>
                        <span>Settings</span>
                    </a>
                </div> --}}
            </div>
        </div>

        <!-- Alternative Compact View -->
        <div class="profile-compact">
            <div class="compact-avatar">
                <span class="avatar-initials">AU</span>
            </div>
            <div class="compact-info">
                <h4>Admin User</h4>
                <p>Super Admin</p>
            </div>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #0a0e1a;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Profile Page Container */
        .profile-page {
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 30px;
            flex-wrap: wrap;
        }

        /* Main Profile Card */
        .profile-card {
            width: 100%;
            max-width: 320px;
            background: linear-gradient(145deg, #1a1f2e 0%, #0f1419 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(255, 255, 255, 0.05);
        }

        /* Header */
        .profile-header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 20px;
        }

        .profile-header h2 {
            color: #ffffff;
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }

        /* Profile Content */
        .profile-content {
            padding: 30px 24px;
        }

        /* Avatar Section */
        .avatar-section {
            display: flex;
            justify-content: center;
            margin-bottom: 24px;
        }

        .avatar-wrapper {
            position: relative;
        }

        .avatar-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid rgba(99, 102, 241, 0.3);
            box-shadow: 0 8px 24px rgba(99, 102, 241, 0.2);
        }

        .edit-avatar-btn {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            border: 3px solid #1a1f2e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .edit-avatar-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
        }

        /* User Info */
        .user-info {
            text-align: center;
            margin-bottom: 24px;
        }

        .user-name {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 8px;
        }

        .user-name h3 {
            color: #ffffff;
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }

        .edit-name-btn {
            width: 28px;
            height: 28px;
            background: rgba(148, 163, 184, 0.1);
            border: none;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .edit-name-btn:hover {
            background: rgba(148, 163, 184, 0.2);
            color: #cbd5e1;
        }

        .user-email {
            color: #94a3b8;
            font-size: 14px;
            margin: 0 0 12px 0;
        }

        .user-role {
            display: inline-block;
            padding: 6px 16px;
            background: linear-gradient(135deg, #8b5cf6 0%, #a855f7 100%);
            color: #ffffff;
            font-size: 13px;
            font-weight: 500;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
        }

        /* Action Buttons */
        .action-buttons {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            background: rgba(51, 65, 85, 0.3);
            border: 1px solid rgba(71, 85, 105, 0.3);
            border-radius: 10px;
            color: #e2e8f0;
            text-decoration: none;
            margin-bottom: 10px;
            transition: all 0.2s ease;
        }

        .action-btn:last-child {
            margin-bottom: 0;
        }

        .action-btn i {
            font-size: 16px;
            color: #94a3b8;
        }

        .action-btn span {
            font-size: 14px;
            font-weight: 500;
        }

        .action-btn:hover {
            background: rgba(51, 65, 85, 0.5);
            border-color: rgba(99, 102, 241, 0.3);
            transform: translateX(4px);
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.3);
        }

        .logout-btn:hover i {
            color: #ef4444;
        }

        /* Settings Section */
        .settings-section {
            margin-top: 20px;
        }

        .settings-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            background: rgba(51, 65, 85, 0.3);
            border: 1px solid rgba(71, 85, 105, 0.3);
            border-radius: 10px;
            color: #e2e8f0;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .settings-btn i {
            font-size: 16px;
            color: #94a3b8;
        }

        .settings-btn span {
            font-size: 14px;
            font-weight: 500;
        }

        .settings-btn:hover {
            background: rgba(51, 65, 85, 0.5);
            border-color: rgba(99, 102, 241, 0.3);
            transform: translateX(4px);
        }

        /* Compact Profile View */
        .profile-compact {
            width: 100%;
            max-width: 500px;
            background: linear-gradient(145deg, #1a1f2e 0%, #0f1419 100%);
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.05);
        }

        .compact-avatar {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .avatar-initials {
            color: #ffffff;
            font-size: 18px;
            font-weight: 600;
        }

        .compact-info h4 {
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            margin: 0 0 4px 0;
        }

        .compact-info p {
            color: #94a3b8;
            font-size: 13px;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-page {
                padding: 20px 10px;
            }

            .profile-card {
                max-width: 100%;
            }
        }
    </style>
</body>

</html>
