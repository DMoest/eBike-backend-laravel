<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
{{--                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />--}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="27.384" height="35.004" viewBox="0 0 27.384 35.004"><g transform="translate(1.692)"><path d="M0,0H24V24H0Z" fill="none"/><path d="M12,12a2,2,0,1,1,2-2A2,2,0,0,1,12,12Zm6-1.8a6,6,0,0,0-12,0c0,2.34,1.95,5.44,6,9.14C16.05,15.64,18,12.54,18,10.2ZM12,2a7.955,7.955,0,0,1,8,8.2q0,4.98-8,11.8Q4.005,15.175,4,10.2A7.955,7.955,0,0,1,12,2Z" fill="#2bb786"/></g><path d="M2.258-8.242H5.5V-7.3H1.206v-5.3H5.421v.938H2.258v1.211H4.989v.923H2.258Zm9.012-1.869a1.39,1.39,0,0,1,.632.45,1.334,1.334,0,0,1,.261.866,1.342,1.342,0,0,1-.477,1.1,2.036,2.036,0,0,1-1.324.39H7.494v-5.3h2.845a1.787,1.787,0,0,1,1.214.363,1.227,1.227,0,0,1,.412.969,1.157,1.157,0,0,1-.7,1.1ZM8.546-11.737v1.286h1.672a.663.663,0,0,0,.5-.174.652.652,0,0,0,.17-.477.617.617,0,0,0-.178-.462.647.647,0,0,0-.473-.174Zm1.771,3.572a.74.74,0,0,0,.552-.193.7.7,0,0,0,.189-.511.725.725,0,0,0-.2-.518.714.714,0,0,0-.545-.208H8.546v1.43ZM15.25-12.6v5.3H14.168v-5.3Zm5.97,5.3L19.139-9.535h-.545V-7.3H17.512v-5.3h1.082v2.1h.545l1.854-2.1h1.286l-2.24,2.512v.053l2.5,2.732Zm4.131-.938H28.59V-7.3H24.3v-5.3h4.215v.938H25.351v1.211h2.732v.923H25.351Z" transform="translate(-1.206 42.304)"/></svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard.clients')" :active="request()->routeIs('dashboard.clients')">
                        {{ __('Clients') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
