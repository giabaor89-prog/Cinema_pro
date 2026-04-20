<nav x-data="{ open: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="scrolled ? 'bg-zinc-950/90 backdrop-blur-xl border-zinc-800/80 shadow-2xl' : 'bg-zinc-950/40 backdrop-blur-md border-transparent'"
     class="sticky top-0 z-50 w-full border-b transition-all duration-500">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center gap-12">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('movies') }}"
                       class="relative group text-2xl font-[1000] tracking-tighter transition-all duration-300">
                        <span class="bg-gradient-to-r from-red-500 via-red-600 to-red-800 bg-clip-text text-transparent group-hover:from-red-400 group-hover:to-red-600">
                            CINEMA<span class="text-white group-hover:text-red-500 transition-colors">PRO</span>
                        </span>
                        <div class="absolute -inset-2 bg-red-600/20 blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-full"></div>
                    </a>
                </div>

                <div class="hidden space-x-2 sm:flex items-center">
                    @php
                        $navItems = [
                            ['route' => 'showtimes', 'label' => 'Lịch chiếu'],
                            ['route' => 'about', 'label' => 'Giới thiệu'],
                            ['route' => 'contact', 'label' => 'Liên hệ'],
                        ];
                    @endphp

                    @foreach($navItems as $item)
                        <x-nav-link :href="route($item['route'])" :active="request()->routeIs($item['route'])"
                            class="px-4 py-2 text-xs font-bold uppercase tracking-[0.15em] text-zinc-400 hover:text-white transition-all duration-300 relative group border-none">
                            {{ __($item['label']) }}
                            <span class="absolute bottom-0 left-1/2 w-0 h-[2px] bg-red-600 transition-all duration-300 group-hover:w-full group-hover:left-0 {{ request()->routeIs($item['route']) ? 'w-full left-0' : '' }}"></span>
                        </x-nav-link>
                    @endforeach

                    <a href="{{ url('/my-tickets') }}" 
                       class="flex items-center gap-2 px-4 py-2 rounded-lg bg-zinc-900/50 border border-zinc-800 text-xs font-bold uppercase tracking-widest text-zinc-300 hover:bg-red-600/10 hover:border-red-600/50 hover:text-red-500 transition-all duration-300">
                        <span class="animate-pulse">🎟</span> {{ __('Vé của tôi') }}
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ url('/admin') }}" class="mr-4 px-3 py-1 bg-yellow-500/10 border border-yellow-500/20 rounded text-[10px] font-black uppercase text-yellow-500 hover:bg-yellow-500 hover:text-black transition-all">
                            Quản Lý
                        </a>
                    @endif

                    <x-dropdown align="right" width="64">
                        <x-slot name="trigger">
                            <button class="flex items-center p-1 rounded-full bg-zinc-900 border border-zinc-800 hover:border-red-600/50 transition-all group">
                                <div class="h-9 w-9 rounded-full bg-gradient-to-tr from-red-600 to-zinc-800 flex items-center justify-center text-white font-bold text-sm">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div class="ml-3 mr-2 text-left hidden lg:block">
                                    <p class="text-xs font-bold text-zinc-200 group-hover:text-red-500 transition-colors">{{ Auth::user()->name }}</p>
                                    <p class="text-[10px] text-zinc-500 font-medium">Member VIP</p>
                                </div>
                                <i class="fas fa-chevron-down text-[10px] text-zinc-500 mx-2"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="bg-zinc-950 border border-white/5 rounded-xl overflow-hidden p-1 shadow-2xl backdrop-blur-2xl">
                                <div class="px-4 py-3 border-b border-white/5 mb-1">
                                    <p class="text-[10px] text-zinc-500 uppercase font-black tracking-widest">Tùy chọn</p>
                                </div>
                                
                                <x-dropdown-link :href="route('profile.edit')" class="rounded-lg text-zinc-300 hover:bg-red-600 hover:text-white transition-all py-2.5">
                                    <i class="fas fa-user-shield opacity-50 mr-2"></i> {{ __('Hồ sơ cá nhân') }}
                                </x-dropdown-link>

                                <div class="h-px bg-white/5 my-1"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            class="rounded-lg text-red-500 hover:bg-red-600/10 font-bold py-2.5"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="fas fa-power-off mr-2"></i> {{ __('Đăng xuất') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center gap-6">
                        <a href="{{ route('login') }}" class="text-xs font-black uppercase tracking-widest text-zinc-400 hover:text-white transition-colors">
                            {{ __('Đăng nhập') }}
                        </a>
                        <a href="{{ route('register') }}" 
                           class="relative px-8 py-3 bg-red-600 text-white text-xs font-[1000] uppercase tracking-[0.2em] rounded-full overflow-hidden group">
                           <span class="relative z-10">{{ __('Đăng ký') }}</span>
                           <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        </a>
                    </div>
                @endauth
            </div>

            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="w-10 h-10 flex items-center justify-center rounded-lg bg-zinc-900 border border-zinc-800 text-red-600">
                    <svg class="h-6 w-6" :class="{'hidden': open, 'block': !open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6" :class="{'block': open, 'hidden': !open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="sm:hidden bg-zinc-950 border-t border-white/5 px-4 pt-4 pb-8 space-y-3">
        
        <x-responsive-nav-link :href="route('movies')" class="rounded-xl border-none font-bold text-lg">🏠 Trang chủ</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('showtimes')" class="rounded-xl border-none font-bold text-lg">🎬 Lịch chiếu</x-responsive-nav-link>
        <x-responsive-nav-link :href="url('/my-tickets')" class="rounded-xl border-none font-bold text-lg text-red-500 bg-red-500/5">🎟 Vé của tôi</x-responsive-nav-link>
        
        @guest
            <div class="grid grid-cols-2 gap-4 mt-6">
                <a href="{{ route('login') }}" class="py-3 text-center rounded-xl bg-zinc-900 text-white font-bold">Đăng nhập</a>
                <a href="{{ route('register') }}" class="py-3 text-center rounded-xl bg-red-600 text-white font-bold shadow-lg shadow-red-600/20">Đăng ký</a>
            </div>
        @endguest
    </div>
</nav>