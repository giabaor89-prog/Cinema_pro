<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Pro</title>

    {{-- 🔥 QUAN TRỌNG: LOAD TAILWIND --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #e50914;
            --primary-hover: #ff1f1f;
            --dark-bg: #080808;
            --card-bg: #1a1a1a;
            --text-gray: #b3b3b3;
            --transition: all 0.3s;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark-bg);
            color: white;
        }

        .navbar {
            background: rgba(8, 8, 8, 0.9);
            position: sticky;
            top: 0;
            padding: 0 6%;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: var(--primary);
            text-decoration: none;
        }

        .nav-menu {
            display: flex;
            gap: 20px;
            list-style: none;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
        }

        footer {
            padding: 40px;
            text-align: center;
            color: var(--text-gray);
        }
    </style>
</head>

<body>

<div class="bg-glow"></div>

<!-- NAVBAR -->
<nav class="navbar">
    <div style="display:flex; gap:30px; align-items:center;">
        <a href="/" class="logo">CINEMA PRO</a>

        <ul class="nav-menu">
            <li><a href="{{ route('showtimes') }}">Lịch Chiếu</a></li>
            <li><a href="/about">Giới thiệu</a></li>
            <li><a href="/contact">Liên hệ</a></li>
            <li><a href="/my-tickets">🎟 Vé của tôi</a></li>
        </ul>
    </div>

    <div>
        @auth
            <span>{{ auth()->user()->name }}</span>
            <form method="POST" action="/logout" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:red;">
                    Đăng xuất
                </button>
            </form>
        @else
            <a href="/login">Đăng nhập</a>
            <a href="/register">Đăng ký</a>
        @endauth
    </div>
</nav>

<!-- CONTENT -->
<main style="padding-top: 80px;">
    @yield('content')
</main>

<!-- FOOTER -->
<footer>
    © 2026 Cinema Pro
</footer>

</body>
</html>