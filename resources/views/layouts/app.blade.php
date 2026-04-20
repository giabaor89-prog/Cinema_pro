<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- Ép thẻ body luôn có nền đen tuyệt đối để không bị hở trắng khi cuộn --}}
<body class="font-sans antialiased text-gray-200 bg-[#020202] selection:bg-red-600 selection:text-white">

    <div class="fixed inset-0 -z-10 overflow-hidden">
        {{-- Lớp nền đen sâu --}}
        <div class="absolute inset-0 bg-black"></div>
        
        {{-- Ánh sáng đỏ hắt từ trên xuống (giống đèn rạp phim) --}}
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_-20%,_rgba(185,28,28,0.25),_transparent_70%)]"></div>
        
        {{-- Ánh sáng đỏ mờ góc dưới để tạo chiều sâu --}}
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_right,_rgba(153,27,27,0.1),_transparent_50%)]"></div>
    </div>

    <div class="min-h-screen flex flex-col relative z-10">

        <div class="sticky top-0 z-50">
            @include('layouts.navigation')
        </div>

        @isset($header)
            <header class="bg-black/40 backdrop-blur-md border-b border-red-900/20 shadow-lg shadow-black/50">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="text-white font-bold">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endisset

        <main class="flex-1">
            {{ $slot }}
        </main>

    </div>

    <script>
        window.onload = function() {
            window.scrollTo(0, 0);
        };
    </script>

</body>
</html>