<div style="background: radial-gradient(circle at top right, #3f0e0e 0%, #000000 70%); 
            min-height: 100vh; 
            background-attachment: fixed;">
<x-app-layout>
<style>
    body { margin: 0; }

    /* Poster */
    .poster-container {
        width: 220px;
        aspect-ratio: 2/3;
        position: relative;
        overflow: hidden;
        border-radius: 1.5rem;
        border: 1px solid rgba(255,255,255,0.15);
        flex-shrink: 0;
    }

    .poster-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .group:hover .poster-image {
        transform: scale(1.05);
    }

    /* Vé */
    .ticket-notch-top,
    .ticket-notch-bottom {
        position: absolute;
        left: -18px;
        width: 36px;
        height: 36px;
        background: #120404;
        border-radius: 50%;
        z-index: 10;
    }

    .ticket-notch-top { top: -18px; }
    .ticket-notch-bottom { bottom: -18px; }

    .booking-code {
        letter-spacing: 0.3em;
    }

    /* 🔥 TEXT EFFECT */
    .text-3d {
        text-shadow:
            0 1px 0 rgba(0,0,0,0.8),
            0 3px 6px rgba(0,0,0,0.6),
            0 8px 20px rgba(0,0,0,0.6);
        transform: translateY(-2px);
    }

    .text-soft {
        text-shadow: 0 2px 6px rgba(0,0,0,0.6);
    }

    .text-glow-red {
        text-shadow:
            0 0 6px rgba(220,38,38,0.7),
            0 0 12px rgba(220,38,38,0.5);
    }

    /* tạo cảm giác chữ tách khỏi nền */
    .card-content {
        transform: translateX(6px);
    }
</style>

<div style="background: radial-gradient(circle at top right, #230909 0%, #120404 70%);
            min-height: 100vh; padding: 50px 20px; color: white;">

    <div class="max-w-6xl mx-auto px-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-16 flex-wrap gap-6">
            <h1 class="text-5xl font-black uppercase italic text-3d">
                Lịch sử <span class="text-red-600 text-glow-red">Cinema Pro</span>
            </h1>

            <a href="javascript:history.back()"
               class="text-sm text-gray-300 hover:text-white
                px-5 py-2 border border-white/10 rounded-xl text-soft">
                ← Quay lại
            </a>
        </div>

        <!-- LIST -->
        <div class="space-y-32">
            @foreach($tickets as $ticket)

            <div class="group relative max-w-5xl mx-auto">

                <div class="flex flex-col lg:flex-row items-stretch
                            bg-[#140707]/80 backdrop-blur-xl
                            rounded-3xl border border-white/10 overflow-hidden shadow-xl">

                    <!-- POSTER -->
                    <div class="lg:w-[28%] flex justify-center items-center p-8 bg-black/40">
                        <div class="poster-container">

                            @if(!empty($ticket->movie_image))
                                <img src="{{ asset('images/' . $ticket->movie_image) }}"
                                     class="poster-image">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-black text-white">
                                    🎬
                                </div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        </div>
                    </div>

                    <!-- INFO -->
                    <div class="lg:w-[47%] p-8 pr-14 flex flex-col justify-center card-content">

                        <h2 class="text-3xl font-bold mb-6 uppercase text-white text-3d">
                            {{ $ticket->movie_title }}
                        </h2>

                        <div class="grid grid-cols-2 gap-6 mb-6">

                            <div>
                                <p class="text-gray-400 text-xs text-soft">Ghế</p>
                                <p class="text-xl font-bold text-3d">{{ $ticket->seats }}</p>
                            </div>

                            <div>
                                <p class="text-gray-400 text-xs text-soft">Trạng thái</p>
                                @if($ticket->status == 'booked')
                                    <span class="text-yellow-400 text-sm text-soft">● Đã Đặt </span>
                                @else
                                    <span class="text-green-400 text-sm text-soft">✓ Đã sử dụng</span>
                                @endif
                            </div>

                        </div>

                        <div class="border-y border-white/10 py-4 space-y-3">

                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm text-soft">Thanh toán</span>
                                <span class="text-xl font-bold text-white text-3d">
                                    {{ number_format($ticket->total) }} VND
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm text-soft">Rạp</span>
                                <span class="text-3d">{{ $ticket->cinema_name ?? '---' }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm text-soft">Suất chiếu</span>
                                <span class="text-3d">
                                    {{ isset($ticket->showtime_start) ? \Carbon\Carbon::parse($ticket->showtime_start)->format('d/m/Y H:i') : '—' }}
                                </span>
                            </div>

                        </div>

                    </div>

                    <!-- QR -->
                    <div class="lg:w-[25%] flex flex-col items-center justify-center
                                p-8 text-center border-l-2 border-dashed border-white/20
                                relative ml-auto">

                        <div class="hidden lg:block ticket-notch-top"></div>
                        <div class="hidden lg:block ticket-notch-bottom"></div>

                        <div class="bg-white p-3 rounded-xl shadow-lg">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ url('/ticket/check/'.$ticket->booking_code) }}"
                                 class="w-28 h-28">
                        </div>

                        <p class="text-gray-400 text-xs mt-4 text-soft">Mã vé</p>
                        <p class="booking-code text-red-500 font-bold mt-1 text-glow-red">
                            {{ $ticket->booking_code }}
                        </p>

                    </div>

                </div>
            </div>

            @endforeach
        </div>

        <!-- FOOTER -->
        <div class="text-center mt-20 text-gray-500 text-sm text-soft">
            Cinema Pro © 2026 🎬
        </div>

    </div>
</div>
</x-app-layout>