<x-app-layout>
    <style>
        .bg-glow {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at 50% -20%, #2a0505 0%, #080808 70%);
            z-index: -1;
        }
        /* Hiệu ứng scroller cho chatbox */
        .scroller-thin::-webkit-scrollbar { width: 4px; }
        .scroller-thin::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
        
        .hero-title {
            background: linear-gradient(to bottom, #fff 50%, #999);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>

    <div class="bg-glow"></div>

    <div class="relative h-[80vh] min-h-[600px] w-full overflow-hidden flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/mavo2.jpg') }}" class="w-full h-full object-cover scale-105 blur-sm opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-[#080808] via-[#080808]/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-transparent to-transparent"></div>
        </div>

        <div class="container mx-auto px-[8%] relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div class="hero-content">
                <span class="text-red-600 font-black tracking-[4px] text-xs mb-3 block animate-pulse uppercase">
                    Coming Soon to Cinema Pro
                </span>
                <h1 class="text-5xl md:text-7xl font-[1000] leading-[0.95] uppercase text-white mb-6 tracking-tighter drop-shadow-2xl">
                    AVENGERS<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-500">SECRET WARS</span>
                </h1>
                <p class="text-gray-400 text-base md:text-lg max-w-lg leading-relaxed mb-8 font-light">
                    Đỉnh cao của kỷ nguyên đa vũ trụ. Trải nghiệm công nghệ âm thanh <span class="text-white font-semibold">Dolby Atmos</span> và hình ảnh <span class="text-white font-semibold">IMAX</span> chân thực.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="#movies" class="group relative px-7 py-3.5 bg-red-600 text-white font-black rounded-sm overflow-hidden transition-all duration-300 hover:shadow-[0_0_25px_rgba(229,9,20,0.5)]">
                        <span class="relative z-10 uppercase tracking-widest text-xs">Mua vé ngay</span>
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    </a>
                    <a href="#" class="px-7 py-3.5 bg-white/5 backdrop-blur-md border border-white/10 text-white font-black rounded-sm uppercase tracking-widest text-xs hover:bg-white/10 transition-all">
                        Xem Trailer
                    </a>
                </div>
            </div>

            <div class="hidden lg:block relative group justify-self-center">
                <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-purple-600 rounded-lg blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
                <div class="relative">
                    <img src="{{ asset('images/mavo2.jpg') }}" 
                         class="w-[350px] rounded-lg shadow-2xl transform rotate-2 transition-transform duration-500 group-hover:rotate-0 border border-white/10"
                         alt="Avengers Poster">
                    <div class="absolute bottom-4 left-4 bg-black/90 backdrop-blur-md p-3 px-4 rounded-lg border border-white/10">
                        <p class="text-white font-bold text-[10px] uppercase mb-0.5 opacity-70">Khởi chiếu</p>
                        <p class="text-red-600 font-black text-lg leading-none">01 / 05 / 2026</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container max-w-[1300px] mx-auto px-5 relative z-20 -mt-10" id="movies">
        <div class="section-header flex justify-between items-end mb-8 border-b border-white/5 pb-4">
            <div>
                <h2 class="section-title text-3xl font-extrabold tracking-tighter text-white m-0 uppercase">Phim đang chiếu</h2>
                <div class="w-12 h-1 bg-red-600 mt-2 rounded-full"></div>
            </div>
            <a href="#" class="text-red-600 font-bold text-xs uppercase tracking-wider flex items-center gap-2 group transition-all hover:brightness-125">
                Xem tất cả 
                <i class="fas fa-chevron-right text-[10px] transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>

        @if($movies->isEmpty())
            <div class="text-center py-20 bg-[#121212]/30 rounded-2xl border border-white/5 backdrop-blur-sm">
                <i class="fas fa-film text-5xl text-gray-800 mb-4"></i>
                <p class="text-gray-500 font-light">Hiện tại chưa có lịch chiếu phim mới.</p>
            </div>
        @else
        <div>
            <div class="movies-grid grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach($movies as $movie)
                <div class="movie-card bg-[#121212]/50 rounded-xl overflow-hidden transition-all duration-500 border border-white/5 relative group hover:-translate-y-2 hover:border-red-600/50 hover:shadow-[0_15px_30px_rgba(0,0,0,0.5)]">
                    <div class="movie-poster relative aspect-[2/3] overflow-hidden">
                        <span class="absolute top-2 right-2 bg-red-600 text-white text-[9px] font-black px-2 py-1 rounded z-10">IMAX 2D</span>
                        <img src="{{ asset('images/' . $movie->image) }}" alt="{{ $movie->title }}" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-[0.3]">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity z-20">
                            <a href="{{ route('movie.info', $movie->id) }}" class="bg-white text-black font-black uppercase text-[10px] px-5 py-2.5 rounded-full hover:bg-red-600 hover:text-white transition-colors">Chi tiết</a>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-white mb-2 truncate tracking-tight">{{ $movie->title }}</h3>
                        <div class="flex justify-between text-[11px] text-gray-500 mb-4">
                            <span><i class="far fa-clock text-red-600 mr-1"></i> {{ $movie->duration }}'</span>
                            <span><i class="fa fa-star text-yellow-500 mr-1"></i> 9.8</span>
                        </div>
                        <a href="{{ route('movie.detail', $movie->id) }}" class="w-full flex items-center justify-center bg-white/5 border border-white/10 text-white font-bold uppercase text-[10px] py-3 rounded-lg transition-all hover:bg-red-600 hover:border-red-600 shadow-sm">
                            ĐẶT VÉ NGAY
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <footer class="bg-[#050505] pt-20 pb-10 border-t border-white/5 mt-24 relative z-10 overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-red-600/50 to-transparent"></div>
    
    <div class="max-w-[1300px] mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 text-gray-400">
            
            <div class="space-y-6">
                <a href="#" class="text-3xl font-[1000] text-red-600 tracking-tighter no-underline block hover:scale-105 transition-transform origin-left">
                    CINEMA<span class="text-white">PRO</span>
                </a>
                <p class="text-sm leading-relaxed opacity-60 font-light">
                    Trải nghiệm điện ảnh đỉnh cao với công nghệ IMAX & Dolby Atmos. Chúng tôi mang cả thế giới điện ảnh đến gần bạn hơn.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-red-600 hover:border-red-600 transition-all duration-300">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-red-600 hover:border-red-600 transition-all duration-300">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-red-600 hover:border-red-600 transition-all duration-300">
                        <i class="fab fa-youtube text-sm"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-black mb-7 text-xs uppercase tracking-[0.2em] relative inline-block">
                    Điều khoản
                    <span class="absolute -bottom-2 left-0 w-8 h-0.5 bg-red-600"></span>
                </h4>
                <ul class="list-none p-0 space-y-4 text-sm font-medium">
                    <li><a href="{{ route('terms') }}" class="hover:text-white transition-colors flex items-center group"><span class="w-0 group-hover:w-4 h-px bg-red-600 mr-0 group-hover:mr-2 transition-all"></span>Điều khoản sử dụng</a></li>
                    <li><a href="#" class="hover:text-white transition-colors flex items-center group"><span class="w-0 group-hover:w-4 h-px bg-red-600 mr-0 group-hover:mr-2 transition-all"></span>Chính sách bảo mật</a></li>
                    <li><a href="#" class="hover:text-white transition-colors flex items-center group"><span class="w-0 group-hover:w-4 h-px bg-red-600 mr-0 group-hover:mr-2 transition-all"></span>Quy định đổi vé</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-black mb-7 text-xs uppercase tracking-[0.2em] relative inline-block">
                    Dịch vụ
                    <span class="absolute -bottom-2 left-0 w-8 h-0.5 bg-red-600"></span>
                </h4>
                <ul class="list-none p-0 space-y-4 text-sm font-medium">
                    <li><a href="#" class="hover:text-white transition-colors flex items-center group"><span class="w-0 group-hover:w-4 h-px bg-red-600 mr-0 group-hover:mr-2 transition-all"></span>Thành viên Pro</a></li>
                    <li><a href="#" class="hover:text-white transition-colors flex items-center group"><span class="w-0 group-hover:w-4 h-px bg-red-600 mr-0 group-hover:mr-2 transition-all"></span>C'Combo Ưu đãi</a></li>
                    <li><a href="#" class="hover:text-white transition-colors flex items-center group"><span class="w-0 group-hover:w-4 h-px bg-red-600 mr-0 group-hover:mr-2 transition-all"></span>Cho thuê rạp</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-black mb-7 text-xs uppercase tracking-[0.2em] relative inline-block">
                    Liên hệ
                    <span class="absolute -bottom-2 left-0 w-8 h-0.5 bg-red-600"></span>
                </h4>
                <div class="space-y-4 text-sm">
                    <p class="flex items-start gap-3 opacity-80 hover:opacity-100 transition-opacity">
                        <i class="fa fa-map-marker-alt text-red-600 mt-1"></i>
                        <span>68 Lê Lợi, Quận 1, TP. Hồ Chí Minh</span>
                    </p>
                    <p class="flex items-center gap-3 opacity-80 hover:opacity-100 transition-opacity">
                        <i class="fa fa-phone-alt text-red-600"></i>
                        <span>+84 835 337 139</span>
                    </p>
                    <p class="flex items-center gap-3 opacity-80 hover:opacity-100 transition-opacity">
                        <i class="fa fa-envelope text-red-600"></i>
                        <span>support@cinemapro.vn</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-20 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-[11px] text-gray-600 font-bold tracking-[0.2em] uppercase">
                &copy; 2026 <span class="text-gray-400">Cinema Pro</span>. All Rights Reserved.
            </div>
            
           
        </div>
    </div>
</footer>

    <div id="chatFloat" class="fixed bottom-6 right-6 w-14 h-14 bg-red-600 rounded-full flex items-center justify-center text-white text-xl cursor-pointer z-[1000] shadow-lg hover:scale-110 transition-all">
        <i class="fa fa-comment-dots"></i>
    </div>

    <div id="chatbox" class="fixed bottom-24 right-6 w-[350px] h-[500px] bg-[#0f0f0f]/95 backdrop-blur-xl border border-white/10 rounded-2xl hidden flex-col overflow-hidden z-[1000] shadow-2xl">
        <div class="bg-red-600 p-4 flex justify-between items-center text-white">
            <span class="font-bold text-sm flex items-center gap-2"><i class="fa fa-robot"></i> TRỢ LÝ CINEMA</span>
            <span onclick="toggleChat()" class="cursor-pointer text-xl">&times;</span>
        </div>
        <div id="messages" class="flex-1 p-4 overflow-y-auto flex flex-col gap-2 scroller-thin text-sm">
            <div class="self-start bg-white/10 text-white rounded-xl rounded-bl-none p-3 max-w-[85%] border border-white/5">Chào bạn! Mình có thể giúp gì cho bạn không?</div>
        </div>
        <div class="p-3 border-t border-white/5 bg-black/50 flex gap-2">
            <input type="text" id="chatInput" class="flex-1 bg-white/5 border border-white/10 rounded-lg text-white p-2 px-3 text-xs outline-none focus:border-red-600" placeholder="Nhập tin nhắn...">
            <button onclick="sendMessage()" class="text-red-600 px-2 hover:scale-110 transition-transform">
                <i class="fa fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <script>
        function toggleChat() {
            console.log('toggleChat called');
            const chat = document.getElementById('chatbox');
            if (!chat) return;
            const computed = window.getComputedStyle(chat).display;
            console.log('chat computed display:', computed);
            if (computed === 'none' || computed === '') {
                chat.style.display = 'flex';
                chat.style.flexDirection = 'column';
                const input = document.getElementById('chatInput');
                if (input) input.focus();
            } else {
                chat.style.display = 'none';
            }
        }

        function showTyping(messages) {
            const id = 'client-typing';
            if (document.getElementById(id)) return id;
            const el = document.createElement('div');
            el.id = id;
            el.className = 'msg bot-msg';
            el.innerHTML = '<span class="typing">...</span>';
            messages.appendChild(el);
            messages.scrollTop = messages.scrollHeight;
            return id;
        }

        function removeTyping(id) {
            const el = document.getElementById(id);
            if (el) el.remove();
        }

        function saveLastMovie(name) {
            try { sessionStorage.setItem('chat_last_movie', name); } catch (e) {}
        }

        function getLastMovie() {
            try { return sessionStorage.getItem('chat_last_movie'); } catch (e) { return null; }
        }

        function generateShowtimes(title) {
            // generate 4 upcoming times based on current hour
            const now = new Date();
            const startHour = Math.max(now.getHours() + 1, 10);
            const times = [];
            for (let i = 0; i < 4; i++) {
                const d = new Date(now.getFullYear(), now.getMonth(), now.getDate(), startHour + i * 2, 0, 0);
                const hh = String(d.getHours()).padStart(2, '0');
                const mm = String(d.getMinutes()).padStart(2, '0');
                times.push(`${hh}:${mm}`);
            }
            return times;
        }

        // --- Chat persistence (localStorage) ---
        const CHAT_KEY = 'cinema_chat_history';

        function saveMessage(msg) {
            try {
                const arr = JSON.parse(localStorage.getItem(CHAT_KEY) || '[]');
                arr.push(msg);
                localStorage.setItem(CHAT_KEY, JSON.stringify(arr));
            } catch (e) { /* ignore */ }
        }

        function loadMessages() {
            try { return JSON.parse(localStorage.getItem(CHAT_KEY) || '[]'); } catch (e) { return []; }
        }

        function renderMessages(container) {
            const items = loadMessages();
            container.innerHTML = '';
            items.forEach(m => {
                const cls = m.sender === 'user' ? 'user-msg self-end bg-red-600 text-white rounded-2xl rounded-br-none p-3 px-4 max-w-[85%] text-sm mb-3' : 'msg bot-msg self-start bg-white/10 text-white rounded-2xl rounded-bl-none p-3 px-4 max-w-[85%] text-sm mb-3 border border-white/5';
                container.innerHTML += `<div class="msg ${cls}">${m.text}</div>`;
            });
            container.scrollTop = container.scrollHeight;
        }

        function sendMessage() {
            const input = document.getElementById('chatInput');
            const messages = document.getElementById('messages');
            if (!input || !input.value.trim()) return;

            const text = input.value.trim();
            messages.innerHTML += `<div class="msg user-msg self-end bg-red-600 text-white rounded-2xl rounded-br-none p-3 px-4 max-w-[85%] text-sm mb-3">${text}</div>`;
            messages.scrollTop = messages.scrollHeight;
            // persist user message
            saveMessage({ sender: 'user', text: text, time: new Date().toISOString() });

            const low = text.toLowerCase();
            const cards = Array.from(document.querySelectorAll('.movie-card'));
            const titles = cards.map(c => {
                const h = c.querySelector('.movie-info h3');
                return h ? h.textContent.trim() : '';
            }).filter(Boolean);

            // show typing indicator
            const typingId = showTyping(messages);

            // emulate thinking delay
            setTimeout(() => {
                let replyHtml = '';

                // try to detect explicit movie mention first
                const match = titles.find(t => t.toLowerCase().includes(low) || low.includes(t.toLowerCase()));
                if (match) {
                    // save context
                    saveLastMovie(match);
                    // if user also asked for showtimes or price
                    if (low.includes('suất') || low.includes('chiếu')) {
                        const times = generateShowtimes(match);
                        replyHtml = `Suất chiếu cho <strong>${match}</strong>:<br>` + times.map(tm => `• ${tm} @ Rạp A (Giá: 100.000₫)`).join('<br>');
                    } else if (low.includes('giá') || low.includes('bao nhiêu')) {
                        replyHtml = `Giá vé cho <strong>${match}</strong> tham khảo: 100.000₫ (tuỳ rạp và loại ghế). Bạn muốn suất chiếu nào?`;
                    } else {
                        const card = cards.find(c => (c.querySelector('.movie-info h3') || {}).textContent.trim() === match);
                        let dur = '';
                        let detailLink = '';
                        if (card) {
                            const d = card.querySelector('.movie-meta span');
                            if (d) dur = d.textContent.trim();
                            const a = card.querySelector('.btn-booking');
                            if (a) detailLink = a.href;
                        }
                        replyHtml = `<strong>${match}</strong>` + (dur ? ` — ${dur}` : '') + '<br>' + 'Mô tả ngắn: ' + (card && card.querySelector('p') ? card.querySelector('p').textContent.trim() : 'Không có') + '<br>';
                        if (detailLink) replyHtml += `<a href="${detailLink}" style="color:var(--primary); text-decoration:underline;">Xem chi tiết & đặt vé</a>`;
                        replyHtml += '<br>Bạn muốn xem "suất" và "giá" cho phim này không.';
                    }
                } else if (low.includes('có') || low.includes('chiếu')) {
                    // no explicit movie in this message; use context
                    const last = getLastMovie();
                    if (last) {
                        const times = generateShowtimes(last);
                        replyHtml = `Suất chiếu cho <strong>${last}</strong>:<br>` + times.map(tm => `• ${tm} @ Rạp A (Giá: 75.000₫)`).join('<br>');
                    } else {
                        // fallback to generic list
                        if (titles.length === 0) {
                            replyHtml = 'Hiện không có dữ liệu lịch chiếu trên trang.';
                        } else {
                            const lines = titles.slice(0, 6).map(t => {
                                const card = cards.find(c => (c.querySelector('.movie-info h3') || {}).textContent.trim() === t);
                                let dur = '';
                                if (card) {
                                    const d = card.querySelector('.movie-meta span');
                                    if (d) dur = ' — ' + d.textContent.trim();
                                }
                                return `• ${t}${dur}`;
                            });
                            replyHtml = 'Lịch chiếu :<br>' + lines.join('<br>') + '<br>Hãy hỏi cụ thể 1 phim để biết suất chiếu.';
                        }
                    }
                } else if (low.includes('giá') || low.includes('bao nhiêu')) {
                    replyHtml = 'Giá vé tham khảo: thường từ <strong>85.000₫</strong> đến <strong>150.000₫</strong>, tuỳ rạp và loại ghế. Bạn muốn xem giá cho phim nào?';
                }

                if (!replyHtml) replyHtml = 'Xin chào! Mình là Trợ lý Cinema. Mình có thể giúp xem lịch chiếu, giá vé hoặc thông tin phim. Hãy hỏi tên phim hoặc "lịch chiếu hôm nay".';

                removeTyping(typingId);
                messages.innerHTML += `<div class="msg bot-msg self-start bg-white/10 text-white rounded-2xl rounded-bl-none p-3 px-4 max-w-[85%] text-sm mb-3 border border-white/5">${replyHtml}</div>`;
                // persist bot reply
                saveMessage({ sender: 'bot', text: replyHtml, time: new Date().toISOString() });
                messages.scrollTop = messages.scrollHeight;
                input.value = '';
            }, 700 + Math.min(1500, text.length * 30));
        }

        document.addEventListener('DOMContentLoaded', () => {
            const floatBtn = document.getElementById('chatFloat') || document.querySelector('.chat-float');
            console.log('chat float element:', !!floatBtn);
            if (floatBtn) floatBtn.addEventListener('click', (e) => { console.log('chat float clicked'); toggleChat(); });
            const input = document.getElementById('chatInput');
            if (input) input.addEventListener('keypress', (e) => { if (e.key === 'Enter') sendMessage(); });

            // render persisted history if present
            const messagesEl = document.getElementById('messages');
            if (messagesEl && loadMessages().length) {
                renderMessages(messagesEl);
            }

            // Clear chat history when logout form is submitted
            const logoutForm = document.querySelector('form[action="/logout"]');
            if (logoutForm) {
                logoutForm.addEventListener('submit', () => {
                    try { localStorage.removeItem(CHAT_KEY); } catch (e) {}
                    try { sessionStorage.removeItem('chat_last_movie'); } catch (e) {}
                });
            }
        });
    </script>
</x-app-layout>