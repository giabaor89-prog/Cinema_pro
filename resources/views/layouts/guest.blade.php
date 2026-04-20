<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Giữ các style cũ nhưng thêm helper class này */
        .cinema-input {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
            border-radius: 12px !important;
        }
        body { background-color: #050505; }
    </style>
</head>

<body class="antialiased min-h-screen bg-[#050505]">
    {{-- Nếu là trang Login/Register cũ thì dùng kiểu cũ, 
         nhưng ở đây mình sẽ để $slot tự do để trang Register mới chiếm trọn màn hình --}}
    
    <div class="relative z-10">
        {{ $slot }}
    </div>

    <script>
        document.querySelectorAll('input').forEach(el => {
            el.classList.add('cinema-input', 'w-full', 'px-4', 'py-3', 'outline-none', 'focus:border-red-600', 'transition-all');
        });
    </script>
</body>
</html>