<x-app-layout>
    <style>
        @keyframes border-flow {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }
        .animate-flow {
            background: linear-gradient(90deg, transparent, #dc2626, transparent);
            background-size: 200% 100%;
            animation: border-flow 3s linear infinite;
        }
        .term-card {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            perspective: 1000px;
        }
        .term-card:hover {
            transform: translateY(-5px) scale(1.01);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(220, 38, 38, 0.5);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6), 0 0 20px rgba(220, 38, 38, 0.1);
        }
        .text-glow {
            text-shadow: 0 0 15px rgba(220, 38, 38, 0.5);
        }
    </style>

    <div class="relative min-h-screen bg-[#020202] text-white selection:bg-red-600/30 overflow-hidden">
        
        <div class="fixed inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('https://grainy-gradients.vercel.app/noise.svg');"></div>
        
        <div class="fixed top-[-10%] right-[-5%] w-[600px] h-[600px] bg-red-900/10 rounded-full blur-[120px]"></div>
        <div class="fixed bottom-[-10%] left-[-5%] w-[500px] h-[500px] bg-red-600/5 rounded-full blur-[150px]"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 py-20">
            
            <div class="flex justify-center mb-4">
                <span class="px-4 py-1 rounded-full border border-red-900/50 bg-red-950/20 text-[10px] font-bold uppercase tracking-[0.4em] text-red-500">
                    Legal Document v2.0
                </span>
            </div>

            <div class="text-center mb-20">
                <h1 class="text-6xl md:text-8xl font-black italic uppercase tracking-tighter mb-4">
                    POLI<span class="text-red-600 text-glow">CIES</span>
                </h1>
                <div class="h-[2px] w-24 bg-red-600 mx-auto mb-6 shadow-[0_0_15px_#dc2626]"></div>
                <p class="text-zinc-500 max-w-xl mx-auto text-sm leading-relaxed uppercase tracking-widest font-medium">
                    Những cam kết và quy định chung nhằm bảo đảm quyền lợi tối đa cho khán giả tại <span class="text-white">Cinema Pro</span>.
                </p>
            </div>

            <div class="space-y-8 relative">
                <div class="absolute left-0 md:left-1/2 top-0 bottom-0 w-[1px] bg-gradient-to-b from-transparent via-zinc-800 to-transparent -translate-x-1/2 hidden md:block"></div>

                @php
                    $terms = [
                        ['id' => '01', 'title' => 'Quy định chung', 'content' => 'Người dùng đồng ý tuân thủ các quy tắc truy cập và sử dụng dịch vụ Cinema Pro một cách minh bạch và hợp pháp.'],
                        ['id' => '02', 'title' => 'Thanh toán & Đổi trả', 'content' => 'Vé đã thanh toán không được hoàn trả dưới mọi hình thức, nhằm đảm bảo hệ thống vận hành và giữ chỗ chính xác cho khách hàng.'],
                        ['id' => '03', 'title' => 'Thông tin cá nhân', 'content' => 'Chủ tài khoản có trách nhiệm bảo mật thông tin đăng nhập và cung cấp chính xác Email/SĐT để nhận mã vé điện tử.'],
                        ['id' => '04', 'title' => 'Bản quyền & Quay phim', 'content' => 'Nghiêm cấm các hành vi quay phim, ghi âm trái phép. Vi phạm sẽ bị xử lý theo quy định của pháp luật hiện hành.'],
                        ['id' => '05', 'title' => 'An toàn & Ứng xử', 'content' => 'Vui lòng duy trì văn hóa xem phim văn minh, không gây ồn ào và tuân thủ các hướng dẫn an toàn cháy nổ tại rạp.'],
                        ['id' => '06', 'title' => 'Bảo mật dữ liệu', 'content' => 'Dữ liệu người dùng được bảo vệ bằng lớp mã hóa AES-256 cao cấp, cam kết không cung cấp cho bên thứ ba trái phép.']
                    ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($terms as $term)
                    <div class="term-card group relative bg-zinc-900/20 backdrop-blur-xl border border-white/5 p-10 rounded-[2.5rem] overflow-hidden">
                        <div class="absolute -inset-px bg-gradient-to-br from-red-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-6">
                                <span class="text-4xl font-black text-red-600/20 group-hover:text-red-600/40 transition-colors cinema-title">{{ $term['id'] }}</span>
                                <div class="h-[1px] flex-1 bg-zinc-800 group-hover:bg-red-900/50 transition-colors"></div>
                            </div>
                            
                            <h3 class="text-xl font-black uppercase italic tracking-wider mb-4 group-hover:text-red-500 transition-colors">
                                {{ $term['title'] }}
                            </h3>
                            
                            <p class="text-zinc-400 text-sm leading-[1.8] group-hover:text-zinc-200 transition-colors">
                                {{ $term['content'] }}
                            </p>
                        </div>

                        <div class="absolute top-0 right-0 w-16 h-16 opacity-10">
                             <div class="absolute top-4 right-4 w-2 h-2 bg-red-600 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-24 border-t border-zinc-900 pt-12">
                <div class="bg-gradient-to-r from-red-950/30 to-transparent p-8 rounded-3xl border border-red-900/20 flex flex-col md:flex-row items-center gap-8">
                    <div class="text-4xl">⚖️</div>
                    <div class="flex-1">
                        <h4 class="text-sm font-bold uppercase tracking-widest text-red-500 mb-2">Lưu ý quan trọng</h4>
                        <p class="text-xs text-zinc-500 leading-relaxed uppercase tracking-tighter">
                            Việc tiếp tục sử dụng dịch vụ đồng nghĩa với việc bạn đã đọc, hiểu và chấp thuận hoàn toàn các điều khoản trên. Cinema Pro có quyền thay đổi nội dung để phù hợp với quy định mới mà không cần thông báo trước.
                        </p>
                    </div>
                    <a href="/" class="whitespace-nowrap px-8 py-4 bg-white text-black text-[10px] font-black uppercase tracking-[0.2em] rounded-xl hover:bg-red-600 hover:text-white transition-all">
                        Tôi đã hiểu
                    </a>
                </div>
            </div>

            <div class="mt-12 text-center text-[10px] font-bold text-zinc-800 tracking-[0.8em] uppercase">
                Premium Cinematic Experience • 2026
            </div>
        </div>
    </div>
</x-app-layout>