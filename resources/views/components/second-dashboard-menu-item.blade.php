@props(['item'])

@php
    $route = Route::has($item['route']) ? route($item['route']) : $item['route'];
    $activeRoute = $item['active_route'] ?? $route;

    $isItemActive = Route::has($item['route']) ? request()->routeIs($activeRoute) : request()->is($activeRoute);

    $itemClasses = $isItemActive
        ? 'group flex items-center gap-2 border-r-4 border-primary-400 bg-primary-50 px-5 py-0.5 text-sm font-medium text-primary-900 dark:bg-primary-800 dark:text-primary-200'
        : 'group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-primary-800 dark:hover:text-primary-200';

    $iconClasses = $isItemActive
        ? 'hi-outline hi-home inline-block h-6 w-6 text-primary-600 dark:text-primary-300'
        : 'hi-outline hi-globe-americas inline-block h-6 w-6 text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-300';
@endphp

<a href="{{ $route }}" class="{{ $itemClasses }}" wire:navigate>
    @isset($item['icon'])
        @svg('heroicon-o-' . $item['icon'], $iconClasses)
    @endisset
    <span class="grow py-2">
        {{ __($item['name']) }}
    </span>
</a>
