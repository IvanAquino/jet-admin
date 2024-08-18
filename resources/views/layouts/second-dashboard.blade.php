<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div x-data="{
        mobileSidebarOpen: false,
        desktopSidebarOpen: true,
        userDropdownOpen: false,
        toggleDarkMode: function() {
            window.toggleDarkMode();
        }
    }">
        <div id="page-container"
            class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-gray-100 transition-all duration-300 ease-out dark:bg-gray-900 dark:text-gray-200 lg:ps-64"
            x-bind:class="{ 'lg:ps-64': desktopSidebarOpen }">
            <nav id="page-sidebar"
                class="fixed bottom-0 start-0 top-0 z-50 flex h-full w-full flex-col border-gray-200 bg-white transition-transform duration-300 ease-out ltr:border-r rtl:border-l dark:border-gray-700/75 dark:bg-gray-900 lg:w-64"
                x-bind:class="{
                    'ltr:-translate-x-full rtl:translate-x-full': !mobileSidebarOpen,
                    'translate-x-0': mobileSidebarOpen,
                    'ltr:lg:-translate-x-full rtl:lg:translate-x-full': !desktopSidebarOpen,
                    'ltr:lg:translate-x-0 rtl:lg:translate-x-0': desktopSidebarOpen,
                }"
                aria-label="Main Sidebar Navigation">
                <div class="flex h-16 w-full flex-none items-center justify-between px-5 shadow-sm">
                    <a href="javascript:void(0)"
                        class="group inline-flex items-center gap-2 font-semibold text-gray-800 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-300">
                        @svg('heroicon-o-bolt', 'hi-outline hi-video-camera inline-block h-6 w-6 text-primary-500 transition group-hover:scale-110')
                        <span>
                            {{ config('app.name') }}
                        </span>
                    </a>

                    <div class="flex items-center">
                        <button type="button"
                            class="inline-flex items-center justify-center leading-5 text-gray-800 hover:text-gray-600 focus:outline-none active:text-gray-800 dark:text-gray-200 dark:hover:text-gray-300 dark:active:text-gray-200"
                            x-on:click="toggleDarkMode()">
                            <x-heroicon-o-sun class="hi-outline hi-moon inline-block h-5 w-5 dark:hidden" />
                            <x-heroicon-o-moon class="hi-outline hi-moon hidden h-5 w-5 dark:inline-block" />
                        </button>

                        <button type="button"
                            class="ms-3 inline-flex items-center justify-center leading-5 text-gray-800 hover:text-primary-600 focus:outline-none active:text-primary-800 dark:text-gray-200 dark:hover:text-primary-300 dark:active:text-primary-200 lg:hidden"
                            x-on:click="mobileSidebarOpen = false">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="hi-solid hi-x-mark inline-block h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="overflow-y-auto h-full">
                    <div class="w-full py-4">
                        <nav class="space-y-1">
                            <x-jet-admin::second-dashboard-team-selector />
                            @foreach (config('jet-admin.dashboard_navigation') as $item)
                                <x-jet-admin::second-dashboard-menu-item :item="$item" />
                            @endforeach
                        </nav>
                    </div>
                </div>
            </nav>

            <header id="page-header"
                class="fixed end-0 start-0 top-0 z-30 flex h-16 flex-none items-center bg-white shadow-sm transition-all duration-300 ease-out dark:bg-gray-900 lg:ps-64"
                x-bind:class="{ 'lg:ps-64': desktopSidebarOpen }">
                <div class="mx-auto flex w-full  justify-between px-4 lg:px-8">
                    <!-- Left Section -->
                    <div class="flex items-center">
                        <!-- Toggle Sidebar on Mobile -->
                        <div class="me-2 lg:hidden">
                            <button type="button"
                                class="inline-flex items-center justify-center gap-2 rounded border border-gray-300 bg-white px-3 py-2 font-semibold leading-6 text-gray-800 shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                                x-on:click="mobileSidebarOpen = true">
                                @svg('heroicon-o-bars-3', 'hi-solid hi-menu-alt-1 inline-block h-5 w-5')
                            </button>
                        </div>
                        <!-- END Toggle Sidebar on Mobile -->

                        <!-- Toggle Sidebar on Desktop -->
                        <div class="hidden lg:block">
                            <button type="button"
                                class="inline-flex items-center justify-center gap-2 rounded border border-gray-300 bg-white px-3 py-2 font-semibold leading-6 text-gray-800 shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                                x-on:click="desktopSidebarOpen = !desktopSidebarOpen">
                                @svg('heroicon-o-bars-3', 'hi-solid hi-menu-alt-1 inline-block h-5 w-5')
                            </button>
                        </div>
                        <!-- END Toggle Sidebar on Desktop -->
                    </div>
                    <!-- END Left Section -->



                    <!-- Right Section -->
                    <div class="flex items-center gap-2">
                        <!-- User Dropdown -->
                        <div class="relative inline-block">
                            <button type="button"
                                class="inline-flex items-center justify-center rounded border border-gray-300 bg-white px-3 py-2 text-sm font-semibold leading-5 text-gray-800 shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                                id="tk-dropdown-layouts-user" aria-haspopup="true"
                                x-bind:aria-expanded="userDropdownOpen" x-on:click="userDropdownOpen = true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="hi-solid hi-user-circle inline-block h-5 w-5 sm:hidden">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="hidden sm:inline">
                                    {{ auth()->user()->name }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="hi-solid hi-chevron-down ms-1 hidden h-5 w-5 opacity-50 sm:inline-block">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div x-cloak x-show="userDropdownOpen" x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 scale-75"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-75"
                                x-on:click.outside="userDropdownOpen = false" role="menu"
                                aria-labelledby="tk-dropdown-layouts-user"
                                class="z-1 absolute end-0 mt-2 w-48 rounded shadow-xl ltr:origin-top-right rtl:origin-top-left">
                                <div
                                    class="divide-y divide-gray-100 rounded bg-white ring-1 ring-black ring-opacity-5 dark:divide-gray-700 dark:bg-gray-900 dark:ring-gray-700">
                                    <div class="space-y-1 p-2">
                                        <a role="menuitem" href="{{ route('profile.show') }}" wire:navigate
                                            class="flex items-center gap-2 rounded px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100">
                                            <span>{{ __('Profile') }}</span>
                                        </a>
                                    </div>
                                    <div class="space-y-1 p-2">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" role="menuitem"
                                                class="flex w-full items-center gap-2 rounded px-3 py-2 text-start text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100">
                                                <span>{{ __('Log out') }}</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main id="page-content" class="flex max-w-full flex-auto flex-col pt-16">
                <div class="mx-auto w-full  p-4 lg:p-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
