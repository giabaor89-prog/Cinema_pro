@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap');

        :root {
            --primary-red: #e50914;
            --dark-black: #020202;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--dark-black);
            margin: 0;
            overflow: hidden;
        }

        /* Container chia đôi màn hình */
        .split-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* Bên trái: Visual Cinematic (Poster Film lớn) */
        .visual-side {
            flex: 1.3;
            position: relative;
            display: none; /* Ẩn trên mobile */
            overflow: hidden;
        }

        @media (min-width: 1024px) {
            .visual-side { display: block; }
        }

        .visual-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.5) contrast(1.1);
            transition: transform 15s ease-out;
        }

        .visual-side:hover .visual-image {
            transform: scale(1.15);
        }

        .visual-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(2,2,2,0) 0%, rgba(2,2,2,1) 95%);
        }

        /* Bên phải: Form Side */
        .form-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
            background-color: var(--dark-black);
            position: relative;
        }

        .form-wrapper {
            width: 100%;
            max-width: 420px;
            z-index: 10;
        }

        /* Logo Syncopate */
        .cinema-logo {
            font-family: 'Bebas Neue', cursive;
            font-size: 45px;
            letter-spacing: 5px;
            margin-bottom: 50px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Input Custom Glass */
        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-box {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 18px 25px;
            color: white;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
            box-sizing: border-box;
            font-size: 15px;
        }

        .input-box:focus {
            border-color: var(--primary-red);
            background: rgba(229, 9, 20, 0.05);
            box-shadow: 0 0 30px rgba(229, 9, 20, 0.2);
            transform: translateY(-2px);
        }

        .field-label {
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #555;
            margin-bottom: 10px;
            display: block;
            padding-left: 5px;
        }

        /* Button Red Glow */
        .btn-login {
            background: var(--primary-red);
            color: white;
            width: 100%;
            padding: 20px;
            border-radius: 20px;
            border: none;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 4px;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 15px 35px rgba(229, 9, 20, 0.3);
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #ff0a16;
            box-shadow: 0 20px 50px rgba(229, 9, 20, 0.5);
            transform: translateY(-4px);
        }

        .link-footer {
            color: #666;
            font-size: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s;
        }

        .link-footer:hover {
            color: var(--primary-red);
        }

        /* Nháy đỏ nhẹ ở nền */
        .ambient-light {
            position: absolute;
            width: 500px;
            height: 500px;
            background: var(--primary-red);
            filter: blur(180px);
            opacity: 0.08;
            pointer-events: none;
            bottom: -250px;
            right: -100px;
        }
    </style>

    <div class="split-container">
        <div class="visual-side">
            <img src="https://images.unsplash.com/photo-1478720568477-152d9b164e26?q=80&w=2070" class="visual-image" alt="Cinema Experience">
            <div class="visual-overlay"></div>
            
            <div class="absolute bottom-24 left-24 z-20">
                <p class="text-red-600 font-black tracking-[10px] uppercase text-xs mb-4">Welcome Back</p>
                <h2 class="text-7xl font-black text-white italic leading-none mb-6">RE-ENTER<br>THE MAGIC.</h2>
                <div class="h-1 w-24 bg-red-600"></div>
            </div>
        </div>

        <div class="form-side">
            <div class="ambient-light"></div>
            
            <div class="form-wrapper">
                <div class="cinema-logo text-white">
                    <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-play text-white text-xl"></i>
                    </div>
                    <span>CINEMA<span class="text-red-600">PRO</span></span>
                </div>

                <div class="mb-10">
                    <h3 class="text-3xl font-black text-white uppercase tracking-tighter">Đăng nhập</h3>
                    <p class="text-gray-500 mt-2 font-medium">Chào mừng đạo diễn trở lại với rạp phim.</p>
                </div>

                <x-auth-session-status class="mb-6 text-sm font-bold text-green-500" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group">
                        <label class="field-label" for="email">Tài khoản</label>
                        <input id="email" type="email" name="email" class="input-box" 
                               value="{{ old('email') }}" required autofocus 
                               placeholder="email@cinemapro.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500 font-bold" />
                    </div>

                    <div class="input-group">
                        <div class="flex justify-between items-center mb-2">
                            <label class="field-label !mb-0" for="password">Mật khẩu</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="link-footer text-[10px] uppercase">Quên?</a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" class="input-box" 
                               required autocomplete="current-password"
                               placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500 font-bold" />
                    </div>

                    <div class="flex items-center gap-3 mb-8 px-2">
                        <input id="remember_me" type="checkbox" name="remember" 
                               class="w-4 h-4 rounded border-gray-800 bg-black text-red-600 focus:ring-red-600">
                        <label for="remember_me" class="text-xs font-bold text-gray-500 uppercase tracking-widest cursor-pointer hover:text-white transition">Ghi nhớ tôi</label>
                    </div>

                    <button type="submit" class="btn-login">
                        Vào sảnh chờ
                    </button>

                    <div class="text-center mt-12 pt-8 border-t border-white/5">
                        <p class="text-gray-600 text-xs font-bold uppercase tracking-widest">
                            Chưa có vé mời? 
                            <a href="{{ route('register') }}" class="text-red-600 ml-2 hover:underline underline-offset-4">Đăng ký ngay</a>
                        </p>
                    </div>
                </form>

                <div class="mt-16 opacity-10 text-center">
                    <p class="text-[9px] font-black uppercase tracking-[10px] text-white">Cinema Pro Studio 2026</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>