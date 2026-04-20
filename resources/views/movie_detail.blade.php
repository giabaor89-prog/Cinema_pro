<x-app-layout>
    {{-- Custom CSS cho ghế và hiệu ứng --}}
    <style>
        .cinema-container {
            background: radial-gradient(circle at 20% 20%, #2b0909 0%, #000000 80%);
            background-attachment: fixed;
            min-height: 100vh;
        }
        .seat-btn {
            width: 32px;
            height: 30px;
            border-radius: 6px 6px 2px 2px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 10px;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .seat-btn.available {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #666;
        }
        .seat-btn.available:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.4);
            border-color: #f87171;
        }
        .seat-btn.selected {
            background: linear-gradient(135deg, #ef4444 0%, #7f1d1d 100%);
            color: white;
            border-color: #fca5a5;
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.5);
        }
        .seat-btn.booked {
            background: #1f2937;
            opacity: 0.15;
            cursor: not-allowed;
            color: transparent;
        }

        /* --- PHẦN CHỈNH SỬA MÀN HÌNH --- */
        .screen-wrapper {
            margin-bottom: 80px; /* Tách màn hình ra khỏi ghế */
            text-align: center;
        }
        .imax-screen {
            height: 5px;
            background: #fff;
            width: 80%;
            margin: 0 auto;
            border-radius: 50% / 100% 100% 0 0;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.4);
        }
        .screen-text {
            display: block;
            margin-top: 15px;
            color: rgba(255, 255, 255, 0.2);
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 2.5em; /* Cách chữ M À N H Ì N H */
            text-indent: 2.5em;
            text-transform: uppercase;
        }
        /* ------------------------------ */

    </style>

    <div class="cinema-container text-white pb-20">
        <div class="max-w-7xl mx-auto px-4 py-12">
            
            {{-- Alert Section --}}
            @if(session('success'))
                <div class="bg-green-500/20 border border-green-500/50 text-green-400 p-4 rounded-2xl mb-8 backdrop-blur-md flex items-center gap-3">
                    <span class="text-xl">✅</span>
                    <div>
                        <p class="font-black leading-none">VÉ ĐÃ ĐẶT THÀNH CÔNG!</p>
                        <a href="/my-tickets" class="text-xs underline opacity-80 hover:opacity-100">Xem vé của tôi ngay</a>
                    </div>
                </div>
            @endif

            {{-- Main Grid --}}
            <div class="bg-black/40 backdrop-blur-xl rounded-[3rem] border border-white/10 overflow-hidden shadow-2xl">
                <div class="grid grid-cols-1 lg:grid-cols-12">
                    
                    {{-- Left Sidebar: Movie Info --}}
                    <div class="lg:col-span-3 p-8 bg-white/5 border-r border-white/5">
                        <div class="sticky top-8 space-y-6">
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-white/10 group">
                                <img src="{{ asset('images/' . $movie->image) }}" class="w-full object-cover group-hover:scale-105 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent"></div>
                            </div>
                            
                            <div>
                                <h1 class="text-3xl font-black italic uppercase leading-tight tracking-tighter text-red-500 mb-2">
                                    {{ $movie->title }}
                                </h1>
                                <div class="flex gap-2 mb-4">
                                    <span class="text-[9px] font-black px-2 py-0.5 bg-red-600/20 border border-red-600/30 text-red-500 rounded uppercase">Action</span>
                                    <span class="text-[9px] font-black px-2 py-0.5 bg-white/10 text-gray-400 rounded uppercase">18+</span>
                                </div>
                                <p class="text-gray-500 text-xs italic leading-relaxed line-clamp-4">
                                    {{ $movie->description ?? 'Chào mừng bạn đến với trải nghiệm điện ảnh điện ảnh IMAX đỉnh cao tại Cinema Pro.' }}
                                </p>
                            </div>

                            <div class="pt-6 border-t border-white/5 space-y-3">
                                <div class="flex justify-between items-center text-xs">
                                    <span class="text-gray-500 font-bold uppercase tracking-widest">Thời lượng</span>
                                    <span class="text-white font-mono">{{ $movie->duration }} MIN</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Content: Booking --}}
                    <div class="lg:col-span-9 p-8 md:p-12" x-data="{ selectedCinema: null, selectedShowtime: null }">
                        
                        {{-- 01. Chọn Rạp --}}
                        <section class="mb-12">
                            <h2 class="text-[10px] font-black uppercase tracking-[0.4em] text-gray-500 mb-6 flex items-center gap-3">
                                <span class="w-8 h-px bg-red-600"></span> 01. Chọn cụm rạp
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                @foreach($cinemas as $cinema)
                                    <button @click="selectedCinema = {{ $cinema->id }}"
                                        :class="selectedCinema === {{ $cinema->id }} ? 'border-red-600 bg-red-600/10' : 'border-white/5 bg-white/5 hover:bg-white/10'"
                                        class="p-4 rounded-2xl border-2 flex items-center gap-4 transition-all group">
                                        <div class="w-10 h-10 rounded-xl bg-black/40 flex items-center justify-center text-xl group-hover:scale-110 transition">🏢</div>
                                        <span class="font-black text-sm uppercase tracking-tight text-left">{{ $cinema->name }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </section>

                        {{-- 02. Suất Chiếu --}}
                        <section class="mb-12">
                            <h2 class="text-[10px] font-black uppercase tracking-[0.4em] text-gray-500 mb-6 flex items-center gap-3">
                                <span class="w-8 h-px bg-red-600"></span> 02. Chọn giờ chiếu
                            </h2>
                            <div class="flex flex-wrap gap-3">
                                @foreach($showtimes as $st)
                                    <button x-show="selectedCinema === null || selectedCinema === {{ $st->cinema_id }}"
                                        @click="selectedShowtime = {{ $st->id }}"
                                        :class="selectedShowtime === {{ $st->id }} ? 'bg-white text-black scale-105' : 'bg-white/5 text-gray-400'"
                                        class="px-6 py-3 rounded-xl font-black transition-all border border-white/10">
                                        <div class="text-xl leading-none">{{ $st->start_time }}</div>
                                        <div class="text-[8px] uppercase tracking-widest mt-1 opacity-60">Gold Class</div>
                                    </button>
                                @endforeach
                            </div>
                        </section>

                        {{-- 03. Ghế --}}
                        <section class="bg-black/60 rounded-[2.5rem] p-8 md:p-16 border border-white/5">
                            
                            {{-- PHẦN MÀN HÌNH ĐÃ TÁCH --}}
                            <div class="screen-wrapper">
                                <div class="imax-screen"></div>
                                <span class="screen-text">MÀNHÌNH</span>
                            </div>
                            
                            <!-- //chọn ghế  -->
                            <div class="overflow-x-auto pb-8 custom-scrollbar">
                                <div class="flex flex-col gap-3 items-center min-w-[500px]">
                                    @for($row = 'A'; $row <= 'G'; $row++)
                                        <div class="flex items-center gap-4">
                                            <span class="w-4 text-[9px] font-black text-gray-700">{{ $row }}</span>
                                            <div class="flex gap-2">
                                                @for($i = 1; $i <= 10; $i++)
                                                    <button class="seat-btn available"
                                                        data-seat="{{ $row }}{{ $i }}">
                                                        {{ $i }}
                                                    </button>
                                                @endfor
                                            </div>
                                            <span class="w-4 text-[9px] font-black text-gray-700">{{ $row }}</span>
                                        </div>
                                        @if($row == 'D') <div class="h-8"></div> @endif
                                    @endfor
                                </div>
                            </div>

                            {{-- Chú thích --}}
                            <div class="flex justify-center gap-6 mt-10">
                                <div class="flex items-center gap-2 text-[9px] font-bold text-gray-500 uppercase"><div class="w-3 h-3 bg-white/10 rounded-sm"></div> Trống</div>
                                <div class="flex items-center gap-2 text-[9px] font-bold text-red-500 uppercase"><div class="w-3 h-3 bg-red-600 rounded-sm shadow-red-500/50 shadow"></div> Đang chọn</div>
                            </div>
                        </section>

                        {{-- Booking Footer --}}
                        <div class="mt-8 flex flex-col md:flex-row justify-between items-center bg-gradient-to-r from-red-950/20 to-transparent p-6 rounded-3xl border border-red-900/10 gap-6">
                            <div class="flex gap-10">
                                <div>
                                    <div class="text-[9px] text-gray-500 font-black uppercase tracking-widest mb-1">Ghế</div>
                                    <div id="selected-seats-display" class="text-xl font-black text-white italic tracking-tighter">CHƯA CHỌN</div>
                                </div>
                                <div>
                                    <div class="text-[9px] text-gray-500 font-black uppercase tracking-widest mb-1">Tổng tiền</div>
                                    <div class="text-2xl font-black text-red-500"><span id="total-price-display">0</span><span class="text-xs ml-1">VND</span></div>
                                </div>
                            </div>

                            <form action="/booking-confirm" method="POST" id="bookingForm">
                                @csrf
                                <input type="hidden" name="cinema_id" x-model="selectedCinema">
                                <input type="hidden" name="showtime_id" x-model="selectedShowtime">
                                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                <input type="hidden" name="selected_seats" id="hidden-seats">
                                <input type="hidden" name="total_price" id="hidden-price">
                                
                                <button type="submit" class="bg-white text-black hover:bg-red-600 hover:text-white px-10 py-4 rounded-2xl font-black uppercase tracking-widest transition-all transform hover:-translate-y-1 active:scale-95 shadow-xl">
                                    Thanh toán ngay →
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="/" class="text-[10px] text-gray-600 hover:text-red-500 transition-colors uppercase font-black tracking-[0.5em]">← Quay lại trang chủ</a>
            </div>
        </div>
    </div>

    <script>
        let selectedSeats = [];
        const PRICE = 79000;

        document.querySelectorAll('.seat-btn.available').forEach(btn => {
            btn.addEventListener('click', function() {
                const seat = this.dataset.seat;
                if (selectedSeats.includes(seat)) {
                    selectedSeats = selectedSeats.filter(s => s !== seat);
                    this.classList.remove('selected');
                } else {
                    selectedSeats.push(seat);
                    this.classList.add('selected');
                }
                
                document.getElementById('selected-seats-display').innerText = selectedSeats.length ? selectedSeats.join(', ') : 'CHƯA CHỌN';
                document.getElementById('total-price-display').innerText = (selectedSeats.length * PRICE).toLocaleString('vi-VN');
                document.getElementById('hidden-seats').value = selectedSeats.join(',');
                document.getElementById('hidden-price').value = selectedSeats.length * PRICE;
            });
        });

        document.getElementById('bookingForm').onsubmit = function(e) {
            if (selectedSeats.length === 0) {
                e.preventDefault();
                alert('Vui lòng chọn ghế trước khi tiếp tục!');
            }
        };
    </script>
</x-app-layout>