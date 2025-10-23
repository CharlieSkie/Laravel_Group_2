<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" style="margin:0;">
<div class="min-h-screen bg-gray-100">

    {{-- ✅ Navigation for USER --}}
    @if(Auth::check() && Auth::user()->role === 'user')
        <nav style="background-color: #1f2937; color: white; padding: 12px 24px; display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 20px;">
                <!-- Hamburger -->
                <button id="hamburger" style="background: none; border: none; color: white; font-size: 22px; cursor: pointer;">
                    &#9776;
                </button>
                <span style="font-weight: 600;">Paradise User Dashboard</span>
            </div>

            <!-- User Info + Logout -->
            <div style="display: flex; align-items: center; gap: 16px;">
                <span>{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background-color: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- ✅ User Sidebar -->
        <div id="sidebar" style="
            position: fixed;
            top: 0;
            left: -260px;
            width: 240px;
            height: 100%;
            background-color: #111827;
            color: white;
            padding-top: 60px;
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 20px;
            padding-left: 20px;
        ">
            <a href='{{ route('dashboard') }}' style="color: white; text-decoration: none; font-weight: 500;">🏠 Dashboard</a>
            <a href='{{ route('menu') }}' style="color: white; text-decoration: none; font-weight: 500;">🍽️ Menu</a>
            <a href='{{ route('reservations.index') }}' style="color: white; text-decoration: none; font-weight: 500;">📅 Reservations</a>
            <a href='{{ route('profile.edit') }}' style="color: white; text-decoration: none; font-weight: 500;">👤 Profile</a>
        </div>
    @endif


    {{-- ✅ Navigation for ADMIN --}}
    @if(Auth::check() && Auth::user()->role === 'admin')
        <nav style="background-color: #111827; color: white; padding: 12px 24px; display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 20px;">
                <!-- Hamburger -->
                <button id="adminHamburger" style="background: none; border: none; color: white; font-size: 22px; cursor: pointer;">
                    &#9776;
                </button>
                <span style="font-weight: 600;">Admin Dashboard</span>
            </div>

            <!-- Admin Info + Logout -->
            <div style="display: flex; align-items: center; gap: 16px;">
                <span>{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background-color: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- ✅ Admin Sidebar -->
        <div id="adminSidebar" style="
            position: fixed;
            top: 0;
            left: -260px;
            width: 240px;
            height: 100%;
            background-color: #1e1e1e;
            color: white;
            padding-top: 60px;
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 20px;
            padding-left: 20px;
        ">
            <a href='{{ route('dashboard') }}' style="color: white; text-decoration: none; font-weight: 500;">🏠 Dashboard</a>
            <a href='#' style="color: white; text-decoration: none; font-weight: 500;">🍲 Manage Foods</a>
            <a href='#' style="color: white; text-decoration: none; font-weight: 500;">📋 Manage Reservations</a>
            <a href='#' style="color: white; text-decoration: none; font-weight: 500;">👥 Users</a>
            <a href='{{ route('profile.edit') }}' style="color: white; text-decoration: none; font-weight: 500;">👤 Profile</a>
        </div>
    @endif


    <!-- ✅ Shared Overlay -->
    <div id="overlay" style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 999;
    "></div>


    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

<!-- ✅ Sidebar Toggle Script -->
<script>
    const sidebar = document.getElementById('sidebar');
    const adminSidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('overlay');
    const hamburger = document.getElementById('hamburger');
    const adminHamburger = document.getElementById('adminHamburger');

    function toggleSidebar(targetSidebar) {
        const isOpen = targetSidebar.style.left === '0px';
        targetSidebar.style.left = isOpen ? '-260px' : '0';
        overlay.style.opacity = isOpen ? '0' : '1';
        overlay.style.visibility = isOpen ? 'hidden' : 'visible';
    }

    if (hamburger && sidebar) {
        hamburger.addEventListener('click', () => toggleSidebar(sidebar));
    }

    if (adminHamburger && adminSidebar) {
        adminHamburger.addEventListener('click', () => toggleSidebar(adminSidebar));
    }

    overlay.addEventListener('click', () => {
        if (sidebar) sidebar.style.left = '-260px';
        if (adminSidebar) adminSidebar.style.left = '-260px';
        overlay.style.opacity = '0';
        overlay.style.visibility = 'hidden';
    });
</script>

</body>
</html>
