@props([
    'items' => [],
    'brand' => '#16a34a',
    'brandShort' => 'ST',
    'panelLabel' => 'Yönetim',
    'siteName' => config('app.name'),
    'siteUrl' => url('/'),
    'logoutRoute' => route('logout'),
])

@php
    $isActive = function ($match) {
        if (is_array($match)) {
            foreach ($match as $pattern) {
                if (request()->routeIs($pattern)) {
                    return true;
                }
            }

            return false;
        }

        return request()->routeIs($match);
    };
@endphp

<aside
    class="fixed inset-y-0 left-0 z-50 flex w-[17rem] flex-col bg-slate-950 text-slate-200 shadow-xl transition-transform duration-200 lg:static lg:translate-x-0 lg:shadow-none"
    :class="open ? 'translate-x-0' : '-translate-x-full'"
>
    <div class="relative overflow-hidden border-b border-white/10 px-5 py-5">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_left,_rgba(22,163,74,0.45),_transparent_55%)]"></div>
        <div class="relative flex items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl text-sm font-bold text-white shadow-lg" style="background: {{ $brand }}; box-shadow: 0 10px 15px -3px color-mix(in srgb, {{ $brand }} 30%, transparent);">
                    {{ $brandShort }}
                </div>
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-emerald-300/90">{{ $panelLabel }}</p>
                    <p class="text-sm font-semibold text-white">{{ $siteName }}</p>
                </div>
            </div>
            <button type="button" class="rounded-lg p-1.5 text-slate-400 hover:bg-white/10 hover:text-white lg:hidden" @click="open = false" aria-label="Kapat">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <nav class="flex-1 space-y-1 overflow-y-auto px-3 py-4 text-sm">
        <p class="px-3 pb-2 text-[11px] font-semibold uppercase tracking-wider text-slate-500">Menü</p>

        @foreach ($items as $item)
            @if (isset($item['children']))
                @php
                    $anyActive = collect($item['children'])->contains(fn ($child) => $isActive($child['match']));
                @endphp
                <x-admin.nav.group :item="$item" :brand="$brand" :active="$anyActive" />
            @else
                @php $active = $isActive($item['match']); @endphp
                <x-admin.nav.item :item="$item" :brand="$brand" :active="$active" />
            @endif
        @endforeach

        <div class="my-3 border-t border-white/10"></div>
        <a href="{{ $siteUrl }}" target="_blank" class="group flex items-center gap-3 rounded-xl px-3 py-2.5 font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/5 text-slate-400 group-hover:text-emerald-300">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </span>
            <span>Siteyi Aç</span>
        </a>
    </nav>

    <div class="border-t border-white/10 p-3">
        <div class="mb-3 flex items-center gap-3 rounded-xl bg-white/5 px-3 py-2.5">
            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-500/20 text-xs font-bold text-emerald-300">
                {{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="min-w-0">
                <p class="truncate text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                <p class="truncate text-xs text-slate-400">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <form method="POST" action="{{ $logoutRoute }}">
            @csrf
            <button type="submit" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2.5 text-sm font-medium text-slate-200 transition hover:bg-white/10 hover:text-white">
                Çıkış Yap
            </button>
        </form>
    </div>
</aside>
