<x-app-layout>
    <x-slot name="header">
        </x-slot>

    <style>
        /* Giữ lại các style đặc thù cho Dashboard */
        .admin-sidebar {
            background: rgba(15, 15, 15, 0.8);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            border-color: rgba(220, 38, 38, 0.4);
            background: rgba(255, 255, 255, 0.04);
        }
        .status-pill {
            padding: 4px 12px;
            border-radius: 99px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .btn-action { transition: all 0.2s; }
        .btn-action:hover { transform: translateY(-2px); }
    </style>

    <div class="flex min-h-screen bg-[#050505] text-[#e5e5e5] font-['Plus_Jakarta_Sans']">
        @if(!auth()->check() || !auth()->user()->isAdmin())
            {{-- Màn hình chặn truy cập --}}
            <div class="flex-1 flex items-center justify-center p-6">
                <div class="glass-card p-12 rounded-3xl text-center max-w-md">
                    <div class="w-20 h-20 bg-red-600/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-11V7a4 4 0 118 0v4"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-2">Truy cập bị chặn</h2>
                    <p class="text-gray-400">Bạn không có quyền quản trị viên để vào khu vực này.</p>
                    <a href="/" class="inline-block mt-8 text-red-500 font-bold hover:underline">Quay về trang chủ</a>
                </div>
            </div>
        @else
            {{-- Sidebar --}}
            <aside class="admin-sidebar w-72 hidden lg:flex flex-col sticky top-0 h-screen">
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-10">
                        <div class="w-8 h-8 bg-red-600 rounded shadow-[0_0_15px_rgba(229,9,20,0.4)]"></div>
                        <span class="font-bold text-xl tracking-tighter text-white">CINEMA<span class="text-red-600">PRO</span></span>
                    </div>
                    
                    <nav class="space-y-2">
                        <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-xl bg-red-600 text-white font-bold transition-all shadow-lg shadow-red-600/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                            Tổng quan
                        </a>
                        <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-xl text-gray-400 hover:bg-white/5 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Nhân viên
                        </a>
                        <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-xl text-gray-400 hover:bg-white/5 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                            Quản lý vé
                        </a>
                    </nav>
                </div>
                <div class="mt-auto p-8 border-t border-white/5">
                    <a href="{{ route('movies') }}" class="flex items-center gap-4 text-gray-500 hover:text-white transition font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Về Trang Chủ
                    </a>
                </div>
            </aside>

            {{-- Main Content --}}
            <main class="flex-1 p-6 lg:p-12 overflow-y-auto bg-gradient-to-br from-[#050505] via-[#0a0a0a] to-[#050505]">
                <header class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
                    <div>
                        <h1 class="text-4xl font-bold text-white tracking-tight">Hệ thống quản lý</h1>
                        <p class="text-gray-500 mt-2 italic font-light">Chào mừng trở lại, <span class="text-white font-semibold">{{ auth()->user()->name }}</span>.</p>
                    </div>
                    <div class="flex gap-4">
                        <button class="px-6 py-3 glass-card rounded-xl font-bold text-sm hover:bg-white/10 active:scale-95 transition-all">Xuất báo cáo</button>
                    </div>
                </header>

                {{-- Stats Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="glass-card p-8 rounded-3xl relative overflow-hidden group">
                        <div class="absolute right-[-10px] bottom-[-10px] opacity-5 group-hover:opacity-10 group-hover:scale-110 transition duration-500">
                            <svg class="w-32 h-32 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                        </div>
                        <p class="text-gray-500 uppercase text-xs font-bold tracking-widest">Vé hôm nay</p>
                        <h3 class="text-4xl font-bold text-white mt-2">1,284</h3>
                        <p class="text-green-500 text-xs mt-4 font-bold flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                            +12% so với hôm qua
                        </p>
                    </div>

                    <div class="glass-card p-8 rounded-3xl">
                        <p class="text-gray-500 uppercase text-xs font-bold tracking-widest">Doanh thu tháng</p>
                        <h3 class="text-4xl font-bold text-white mt-2">420.5M</h3>
                        <p class="text-red-500 text-xs mt-4 font-bold flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            -2% mục tiêu
                        </p>
                    </div>

                    <div class="glass-card p-8 rounded-3xl border-red-600/20 bg-red-600/5">
                        <p class="text-red-500 uppercase text-xs font-bold tracking-widest text-opacity-80">Nhân viên trực</p>
                        <h3 class="text-4xl font-bold text-white mt-2">12 <span class="text-xl text-gray-600">/ 15</span></h3>
                        <p class="text-gray-500 text-xs mt-4 font-bold italic underline cursor-pointer hover:text-red-500 transition">Xem lịch ca trực</p>
                    </div>
                </div>

                {{-- Tables Section --}}
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-10">
                    <div class="glass-card rounded-[32px] overflow-hidden">
                         @include('admin.partials.staff')
                    </div>

                    <div class="glass-card rounded-[32px] p-8">
                        <div class="flex justify-between items-center mb-8">
                            <h3 class="text-xl font-bold text-white">Giao dịch vé mới nhất</h3>
                            <a href="#" class="text-gray-500 text-xs hover:text-red-500 transition underline decoration-red-600/0 hover:decoration-red-600/50">Xem tất cả</a>
                        </div>
                        <div class="space-y-4">
                            @foreach(range(101,105) as $code)
                            <div class="flex items-center justify-between p-4 rounded-2xl bg-white/[0.01] border border-white/5 hover:border-red-600/30 hover:bg-white/[0.03] transition-all group">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-red-600/10 flex items-center justify-center text-red-600 group-hover:scale-110 transition">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 100-4V6z"></path></svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-white group-hover:text-red-500 transition">BK-{{ $code }}</div>
                                        <div class="text-[10px] text-gray-500 font-medium">Khách hàng {{ $code }} • Avengers: End Game</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="status-pill bg-green-500/10 text-green-500 border border-green-500/20">Đã thanh toán</span>
                                    <div class="text-[10px] text-gray-600 mt-1 font-semibold tracking-tighter">19:30 | Phòng 04</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </main>
        @endif
    </div>
</x-app-layout>