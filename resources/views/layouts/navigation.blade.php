<nav x-data="{ open: false }" class="nav-container">
    <div class="nav-content">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="nav-logo">
                        TaskPro
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex md:ml-8">
                    <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                        <i class="bi bi-list-task"></i> My Tasks
                    </x-nav-link>
                </div>
            </div>

            <!-- User Menu -->
            <div class="hidden md:flex md:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium focus:outline-none transition">
                            <div class="user-avatar">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div class="ml-2">
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                                <i class="bi bi-chevron-down ml-1 text-xs"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                            <i class="bi bi-person mr-2"></i> Profile
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="flex items-center text-red-600 hover:bg-red-50">
                                <i class="bi bi-box-arrow-right mr-2"></i> Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white border-t border-gray-200">
        <div class="space-y-1 px-4 py-3">
            <x-responsive-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')" class="flex items-center">
                <i class="bi bi-list-task mr-3"></i> My Tasks
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center">
                <i class="bi bi-person mr-3"></i> Profile
            </x-responsive-nav-link>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();"
                        class="flex items-center text-red-600">
                    <i class="bi bi-box-arrow-right mr-3"></i> Log Out
                </x-responsive-nav-link>
            </form>
        </div>
        
        <div class="px-4 py-3 border-t border-gray-200">
            <div class="flex items-center">
                <div class="user-avatar mr-3">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>
    </div>
</nav>