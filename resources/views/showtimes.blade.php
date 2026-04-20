<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Syncopate:wght@700&display=swap');

    body { 
        background-color: #020202; 
        color: white; 
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* Background mờ ảo */
    .ambient-glow {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: radial-gradient(circle at 10% 20%, #1a0505 0%, #020202 80%);
        z-index: -1;
    }

    /* Container của từng Phim */
    .movie-section {
        background: rgba(15, 15, 15, 0.6);
        backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 40px;
        transition: all 0.4s ease;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
    }

    .movie-section:hover {
        border-color: rgba(239, 68, 68, 0.3);
        box-shadow: 0 30px 60px rgba(0,0,0,0.5);
    }

    /* Ảnh Poster */
    .poster-box {
        width: 240px;
        height: 350px;
        flex-shrink: 0;
        position: relative;
    }

    .poster-img {
        width: 100%; height: 100%;
        object-fit: cover;
        border-radius: 25px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.6);
    }

    /* Khối rạp chiếu */
    .cinema-row {
        background: rgba(255, 255, 255, 0.02);
        border-radius: 20px;
        padding: 20px;
        border: 1px solid rgba(255, 255, 255, 0.03);
        margin-bottom: 12px;
        transition: 0.3s;
    }

    .cinema-row:hover {
        background: rgba(255, 255, 255, 0.05);
    }

    /* Nút chọn giờ */
    .time-chip {
        background: transparent;
        color: #ef4444;
        border: 1.5px solid #ef4444;
        padding: 8px 20px;
        border-radius: 12px;
        font-weight: 800;
        font-size: 14px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-block;
    }

    .time-chip:hover {
        background: #ef4444;
        color: white;
        box-shadow: 0 0 20px rgba(239, 68, 68, 0.4);
        transform: scale(1.05);
    }

    .movie-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -1px;
    }
</style>

<div class="ambient-glow"></div>

<div class="max-w-7xl mx-auto py-16 px-6">
    
    <div class="mb-16 flex justify-between items-end">
        <div>
            <p class="text-red-600 font-black tracking-[5px] uppercase text-[10px] mb-2">Cinema Pro Schedule</p>
            <h1 class="text-5xl md:text-6xl font-black text-white italic tracking-tighter">
                LỊCH CHIẾU <span class="text-red-600">HÔM NAY</span>
            </h1>
        </div>
        <div class="hidden md:block text-right">
            <span class="text-gray-500 font-bold">Hệ thống rạp toàn quốc</span>
            <div class="flex gap-2 mt-2">
                <div class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></div>
                <div class="w-2 h-2 rounded-full bg-red-600 animate-pulse delay-75"></div>
                <div class="w-2 h-2 rounded-full bg-red-600 animate-pulse delay-150"></div>
            </div>
        </div>
    </div>

    @if($groupedShowtimes->isEmpty())
        <div class="text-center py-20 bg-white/5 rounded-3xl border border-dashed border-white/10">
            <i class="fa-solid fa-film text-5xl text-gray-700 mb-4"></i>
            <p class="text-gray-500 font-bold uppercase tracking-widest">Hiện chưa có lịch chiếu nào</p>
        </div>
    @else
        @foreach($groupedShowtimes as $movieTitle => $sessions)
        <div class="movie-section p-6 md:p-10">
            <div class="flex flex-col lg:flex-row gap-10">
                
                <div class="lg:w-1/4">
                    <div class="poster-box mx-auto lg:mx-0">
                        <img src="{{ asset('images/' . $sessions->first()->image) }}" class="poster-img" alt="{{ $movieTitle }}">
                        <div class="absolute top-4 left-4 bg-red-600 text-white text-[10px] font-black px-3 py-1 rounded-full shadow-xl">
                            PREMIUM
                        </div>
                    </div>
                    
                    <div class="mt-6 text-center lg:text-left">
                        <h2 class="movie-title text-3xl font-black text-white leading-tight mb-2">{{ $movieTitle }}</h2>
                        <div class="flex items-center justify-center lg:justify-start gap-3 mb-4 text-gray-400 text-sm">
                            <span class="flex items-center gap-1"><i class="fa-regular fa-clock"></i> 120p</span>
                            <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
                            <span class="text-red-500 font-bold">T18</span>
                        </div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-widest">Giá vé cố định: <span class="text-white">79.000 VNĐ</span></p>
                    </div>
                </div>

                <div class="lg:w-3/4">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="h-[1px] flex-1 bg-white/10"></div>
                        <span class="text-[10px] font-black text-gray-600 uppercase tracking-[4px]">Danh sách rạp chiếu</span>
                        <div class="h-[1px] flex-1 bg-white/10"></div>
                    </div>

                    <div class="grid gap-4">
                        {{-- Nhóm tiếp theo theo rạp bên trong phim --}}
                        @foreach($sessions->groupBy('cinema_name') as $cinemaName => $times)
                        <div class="cinema-row">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center border border-white/10">
                                        <i class="fa-solid fa-location-dot text-red-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-extrabold text-white">{{ $cinemaName }}</h4>
                                        <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">Standard Cinema • 2D Digital</p>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-3">
                                    @foreach($times as $t)
                                    <a href="{{ route('movie.detail', $t->movie_id) }}" class="time-chip">
                                        {{ \Carbon\Carbon::parse($t->start_time)->format('H:i') }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-8 p-4 bg-red-600/5 border border-red-600/10 rounded-2xl flex items-center gap-4">
                        <i class="fa-solid fa-circle-info text-red-600"></i>
                        <p class="text-xs text-gray-400 font-medium">Lưu ý: Vui lòng có mặt tại rạp trước 15 phút để nhận vé đã đặt trực tuyến.</p>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    @endif

    <div class="mt-20 text-center pb-10">
        <div class="inline-block px-10 py-4 border-t border-white/5">
            <p class="text-[9px] font-black uppercase tracking-[15px] text-white/20">Cinema Pro System • 2026</p>
        </div>
    </div>

</div>
</x-app-layout>