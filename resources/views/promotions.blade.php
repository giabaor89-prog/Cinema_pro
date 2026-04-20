<div style="background: #1d1c1c; min-height: 100vh; height: auto; background-attachment: fixed;">
<x-app-layout>

<div class="min-h-screen p-6 md:p-12 text-gray-100 relative overflow-hidden">
    
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-red-900/20 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-indigo-900/20 blur-[120px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">

        <div class="mb-16 text-center md:text-left">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-500/10 border border-red-500/20 mb-4">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                </span>
                <span class="text-xs font-bold uppercase tracking-widest text-red-500">Chương Trình Đặc Biệt</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-4 italic">
                CINEMA <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-400">PRO</span> PRIVILEGE
            </h1>
            <p class="text-gray-400 text-lg md:text-xl max-w-2xl font-light leading-relaxed">
                Nâng tầm trải nghiệm điện ảnh với những đặc quyền dành riêng cho hội viên Premium.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">

            <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-pink-600 rounded-[2.5rem] blur opacity-20 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative bg-[#0a0a0a] p-8 rounded-[2.5rem] border border-white/5 flex flex-col h-full transition-all duration-500 group-hover:bg-[#0f0f0f]">
                    
                    <div class="flex justify-between items-start mb-10">
                        <div class="text-4xl opacity-40 group-hover:opacity-100 transition-opacity">🎟️</div>
                        <span class="bg-red-600 text-[10px] font-black px-3 py-1 rounded-lg uppercase tracking-tighter">Limited Time</span>
                    </div>

                    <div class="flex-grow">
                        <h3 class="text-gray-500 text-sm font-bold uppercase tracking-[0.3em] mb-2">Member Only</h3>
                        <h2 class="text-4xl font-black text-white mb-4 group-hover:text-red-500 transition-colors">OFF 50% <br>ALL TICKETS</h2>
                        <p class="text-gray-500 font-medium leading-relaxed">Đặc quyền giảm nửa giá vé cho mọi suất chiếu IMAX và 4DX vào cuối tuần.</p>
                    </div>

                    <div class="mt-10 pt-6 border-t border-white/5 flex items-center justify-between">
                        <div class="text-xs text-gray-600 font-mono">CODE: PRO50</div>
                        <a href="#" class="h-12 w-12 rounded-full bg-white flex items-center justify-center text-black hover:bg-red-600 hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-600 to-orange-600 rounded-[2.5rem] blur opacity-20 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative bg-[#0a0a0a] p-8 rounded-[2.5rem] border border-white/5 flex flex-col h-full transition-all duration-500 group-hover:bg-[#0f0f0f]">
                    
                    <div class="flex justify-between items-start mb-10">
                        <div class="text-4xl opacity-40 group-hover:opacity-100 transition-opacity">🍿</div>
                        <span class="bg-yellow-600 text-[10px] font-black px-3 py-1 rounded-lg uppercase tracking-tighter">Popular</span>
                    </div>

                    <div class="flex-grow">
                        <h3 class="text-gray-500 text-sm font-bold uppercase tracking-[0.3em] mb-2">Gourmet Experience</h3>
                        <h2 class="text-4xl font-black text-white mb-4 group-hover:text-yellow-500 transition-colors">FREE GIANT <br>COMBO</h2>
                        <p class="text-gray-500 font-medium leading-relaxed">Tặng ngay combo Bắp rang bơ size Giant và 2 nước ngọt cho đơn hàng từ 2 vé.</p>
                    </div>

                    <div class="mt-10 pt-6 border-t border-white/5 flex items-center justify-between">
                        <div class="text-xs text-gray-600 font-mono">CODE: YUMMY</div>
                        <a href="#" class="h-12 w-12 rounded-full bg-white flex items-center justify-center text-black hover:bg-yellow-600 hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-blue-600 rounded-[2.5rem] blur opacity-20 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative bg-[#0a0a0a] p-8 rounded-[2.5rem] border border-white/5 flex flex-col h-full transition-all duration-500 group-hover:bg-[#0f0f0f]">
                    
                    <div class="flex justify-between items-start mb-10">
                        <div class="text-4xl opacity-40 group-hover:opacity-100 transition-opacity">⚡</div>
                        <span class="bg-purple-600 text-[10px] font-black px-3 py-1 rounded-lg uppercase tracking-tighter">Insane Price</span>
                    </div>

                    <div class="flex-grow">
                        <h3 class="text-gray-500 text-sm font-bold uppercase tracking-[0.3em] mb-2">Early Bird</h3>
                        <h2 class="text-4xl font-black text-white mb-4 group-hover:text-purple-500 transition-colors">ONLY 49K <br>MORNING</h2>
                        <p class="text-gray-500 font-medium leading-relaxed">Săn vé đồng giá 49k cho tất cả các phim 2D trong khung giờ trước 10:00 sáng.</p>
                    </div>

                    <div class="mt-10 pt-6 border-t border-white/5 flex items-center justify-between">
                        <div class="text-xs text-gray-600 font-mono">CODE: EARLY49</div>
                        <a href="#" class="h-12 w-12 rounded-full bg-white flex items-center justify-center text-black hover:bg-purple-600 hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-24 py-12 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-6 text-gray-600 text-sm font-bold tracking-widest uppercase">
            <div class="flex items-center gap-8">
                <span class="hover:text-red-600 cursor-pointer transition">TERMS & CONDITIONS</span>
                <span class="hover:text-red-600 cursor-pointer transition">PRIVACY POLICY</span>
            </div>
            <div>© 2026 CINEMA PRO GLOBAL. ALL RIGHTS RESERVED.</div>
        </div>

    </div>
</div>

</x-app-layout>
</div>