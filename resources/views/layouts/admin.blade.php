<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة الإدارة')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/admin.css'])
    @php($adminSettings = \App\Models\AdminSetting::current())
   @php($adminSettings = \App\Models\AdminSetting::current())
<style>
    :root {
        --admin-gold: {{ $adminSettings->admin_gold }};
        --admin-maroon: {{ $adminSettings->admin_maroon }};
        --admin-bg: {{ $adminSettings->admin_bg }};
    }
</style>
</head>

<body>

    <div class="admin-shell">

        {{-- Sidebar --}}
        <aside class="admin-sidebar">

            <div class="admin-sidebar__brand">
                لوحة الإدارة
            </div>

            <nav class="admin-sidebar__nav">

                <a href="{{ route('admin.dashboard') }}"
                    class="admin-sidebar__link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                    الرئيسية
                </a>

                <a href="{{ route('admin.restaurants.index') }}"
                    class="admin-sidebar__link {{ request()->routeIs('admin.restaurants.*') ? 'is-active' : '' }}">
                    المطاعم
                </a>

                <a href="{{ route('admin.categories.index') }}"
                    class="admin-sidebar__link {{ request()->routeIs('admin.categories.*') ? 'is-active' : '' }}">
                    التصنيفات
                </a>

                <a href="{{ route('admin.menu-items.index') }}"
                    class="admin-sidebar__link {{ request()->routeIs('admin.menu-items.*') ? 'is-active' : '' }}">
                    الأصناف
                </a>

                <a href="{{ route('admin.settings.edit') }}"
                    class="admin-sidebar__link {{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}">
                    إعدادات الألوان
                </a>

            </nav>

        </aside>

        {{-- Main content --}}
        <div class="flex-1">

            <header class="admin-topbar">

                <h1 class="admin-topbar__title">
                    @yield('page_title', 'لوحة التحكم')
                </h1>

                <div class="flex items-center gap-4">
                    <span class="admin-topbar__user">
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="admin-logout">
                            تسجيل الخروج
                        </button>
                    </form>
                </div>

            </header>

            @if (session('success'))
                <div class="admin-flash-success">
                    {{ session('success') }}
                </div>
            @endif

            <main class="admin-main">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>
