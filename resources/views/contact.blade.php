<x-app-layout>

<div style="background: radial-gradient(circle at top right, #450a0a 0%, #000000 80%);
            min-height: 100vh;
            color: white;
            padding: 80px 20px;">

    <div class="max-w-6xl mx-auto bg-white/5 backdrop-blur-2xl rounded-[40px] shadow-[0_20px_50px_rgba(0,0,0,0.5)] p-8 md:p-16 border border-white/10 relative overflow-hidden">
        
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-red-600/20 rounded-full blur-[100px]"></div>
        
        <div class="relative z-10">
            <h1 class="text-5xl font-black mb-4 uppercase tracking-[0.2em] text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-red-800">
                Liên hỆ Cinema Pro
            </h1>
            <p class="text-gray-400 mb-12 font-medium tracking-wide">Chúng tôi luôn sẵn sàng lắng nghe ý kiến từ bạn</p>

            <div class="grid lg:grid-cols-5 gap-16">

                <div class="lg:col-span-2 space-y-10">
                    
                    <div class="group">
                        <div class="flex items-center gap-4 mb-3">
                            <div class="p-3 bg-red-500/10 rounded-2xl group-hover:bg-red-500/20 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <h2 class="text-xl font-bold text-white uppercase tracking-wider">Trụ sở chính</h2>
                        </div>
                        <p class="text-gray-400 leading-relaxed pl-14">
                            Cinema Pro Building, Tầng 2, BHN Center<br>
                            Số 257 Nguyễn Văn Quá, Đông Hưng Thuận 2, TP. HCM
                        </p>
                    </div>

                    <div class="group">
                        <div class="flex items-center gap-4 mb-3">
                            <div class="p-3 bg-red-500/10 rounded-2xl group-hover:bg-red-500/20 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </div>
                            <h2 class="text-xl font-bold text-white uppercase tracking-wider">Hỗ trợ khách hàng</h2>
                        </div>
                        <div class="text-gray-400 pl-14 space-y-1">
                            <p><span class="text-red-500 font-bold">Hotline:</span> 1900 6868</p>
                            <p><span class="text-red-500 font-bold">Email:</span> BHN@cinemapro.vn</p>
                            <p class="text-sm italic mt-2 text-gray-500">Hoạt động 8:00 - 22:00 (Kể cả Lễ/Tết)</p>
                        </div>
                    </div>

                    <div class="group">
                        <div class="flex items-center gap-4 mb-3">
                            <div class="p-3 bg-red-500/10 rounded-2xl group-hover:bg-red-500/20 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            </div>
                            <h2 class="text-xl font-bold text-white uppercase tracking-wider">Hợp tác quảng cáo</h2>
                        </div>
                        <p class="text-gray-400 pl-14 leading-relaxed">
                            <span class="text-red-500 font-bold">Phone:</span> 012 565 7777<br>
                            <span class="text-red-500 font-bold">Email:</span> ads@cinemapro.vn
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-3 bg-white/5 p-8 rounded-[32px] border border-white/5 shadow-inner">
                    <h2 class="text-2xl font-bold text-white mb-8">Gửi tin nhắn trực tiếp</h2>

                    @if(session('success'))
                    <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 text-green-400 rounded-xl text-center">
                        🎉 Gửi liên hệ thành công! Chúng tôi sẽ phản hồi sớm nhất.
                    </div>
                    @endif

                    <form action="/send-contact" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-bold text-gray-500 ml-2">Họ và tên</label>
                                <input type="text" name="name" required
                                    class="w-full p-4 rounded-2xl bg-black/40 border border-white/10 text-white focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none transition-all duration-300" 
                                    placeholder="Nguyễn Văn A">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-bold text-gray-500 ml-2">Địa chỉ Email</label>
                                <input type="email" name="email" required
                                    class="w-full p-4 rounded-2xl bg-black/40 border border-white/10 text-white focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none transition-all duration-300" 
                                    placeholder="example@gmail.com">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs uppercase tracking-widest font-bold text-gray-500 ml-2">Nội dung</label>
                            <textarea name="message" rows="5" required
                                class="w-full p-4 rounded-2xl bg-black/40 border border-white/10 text-white focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none transition-all duration-300" 
                                placeholder="Bạn cần hỗ trợ điều gì?"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-red-600 to-red-800 hover:from-red-500 hover:to-red-700 py-4 rounded-2xl font-black uppercase tracking-[0.2em] shadow-[0_10px_20px_rgba(220,38,38,0.3)] transition-all transform hover:-translate-y-1 active:scale-[0.98]">
                            Gửi yêu cầu ngay
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-12 text-center">
        <a href="javascript:history.back()" 
           class="inline-flex items-center gap-2 text-[11px] text-gray-500 hover:text-red-500 transition-all uppercase font-black tracking-[0.5em] group">
            <span class="group-hover:-translate-x-2 transition-transform duration-300">←</span> Quay lại rạp phim
        </a>
    </div>

</div>

</x-app-layout>