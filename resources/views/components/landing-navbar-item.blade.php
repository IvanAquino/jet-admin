@props(['item'])

@php
    $activeClass =
        'block py-2 px-3 text-white bg-primary-700 rounded md:bg-transparent md:text-primary-700 md:p-0 dark:text-white md:dark:text-primary-500';
    $normalClass =
        'block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-primary-700 md:p-0 dark:text-white md:dark:hover:text-primary-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent';

    $isRouteName = Route::has($item['route']);

    if ($isRouteName) {
        $classes = request()->routeIs($item['route']) ? $activeClass : $normalClass;
    } else {
        $classes = request()->is($item['route']) ? $activeClass : $normalClass;
    }
@endphp

<li>
    <a href="{{ $isRouteName ? route($item['route']) : $item['route'] }}" class="{{ $classes }}">
        {{ __($item['name']) }}
    </a>
</li>
