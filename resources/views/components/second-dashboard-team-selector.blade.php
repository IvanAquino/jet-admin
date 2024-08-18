<section x-data="{
    dropdownOpen: false,
    toggleDropdown() {
        this.dropdownOpen = !this.dropdownOpen;
    }
}" class="relative">
    <nav @click="toggleDropdown()"
        class="group flex items-center gap-2 px-5 py-1 text-sm font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-primary-800 dark:hover:text-primary-200 mb-4">

        @svg('heroicon-o-user-group', 'hi-outline hi-globe-americas inline-block h-6 w-6 text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-300')

        <span class="grow">
            {{ Auth::user()->currentTeam->name }}
        </span>

        <span class="text-primary-500">
            @svg('heroicon-o-chevron-down', 'hi-outline hi-hashtag inline-block h-4 w-4 text-slate-700 transition group-hover:text-primary-600 dark:text-slate-200')
        </span>
    </nav>

    <div x-show="dropdownOpen" @click.away="dropdownOpen=false" x-transition:enter="ease-out duration-200"
        x-transition:enter-start="-translate-y-2" x-transition:enter-end="translate-y-0"
        class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
        <div
            class="z-10 bg-white divide-y divide-gray-100 rounded shadow-xl w-52 dark:bg-gray-900 dark:divide-gray-900 ring-1 ring-black ring-opacity-5 dark:ring-gray-700">
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Team') }}
            </div>

            <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" wire:navigate
                class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                {{ __('Team Settings') }}
            </a>

            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" wire:navigate
                    class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                    {{ __('Create New Team') }}
                </a>
            @endcan

            @if (Auth::user()->allTeams()->count() > 1)
                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                    <x-jet-admin::dashboard-switchable-team :team="$team" />
                @endforeach
            @endif
        </div>
    </div>
</section>
