<x-app-layout>
    {{-- Main Wrapper: Giữ nguyên background radial và thêm font Inter --}}
    <div style="background: radial-gradient(circle at top right, #3f0e0e 0%, #000000 70%); 
                min-height: 100vh; height: auto; background-attachment: fixed; color: white; font-family: 'Inter', sans-serif;">

        <div class="max-w-6xl mx-auto p-4 md:p-8 relative z-10 pt-10">
            
            <div class="mb-6">
                <a href="javascript:history.back()" class="text-[10px] text-gray-500 hover:text-red-500 transition-colors uppercase font-black tracking-[0.4em]">
                    ← Quay lại
                </a>
            </div>

            <div class="bg-gray-900/40 backdrop-blur-3xl rounded-[3rem] shadow-2xl border border-white/5 overflow-hidden">
                
                <div class="grid grid-cols-1 md:grid-cols-12 gap-0">

                    <div class="md:col-span-4 p-8 md:p-12 flex flex-col items-center bg-black/20 border-b md:border-b-0 md:border-r border-dashed border-white/10 relative">
                        {{-- Decor lỗ vé đặc trưng của Cinema Pro --}}
                        <div class="hidden md:block absolute -right-4 top-1/2 -translate-y-1/2 w-8 h-8 bg-[#0a0202] rounded-full z-20 shadow-inner"></div>

                        <div class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-b from-red-600 to-transparent rounded-2xl blur opacity-25 group-hover:opacity-60 transition duration-500"></div>
                            <div class="relative w-[220px] h-[330px] overflow-hidden rounded-2xl shadow-2xl">
                                <img src="{{ asset('images/' . $movie->image) }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                            </div>
                        </div>

                        <div class="mt-8 space-y-3 w-full">
                            <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-widest text-gray-400 border-b border-white/5 pb-2">
                                <span>Thể loại</span>
                                <span class="text-white">Hành động</span>
                            </div>
                            <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-widest text-gray-400 border-b border-white/5 pb-2">
                                <span>Độ tuổi</span>
                                <span class="text-red-500">16+</span>
                            </div>
                            <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-widest text-gray-400 border-b border-white/5 pb-2">
                                <span>Thời lượng</span>
                                <span class="text-white">{{ $movie->duration }} Phút</span>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-8 p-8 md:p-14 flex flex-col justify-between bg-gradient-to-br from-transparent to-red-900/5">
                        
                        <div>
                            <h1 class="text-4xl md:text-5xl font-black mb-6 tracking-tighter uppercase italic leading-none text-transparent bg-clip-text bg-gradient-to-r from-white via-white to-gray-500">
                                {{ $movie->title }}
                            </h1>

                            <h2 class="text-xs font-black mb-4 flex items-center gap-3 tracking-[0.4em] uppercase text-red-600">
                                <span class="w-8 h-px bg-red-600"></span> 📖 Nội dung phim
                            </h2>

                            <p class="text-gray-400 text-sm md:text-base leading-relaxed font-medium italic">
                                {{ $movie->description ?? 'Chưa có mô tả chi tiết cho bộ phim này.' }}
                            </p>
                        </div>

                        <div class="mt-10">
                            <a href="{{ route('movie.detail', $movie->id) }}" 
                               class="group relative inline-flex items-center justify-center px-10 py-4 font-black uppercase tracking-[0.2em] text-white bg-red-600 rounded-2xl overflow-hidden shadow-[0_10px_30px_rgba(220,38,38,0.3)] transition-all hover:bg-red-500 active:scale-95">
                                <span class="relative z-10 flex items-center gap-2">
                                    🎟 Xem suất chiếu <span class="text-xl group-hover:translate-x-1 transition-transform">→</span>
                                </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 
                                to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
                            </a>
                        </div>
                    </div>
                </div> <div class="p-8 md:p-14 bg-black/40 border-t border-white/5">
                    <h2 class="text-xs font-black mb-8 tracking-[0.4em] uppercase text-gray-500 flex items-center gap-4">
                        <span class="w-12 h-px bg-gray-800"></span> ▶ Official Trailer
                    </h2>

                    @if($movie->trailer)
    <div class="w-full max-w-6xl mx-auto mt-10">
        
        <div class="relative group">

            <!-- Glow background -->
            <div class="absolute inset-0 bg-red-500/10 blur-3xl opacity-40 
            group-hover:opacity-80 transition duration-700 rounded-3xl"></div>

            <!-- Video container -->
            <div class="relative w-full aspect-[16/6] rounded-3xl overflow-hidden 
            shadow-2xl bg-black border border-white/10">

                <iframe 
                    class="w-full h-full"
                    src="{{ $movie->trailer }}"
                    frameborder="0"
                    allow="autoplay; encrypted-media; fullscreen"
                    allowfullscreen>
                </iframe>

            </div>

        </div>
    </div>
@else
    <div class="py-20 text-center border border-white/10 rounded-3xl bg-white/5 mt-10">
        <p class="text-gray-500 font-semibold uppercase tracking-wider text-sm italic">
            Trailer đang được cập nhật...
        </p>
    </div>
@endif
                </div>

            </div> <p class="mt-8 text-center text-[10px] text-gray-700 uppercase tracking-widest italic">
                Cinema Pro Experience — Chúc bạn xem phim vui vẻ
            </p>

        </div>
        <div class="h-20"></div>
    </div>

    {{-- Keyframes cho hiệu ứng ánh sáng chạy qua nút --}}
    <style>
        @keyframes shimmer {
            100% { transform: translateX(100%); }
        }
    </style>
</x-app-layout>