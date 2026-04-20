<x-guest-layout>
    <div class="flex flex-col lg:flex-row min-h-screen">
        
        <div class="hidden lg:block lg:w-3/5 relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?q=80&w=2070" 
                 class="absolute inset-0 w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-[#050505]"></div>
            
            <div class="absolute bottom-20 left-20">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center shadow-[0_0_30px_rgba(229,9,20,0.5)]">
                        <i class="fa-solid fa-film text-white text-xl"></i>
                    </div>
                    <span class="font-['Syncopate'] text-4xl text-white font-bold tracking-tighter">
                        CINEMA<span class="text-red-600">PRO</span>
                    </span>
                </div>
                <h2 class="text-6xl font-extrabold text-white italic leading-tight">THE FUTURE OF<br>CINEMA EXPERIENCE</h2>
            </div>
        </div>

        <div class="w-full lg:w-2/5 flex items-center justify-center p-8 lg:p-16 bg-[#050505]">
            <div class="w-full max-w-md">
                <div class="mb-10">
                    <h1 class="text-4xl font-bold text-white mb-2">Đăng ký mới</h1>
                    <p class="text-gray-500">Trở thành hội viên để nhận ưu đãi đặc quyền.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Họ và tên</label>
                        <input type="text" name="name" placeholder="Nguyễn Văn A" required autofocus>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Email cá nhân</label>
                        <input type="email" name="email" placeholder="example@gmail.com" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Mật khẩu</label>
                            <input type="password" name="password" placeholder="••••••••" required>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Xác nhận</label>
                            <input type="password" name="password_confirmation" placeholder="••••••••" required>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-red-600 hover:bg-white hover:text-black text-white font-black py-4 rounded-xl uppercase tracking-widest transition-all duration-300 shadow-lg shadow-red-600/20">
                        Tạo tài khoản ngay
                    </button>

                    <div class="text-center mt-8">
                        <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-red-500 transition">
                            Đã có tài khoản? <span class="text-red-600 font-bold">Đăng nhập</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-guest-layout>