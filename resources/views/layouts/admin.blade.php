<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --kampar-green: #1B4332;
            --kampar-green-dark: #0D2818;
            --kampar-gold: #D4AF37;
        }

        * { box-sizing: border-box; }

        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4f6f5;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, var(--kampar-green) 0%, var(--kampar-green-dark) 100%);
            color: #fff;
            padding: 1.75rem 1.25rem;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 2.25rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.12);
        }

        .sidebar-brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: rgba(212, 175, 55, 0.15);
            color: var(--kampar-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .sidebar-brand h5 {
            margin: 0;
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.3;
            color: #fff;
        }

        .sidebar-brand small {
            color: var(--kampar-gold);
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .sidebar-menu-label {
            color: rgba(255,255,255,0.4);
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0 0.8rem;
            margin-bottom: 0.6rem;
        }

        .sidebar a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.7rem 0.9rem;
            border-radius: 8px;
            margin-bottom: 0.3rem;
            font-size: 0.92rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar a i {
            font-size: 1.05rem;
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        .sidebar a.active {
            background: var(--kampar-gold);
            color: var(--kampar-green-dark);
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.35);
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 1.25rem;
            border-top: 1px solid rgba(255,255,255,0.12);
        }

        .sidebar-footer a {
            color: rgba(255,255,255,0.65);
        }

        .sidebar-footer a:hover {
            color: #fff;
            background: rgba(255,255,255,0.08);
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: #fff;
            padding: 1.1rem 2rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar h5 {
            margin: 0;
            font-weight: 700;
            color: var(--kampar-green-dark);
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--kampar-green);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .topbar-user-name {
            font-size: 0.88rem;
            font-weight: 600;
            color: #333;
            line-height: 1.2;
        }

        .topbar-user-role {
            font-size: 0.75rem;
            color: #888;
        }

        .content-wrap {
            padding: 2rem;
        }

        /* ===== STAT CARDS (dashboard) ===== */
        .stat-card {
            background: #fff;
            border-radius: 14px;
            padding: 1.4rem 1.3rem;
            box-shadow: 0 4px 14px rgba(13,40,24,0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(13,40,24,0.1);
        }

        .stat-card-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 0.9rem;
        }

        .stat-card-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--kampar-green-dark);
            line-height: 1.1;
        }

        .stat-card-label {
            color: #888;
            font-size: 0.85rem;
            margin-top: 4px;
        }

        /* ===== QUICK ACTION CARDS (dashboard) ===== */
        .quick-action-card {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            background: #fff;
            border-radius: 14px;
            padding: 1.3rem;
            text-decoration: none;
            box-shadow: 0 4px 14px rgba(13,40,24,0.06);
            transition: all 0.2s ease;
            height: 100%;
        }

        .quick-action-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(13,40,24,0.1);
        }

        .quick-action-card i {
            font-size: 1.4rem;
            color: var(--kampar-green);
            background: rgba(27,67,50,0.08);
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .quick-action-card h6 {
            font-weight: 700;
            color: var(--kampar-green-dark);
            margin-bottom: 4px;
            font-size: 0.95rem;
        }

        .quick-action-card p {
            color: #777;
            font-size: 0.83rem;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon"><i class="bi bi-tree-fill"></i></div>
            <div>
                <h5>Kampar Kiri Wisata</h5>
                <small>Admin Panel</small>
            </div>
        </div>

        <div class="sidebar-menu-label">Menu</div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="{{ route('destinasi') }}" class="{{ request()->routeIs('destinasi*') ? 'active' : '' }}">
            <i class="bi bi-geo-alt-fill"></i> Kelola Destinasi
        </a>
        <a href="{{ route('atraksi') }}" class="{{ request()->routeIs('atraksi*') ? 'active' : '' }}">
            <i class="bi bi-stars"></i> Kelola Atraksi
        </a>
        <a href="{{ route('user') }}" class="{{ request()->routeIs('user*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i> Kelola User
        </a>

        <div class="sidebar-footer">
            <a href="{{ route('beranda') }}"><i class="bi bi-box-arrow-left"></i> Kembali ke Situs</a>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h5>@yield('title')</h5>
            <div class="topbar-user">
                <div class="topbar-user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div>
                    <div class="topbar-user-name">{{ Auth::user()->name }}</div>
                    <div class="topbar-user-role">Admin</div>
                </div>
            </div>
        </div>
        <div class="content-wrap">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>