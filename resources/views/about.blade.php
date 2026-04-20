<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&family=Inter:wght@300;400;700;900&display=swap');
        
        .font-cinema { font-family: 'Syncopate', sans-serif; }
        .font-body { font-family: 'Inter', sans-serif; }

        .bg-cinema-master {
            background: #000;
            background-image: 
                radial-gradient(circle at 0% 0%, #1a0505 0%, transparent 40%),
                radial-gradient(circle at 100% 100%, #1a0505 0%, transparent 40%);
        }

        /* Border hiệu ứng mờ nhẹ */
        .border-glass { border: 1px solid rgba(255, 255, 255, 0.08); }
        
        /* Hiệu ứng hover cho khối tính năng */
        .feature-box {
            transition: all 0.5s cubic-bezier(0.2, 1, 0.3, 1);
        }
        .feature-box:hover {
            background: rgba(220, 38, 38, 0.05);
            border-color: rgba(220, 38, 38, 0.4);
        }

        /* Nút bấm tinh giản nhưng đẳng cấp */
        .btn-cinema-pro {
            background: #ef4444;
            padding: 1.25rem 3rem;
            font-size: 0.75rem;
            font-weight: 900;
            letter-spacing: 0.4em;
            transition: all 0.3s;
            position: relative;
            z-index: 1;
        }
        .btn-cinema-pro:hover {
            background: #fff;
            color: #000;
            transform: scale(1.05);
        }
    </style>

    <div class="bg-cinema-master min-h-screen text-white font-body selection:bg-red-600">

        <section class="relative min-h-[90vh] flex items-center justify-center px-6 overflow-hidden">
            <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
                <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                    <div class="inline-block py-1 px-4 border border-red-600/30 rounded-full">
                        <span class="text-red-500 font-black text-[10px] tracking-[0.3em] uppercase">VỀ CHÚNG TÔI</span>
                    </div>
                    <h1 class="font-cinema text-5xl md:text-7xl lg:text-8xl leading-tight tracking-tighter italic">
                        CINEMA <span class="text-red-600">PRO</span>
                    </h1>
                    <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto lg:mx-0 font-light leading-relaxed">
                        Nơi công nghệ IMAX hòa quyện cùng dịch vụ Premium, mang đến cho bạn những khoảnh khắc điện ảnh không thể nào quên.
                    </p>
                    <div class="pt-4">
                        <a href="/movies" class="btn-cinema-pro inline-block uppercase">Đặt vé ngay</a>
                    </div>
                </div>
                
                <div class="lg:col-span-5 relative hidden lg:block">
                    <div class="aspect-[4/5] rounded-[2rem] overflow-hidden border-glass shadow-2xl rotate-3 translate-x-10 hover:rotate-0 transition-all duration-700">
                        <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?q=80&w=2070" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500">
                    </div>
                    <div class="absolute -bottom-10 -left-10 bg-red-600 p-8 rounded-3xl shadow-2xl -rotate-6">
                        <p class="font-cinema text-xl italic">IMAX 4K</p>
                        <p class="text-[10px] font-bold uppercase tracking-widest opacity-80">Standard 2026</p>
                    </div>
                </div>
            </div>
            
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20 pointer-events-none"></div>
        </section>

        <section class="py-24 bg-white/[0.02] border-y border-white/5">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="feature-box p-10 border-glass rounded-[2.5rem]">
                        <div class="w-12 h-12 bg-red-600/10 border border-red-600/20 rounded-xl flex items-center justify-center mb-6 text-red-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        </div>
                        <h3 class="font-cinema text-lg mb-4">IMAX Laser</h3>
                        <p class="text-gray-500 text-sm leading-loose uppercase font-bold tracking-tighter">Hình ảnh sắc nét gấp 4 lần so với máy chiếu thông thường.</p>
                    </div>

                    <div class="feature-box p-10 border-glass rounded-[2.5rem] bg-white/[0.03]">
                        <div class="w-12 h-12 bg-red-600/10 border border-red-600/20 rounded-xl flex items-center justify-center mb-6 text-red-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                        </div>
                        <h3 class="font-cinema text-lg mb-4 text-red-600">Dolby Atmos</h3>
                        <p class="text-gray-400 text-sm leading-loose uppercase font-bold tracking-tighter">Âm thanh vòm đa chiều, lấp đầy mọi khoảng không gian trong phòng chiếu.</p>
                    </div>

                    <div class="feature-box p-10 border-glass rounded-[2.5rem]">
                        <div class="w-12 h-12 bg-red-600/10 border border-red-600/20 rounded-xl flex items-center justify-center mb-6 text-red-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        </div>
                        <h3 class="font-cinema text-lg mb-4">VIP Lounge</h3>
                        <p class="text-gray-500 text-sm leading-loose uppercase font-bold tracking-tighter">Khu vực chờ riêng tư và dịch vụ bắp nước phục vụ tận ghế ngồi.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-32 max-w-7xl mx-auto px-6">
            <div class="text-center mb-16 space-y-4">
                <h2 class="font-cinema text-4xl italic">KHÔNG GIAN NGHỆ THUẬT</h2>
                <p class="text-gray-500 font-black uppercase text-[10px] tracking-[0.4em]">Where Art meets Technology</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 h-[600px]">
                <div class="lg:col-span-2 lg:row-span-2 rounded-3xl overflow-hidden border-glass relative group">
                    <img src="https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?q=80&w=2070" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-8">
                        <p class="font-cinema text-xl uppercase italic">The Main Hall</p>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden border-glass group">
                    <img src="https://images.unsplash.com/photo-1440404653325-ab127d49abc1?q=80&w=2070" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <div class="rounded-3xl overflow-hidden border-glass group">
                    <img src="https://images.unsplash.com/photo-1478720568477-152d9b164e26?q=80&w=2070" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <div class="lg:col-span-2 rounded-3xl overflow-hidden border-glass group relative">
                    <img src="https://images.unsplash.com/photo-1595769816263-9b910be24d5f?q=80&w=2070" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <p class="font-cinema text-sm italic tracking-widest uppercase">Dolby Room</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-32 bg-gradient-to-t from-red-950/20 to-transparent">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-12">
                    <div class="space-y-4">
                        <h3 class="font-cinema text-4xl">LIÊN HỆ VỚI <br> <span class="text-red-600 italic">CHÚNG TÔI</span></h3>
                        <p class="text-gray-400 font-medium">Hỗ trợ khách hàng và hợp tác truyền thông 24/7.</p>
                    </div>
                    
                    <div class="space-y-8">
                        <div class="flex items-start gap-6">
                            <div class="text-red-600 pt-1">📍</div>
                            <div>
                                <h4 class="font-bold text-xs uppercase tracking-widest text-gray-500 mb-2">Trụ sở chính</h4>
                                <p class="text-sm font-bold uppercase tracking-tighter">BHN Center, 257 Nguyễn Văn Quá, TP. HCM</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-6">
                            <div class="text-red-600 pt-1">📞</div>
                            <div>
                                <h4 class="font-bold text-xs uppercase tracking-widest text-gray-500 mb-2">Đường dây nóng</h4>
                                <p class="text-2xl font-cinema tracking-tighter italic">1900 6868</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-6">
                            <div class="text-red-600 pt-1">✉️</div>
                            <div>
                                <h4 class="font-bold text-xs uppercase tracking-widest text-gray-500 mb-2">Email</h4>
                                <p class="text-sm font-bold uppercase tracking-tighter">contact@cinemapro.vn</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white/[0.03] border-glass p-12 rounded-[3rem]">
                    <form action="#" class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-500">Họ và tên</label>
                            <input type="text" class="w-full bg-black/50 border-white/5 rounded-xl px-4 py-4 text-sm focus:border-red-600 focus:ring-0 transition">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-500">Địa chỉ Email</label>
                            <input type="email" class="w-full bg-black/50 border-white/5 rounded-xl px-4 py-4 text-sm focus:border-red-600 focus:ring-0 transition">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-500">Nội dung tin nhắn</label>
                            <textarea rows="4" class="w-full bg-black/50 border-white/5 rounded-xl px-4 py-4 text-sm focus:border-red-600 focus:ring-0 transition"></textarea>
                        </div>
                        <button class="w-full bg-white text-black py-5 rounded-xl font-black uppercase text-[10px] tracking-[0.3em] hover:bg-red-600 hover:text-white transition">Gửi thông tin ngay</button>
                    </form>
                </div>
            </div>
        </section>

        <footer class="py-12 border-t border-white/5 px-6">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 bg-red-600 rounded shadow-lg shadow-red-600/50"></div>
                    <span class="font-cinema text-sm tracking-widest uppercase">Cinema<span class="text-red-600 font-bold">Pro</span></span>
                </div>
                <p class="text-[9px] font-bold text-gray-600 uppercase tracking-[0.5em]">© 2026 Cinema Pro Vietnam. All Rights Reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="text-[9px] font-black text-gray-500 hover:text-white transition uppercase">Privacy</a>
                    <a href="#" class="text-[9px] font-black text-gray-500 hover:text-white transition uppercase">Terms</a>
                    <a href="#" class="text-[9px] font-black text-gray-500 hover:text-white transition uppercase">Careers</a>
                </div>
            </div>
        </footer>
    </div>
</x-app-layout>