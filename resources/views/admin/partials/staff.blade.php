<section class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="glass-card p-8 rounded-3xl">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-xl font-bold text-white">Đội ngũ nhân sự</h3>
            <button class="text-red-500 text-sm font-bold">+ Thêm mới</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-separate border-spacing-y-3">
                <thead>
                    <tr class="text-gray-500 text-[10px] uppercase tracking-widest">
                        <th class="pb-4 pl-4">Nhân viên</th>
                        <th class="pb-4">Vai trò</th>
                        <th class="pb-4 text-right pr-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(range(1,4) as $i)
                    <tr class="bg-white/[0.02] hover:bg-white/[0.05] transition group">
                        <td class="py-4 pl-4 rounded-l-2xl">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-zinc-800 to-zinc-700 border border-white/10 flex items-center justify-center font-bold text-xs">NV</div>
                                <div>
                                    <div class="text-sm font-bold text-white">Nhân viên {{ $i }}</div>
                                    <div class="text-[10px] text-gray-500 italic">staff{{ $i }}@cinema.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4">
                            <span class="text-xs text-gray-400 font-medium italic">Supervisor</span>
                        </td>
                        <td class="py-4 text-right pr-4 rounded-r-2xl">
                            <button class="p-2 text-gray-500 hover:text-white transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                            <button class="p-2 text-gray-500 hover:text-red-500 transition ml-2"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="glass-card rounded-[32px] p-8">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-xl font-bold text-white">Hành động</h3>
            <a href="#" class="text-gray-500 text-xs hover:text-white underline">Xem tất cả</a>
        </div>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 rounded-2xl bg-white/[0.02] border border-white/5 hover:border-red-600/30 transition">
                <div class="flex items-center gap-4">
                    <div class="text-red-600"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 100-4V6z"></path></svg></div>
                    <div>
                        <div class="text-sm font-bold text-white">BK-101</div>
                        <div class="text-[10px] text-gray-500 font-medium">Khách hàng 101 • Avengers: End Game</div>
                    </div>
                </div>
                <div class="text-right">
                    <span class="status-pill bg-green-500/10 text-green-500">Đã thanh toán</span>
                    <div class="text-[10px] text-gray-600 mt-1">19:30 | Phòng 04</div>
                </div>
            </div>
            <div class="p-6">
                <button class="px-4 py-2 bg-red-600 rounded text-white">Thêm nhân viên</button>
            </div>
        </div>
    </div>
</section>
