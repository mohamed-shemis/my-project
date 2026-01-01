<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" @if(app()->getLocale()==='ar') dir="rtl" @endif>

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    {{-- Bootstrap RTL --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">

    {{-- FontAwesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --bg-body: #f4f6f9;
            --bg-card: #ffffff;
            --text-main: #032642;
            --text-muted: #6c757d;
            --sidebar-bg: #032642;
            --sidebar-hover: #0f3c61;
            --border-soft: #e1e4ea;
        }

        body.dark-mode {
            --bg-body: #0f172a;
            --bg-card: #111827;
            --text-main: #e5e7eb;
            --text-muted: #9ca3af;
            --sidebar-bg: #020617;
            --sidebar-hover: #1e293b;
            --border-soft: #1f2937;
        }

        body {
            margin: 0;
            background: var(--bg-body);
            color: var(--text-main);
            font-family: "Tajawal", sans-serif;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 240px;
            background: var(--sidebar-bg);
            padding: 20px;
            color: #fff;
        }

        .admin-sidebar a {
            display: block;
            padding: 10px 14px;
            margin-bottom: 6px;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
        }

        .admin-sidebar a.active,
        .admin-sidebar a:hover {
            background: var(--sidebar-hover);
        }

        .admin-main {
            flex-grow: 1;
        }

        .admin-topbar {
            background: var(--bg-card);
            border-bottom: 1px solid var(--border-soft);
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-main-inner {
            padding: 20px;
        }

        .admin-card {
            background: var(--bg-card) !important;
            border-radius: 12px;
            padding: 18px;
            border: 1px solid var(--border-soft);
        }

        .admin-table {
            background: var(--bg-card);
            border: 1px solid var(--border-soft);
        }

        .theme-btn {
            background: transparent;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: var(--text-main);
        }
    </style>
</head>

<body>

<div class="admin-wrapper">

    {{-- Sidebar --}}
    <aside class="admin-sidebar">
        <h4 class="mb-4">El Amar</h4>

        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-line"></i> Dashboard
        </a>

        <a href="{{ route('admin.users') }}"
           class="{{ request()->routeIs('admin.users') ? 'active' : '' }}">
            <i class="fa-solid fa-users"></i> Users
        </a>

        <a href="{{ route('admin.messages') }}"
           class="{{ request()->routeIs('admin.messages') ? 'active' : '' }}">
            <i class="fa-solid fa-envelope"></i> Messages
        </a>

        <a href="{{ route('admin.requests') }}"
           class="{{ request()->routeIs('admin.requests') ? 'active' : '' }}">
            <i class="fa-solid fa-file"></i> Requests
        </a>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button class="btn btn-danger w-100">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </button>
        </form>
    </aside>

    {{-- Main Content --}}
    <main class="admin-main">

        {{-- Top Bar --}}
        <div class="admin-topbar">
            <h5 class="mb-0">@yield('page_title')</h5>

            <button id="themeToggle" class="theme-btn">
                <i class="fa-solid fa-moon"></i>
            </button>
        </div>

        <div class="admin-main-inner">
            @yield('content')
        </div>

    </main>

</div>

{{-- Dark Mode Script --}}
<script>
(function () {
    const body = document.body;
    const toggle = document.getElementById('themeToggle');

    // Apply saved preference
    if (localStorage.getItem('adminTheme') === 'dark') {
        body.classList.add('dark-mode');
    }

    const updateIcon = () => {
        toggle.innerHTML = body.classList.contains('dark-mode')
            ? '<i class="fa-solid fa-sun"></i>'
            : '<i class="fa-solid fa-moon"></i>';
    };

    updateIcon();

    toggle.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        localStorage.setItem(
            'adminTheme',
            body.classList.contains('dark-mode') ? 'dark' : 'light'
        );
        updateIcon();
    });
})();
</script>

@yield('scripts')

</body>
</html>
