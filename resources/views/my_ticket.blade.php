<x-app-layout>
    <div style="background: radial-gradient(circle at top right, #3f0e0e 0%, #000000 70%); 
                min-height: 100vh; height: auto; background-attachment: fixed; color: white; font-family: 'Inter', sans-serif;">

        <div class="max-w-7xl mx-auto p-4 md:p-10 relative z-10 pt-10">
            
            <div class="bg-gray-900/40 backdrop-blur-3xl shadow-2xl rounded-[3rem] p-8 md:p-12 
                        border border-white/5 relative overflow-hidden">
                
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-red-600/10 rounded-full blur-[100px] pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 relative z-10">

                    <div class="lg:col-span-4 border-b lg:border-b-0 lg:border-r border-dashed border-white/10 pb-8 lg:pb-0 lg:pr-10 relative">
                        {{-- Decor lỗ vé --}}
                        <div class="hidden lg:block absolute -right-4 top-1/2 -translate-y-1/2 w-8 h-8 bg-[#0a0202] rounded-full z-20 shadow-inner"></div>

                        <h1 class="text-3xl font-black mb-12 tracking-tighter uppercase italic flex items-center gap-3">
                            <span class="w-2 h-8 bg-red-600 rounded-full shadow-[0_0_15px_rgba(220,38,38,0.5)]"></span> 
                            🎟️ Vé của tôi
                        </h1>

                        <div class="space-y-8 pl-2">
                            <div>
                                <p class="text-[10px] text-gray-500 uppercase font-black tracking-[0.2em] mb-2">Mã đặt vé</p>
                                <p class="text-2xl font-mono text-red-500 font-bold tracking-widest bg-red-500/5 py-2 px-4 
                                rounded-lg border border-red-500/20 inline-block">
                                  {{ $booking_code }}
                                </p>
                            </div>

                            <div>
                                <p class="text-[10px] text-gray-500 uppercase font-black tracking-[0.2em] mb-2">Phim</p>
                                <p class="text-3xl font-black leading-none uppercase italic text-transparent bg-clip-text 
                                bg-gradient-to-r from-white to-gray-500">
                                    {{ $movie->title }}
                                </p>
                            </div>

                            <div class="grid grid-cols-2 gap-6 pt-4 border-t border-white/5">
                                <div>
                                    <p class="text-[10px] text-gray-500 uppercase font-black tracking-[0.2em] mb-1">Ghế ngồi</p>
                                    <p class="text-xl font-bold text-white italic">{{ $seats }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-500 uppercase font-black tracking-[0.2em] mb-1">Trạng thái</p>
                                    <p class="text-xs font-bold text-yellow-500 uppercase tracking-widest flex items-center gap-2">
                                        <span class="w-2 h-2 bg-yellow-500 rounded-full animate-pulse"></span> Chờ thanh toán
                                    </p>
                                </div>
                            </div>
                            
                            <div class="pt-6 border-t border-white/5">
                                <p class="text-[10px] text-gray-500 uppercase font-black tracking-[0.2em] mb-1">Rạp</p>
                                <p class="text-lg font-bold">{{ $cinema->name ?? '—' }}</p>

                                <p class="text-[10px] text-gray-500 uppercase font-black tracking-[0.2em] mb-1 mt-4">Suất chiếu</p>
                                <p class="text-lg font-bold">{{ isset($showtime->start_time) ? \Carbon\Carbon::parse($showtime->start_time)->format('d/m/Y H:i') : '—' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-10">
                        
                        <div class="space-y-8">
                            <h2 class="text-[10px] font-black tracking-[0.4em] uppercase text-gray-400 flex items-center gap-3">
                                01. Thông tin nhận vé
                            </h2>

                            <div class="space-y-6">
                                <div class="group">
                                    <label class="text-[10px] text-gray-400 uppercase font-black ml-1 tracking-widest transition-colors group-focus-within:text-red-500">Email nhận vé</label>
                                     <input type="email" id="email" name="email_visible" placeholder="cinema.pro@example.com"
                                         value="{{ auth()->user()->email ?? '' }}"
                                         class="w-full mt-2 p-4 rounded-2xl bg-white/5 text-white border border-white/10 focus:border-red-600 focus:ring-0 transition-all placeholder:text-gray-600 shadow-inner outline-none">
                                </div>

                                <div class="group">
                                    <label class="text-[10px] text-gray-400 uppercase font-black ml-1 tracking-widest transition-colors group-focus-within:text-red-500">Số điện thoại</label>
                                    <input type="text" id="phone" placeholder="0909 ••• •••"
                                           class="w-full mt-2 p-4 rounded-2xl bg-white/5 text-white border border-white/10 focus:border-red-600 focus:ring-0 transition-all placeholder:text-gray-600 shadow-inner outline-none">
                                </div>
                            </div>

                            <div class="p-4 rounded-2xl bg-red-600/5 border border-red-600/10">
                                <p class="text-[10px] text-red-400/80 leading-relaxed italic">
                                    * Vui lòng kiểm tra kỹ thông tin. Vé điện tử sẽ được gửi qua Email và SMS ngay sau khi giao dịch hoàn tất.
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col items-center justify-center p-8 bg-black/40 rounded-[2rem] border border-white/5 shadow-2xl relative">
                            <h2 class="text-[10px] font-black mb-8 tracking-[0.4em] uppercase text-gray-500">
                                02. Quét mã VietQR
                            </h2>

                            <div class="relative group">
                                <div class="absolute -inset-4 bg-gradient-to-tr from-red-600 to-pink-600 rounded-[2.5rem] blur opacity-10 group-hover:opacity-20 transition duration-500"></div>
                                <div class="relative bg-white p-4 rounded-[2rem] shadow-2xl transform group-hover:scale-[1.02] transition-transform duration-500">
                                    <img src="https://img.vietqr.io/image/970422-0933257687-compact2.png?amount={{ $total }}&addInfo={{ $booking_code }}"
                                         alt="QR Payment" width="200" class="rounded-xl">
                                </div>
                            </div>

                            <div class="mt-8 text-center space-y-2">
                                <p class="text-[10px] text-gray-500 uppercase font-black tracking-widest">Nội dung chuyển khoản</p>
                                <p class="text-lg font-black text-white tracking-widest uppercase">{{ $booking_code }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 flex flex-col md:flex-row justify-between items-center bg-gradient-to-r from-red-950/40 to-black p-8 rounded-[2rem] border border-red-900/20 gap-8">
                    <div class="flex gap-12">
                        <div>
                            <div class="text-[10px] text-gray-500 uppercase font-black tracking-widest mb-1">Phương thức</div>
                            <div class="text-xl font-black text-red-500 italic uppercase tracking-tighter flex items-center gap-2">
                                <span class="w-8 h-px bg-red-500"></span> Chuyển khoản
                            </div>
                        </div>
                        <div>
                            <div class="text-[10px] text-gray-500 uppercase font-black tracking-widest mb-1">Tổng cộng</div>
                            <div class="text-3xl font-black text-white leading-none tracking-tighter">
                                <span>{{ number_format($total) }}</span><span class="text-sm ml-2 text-gray-500 uppercase font-normal">VND</span>
                            </div>
                        </div>
                    </div>

                    <form id="saveTicketForm" action="/save-ticket" method="POST" class="w-full md:w-auto">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                        <input type="hidden" name="cinema_id" value="{{ $cinema->id ?? '' }}">
                        <input type="hidden" name="showtime_id" value="{{ $showtime->id ?? '' }}">
                        <input type="hidden" name="booking_code" value="{{ $booking_code }}">
                        <input type="hidden" name="seats" value="{{ $seats }}">
                        <input type="hidden" name="total" value="{{ $total }}">
                        <input type="hidden" name="email" id="hidden_email">
                        <input type="hidden" name="phone" id="hidden_phone">

                        <button type="submit"
                                class="w-full md:w-auto bg-white text-black hover:bg-red-600 hover:text-white px-12 py-5 rounded-2xl font-black uppercase tracking-[0.2em] shadow-xl transition-all duration-500 transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3 group text-sm">
                            Xác nhận thanh toán 
                            <span class="text-xl group-hover:translate-x-1 transition-transform">✓</span>
                        </button>
                    </form>
                </div>

            </div>

            <div class="mt-10 text-center space-y-4">
                <a href="javascript:history.back()" class="text-[10px] text-gray-600 hover:text-white transition-colors uppercase font-black tracking-[0.5em]">
                    ← Quay lại chỉnh sửa ghế
                </a>
            </div>

        </div>
        <div class="h-20"></div>
    </div>
</x-app-layout>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('saveTicketForm');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        const emailEl = document.getElementById('email');
        const phoneEl = document.getElementById('phone');
        const hiddenEmail = document.getElementById('hidden_email');
        const hiddenPhone = document.getElementById('hidden_phone');

        const email = emailEl ? (emailEl.value || '').trim() : '';
        const phone = phoneEl ? (phoneEl.value || '').trim() : '';

        if (!email || !phone) {
            e.preventDefault();
            alert('Vui lòng điền thông tin');
            if (!email && emailEl) emailEl.focus();
            else if (!phone && phoneEl) phoneEl.focus();
            return false;
        }

        if (hiddenEmail) hiddenEmail.value = email;
        if (hiddenPhone) hiddenPhone.value = phone;
    });
});
</script>