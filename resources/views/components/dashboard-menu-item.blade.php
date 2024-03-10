@props(['item'])

@php
    $route = Route::has($item['route']) ? route($item['route']) : $item['route'];
    $activeRoute = isset($item['active_route']) ? $item['active_route'] : $route;

    $isItemActive = Route::has($activeRoute) ? request()->routeIs($activeRoute) : request()->is($activeRoute);

    $itemClasses = $isItemActive
        ? 'group flex items-center gap-3 rounded-xl border border-transparent bg-slate-100 px-4 py-2.5 font-medium text-slate-900 transition dark:bg-slate-900 dark:text-slate-100'
        : 'group flex items-center gap-3 rounded-xl border border-transparent px-4 py-2.5 font-medium text-slate-600 transition hover:bg-slate-100 active:border-slate-200 active:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-900/50 dark:active:border-slate-700/50 dark:active:text-slate-100';

    $iconClasses = $isItemActive
        ? 'hi-outline hi-home inline-block h-6 w-6 text-primary-600 transition'
        : 'hi-outline hi-hashtag inline-block h-6 w-6 text-slate-700 transition group-hover:text-primary-600 dark:text-slate-200';
@endphp

<a href="{{ $route }}" class="{{ $itemClasses }}" wire:navigate>
    @isset($item['icon'])
        @svg('heroicon-o-' . $item['icon'], $iconClasses)
    @endisset
    <span class="grow">{{ __($item['name']) }}</span>
    @if ($isItemActive)
        <span class="text-primary-500">&bull;</span>
    @endif
</a>
