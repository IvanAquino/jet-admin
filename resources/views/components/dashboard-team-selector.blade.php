<section>
    <nav data-dropdown-toggle="dashboard-team-selector-dropdown"
        class="group flex items-center gap-3 rounded-xl border border-transparent px-4 py-2.5 font-medium text-slate-600 transition hover:bg-slate-100 active:border-slate-200 active:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-900/50 dark:active:border-slate-700/50 dark:active:text-slate-100 mb-4">

        @svg('heroicon-o-user-group', 'hi-outline hi-hashtag inline-block h-6 w-6 text-slate-700 transition group-hover:text-primary-600 dark:text-slate-200')

        <span class="grow">
            {{ Auth::user()->currentTeam->name }}
        </span>

        <span class="text-primary-500">
            @svg('heroicon-o-chevron-down', 'hi-outline hi-hashtag inline-block h-4 w-4 text-slate-700 transition group-hover:text-primary-600 dark:text-slate-200')
        </span>
    </nav>

    <div id="dashboard-team-selector-dropdown"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700 dark:divide-gray-700">
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
</section>
