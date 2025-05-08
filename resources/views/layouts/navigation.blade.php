<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Notification Dropdown -->
            {{-- <div id="notificationDropdown"
                class="hidden absolute right-0 mt-2 w-80 bg-white border border-gray-200 rounded-md shadow-lg z-50">

                <div class="flex justify-between items-center px-4 py-2 border-b">
                    <span class="font-semibold text-gray-700">Notifications</span>
                    <span class="bg-cyan-500 text-white text-xs px-2 py-0.5 rounded-full">17</span>
                </div>

                <ul id="notificationList" class="max-h-80 overflow-y-auto">
                    <li class="px-4 py-2 hover:bg-gray-50"><strong>Fauzan Khan</strong> shared your answer</li>
                    <li class="px-4 py-2 hover:bg-gray-50"><strong>Keanu Reeves</strong> promoted your question</li>
                    <li class="px-4 py-2 hover:bg-gray-50"><strong>Natalie Portman</strong> promoted your question</li>
                </ul>

                <!-- Mark All as Read -->
                <div class="border-t px-4 py-2 text-right">
                    <button id="markAllReadBtn" class="text-sm text-cyan-600 hover:underline">Mark all as read</button>
                </div>
            </div> --}}
            {{-- <div class="top-menu ml-auto"></div> --}}



            <div class="relative">
                <!-- Bell Icon Button -->
                <button id="toggleNotifications" class="relative text-gray-700 hover:text-blue-600 focus:outline-none">
                    <span class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs rounded-full px-1">8</span>
                    <i data-lucide="bell" class="w-6 h-6"></i>
                </button>

                <!-- Dropdown -->
                <div id="notificationDropdown" style="width: 320px;"
                    class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg z-50">
                    <div class="p-4 border-b flex items-center justify-between">
                        <h4 class="text-lg font-semibold">Notifications</h4>
                        <span class="text-sm bg-blue-100 text-blue-600 px-2 py-0.5 rounded-full">8 New</span>
                    </div>

                    <div class="max-h-96 overflow-y-auto">
                        <!-- Notification Item -->
                        <div class="flex items-start px-4 py-3 hover:bg-gray-100">
                            <img class="w-10 h-10 rounded-full object-cover"
                                src="https://source.unsplash.com/random/40x40?person1" alt="avatar">
                            <div class="ml-3">
                                <h5 class="font-semibold text-sm">Daisy Anderson <span
                                        class="text-xs text-gray-400 float-right">5 sec ago</span></h5>
                                <p class="text-sm text-gray-600">The standard chunk of lorem</p>
                            </div>
                        </div>

                        <div class="flex items-start px-4 py-3 hover:bg-gray-100">
                            <div
                                class="w-10 h-10 bg-red-100 text-red-700 flex items-center justify-center rounded-full font-bold">
                                DC</div>
                            <div class="ml-3">
                                <h5 class="font-semibold text-sm">New Orders <span
                                        class="text-xs text-gray-400 float-right">2 min ago</span></h5>
                                <p class="text-sm text-gray-600">You have received new orders</p>
                            </div>
                        </div>

                        <div class="flex items-start px-4 py-3 hover:bg-gray-100">
                            <img class="w-10 h-10 rounded-full object-cover"
                                src="https://source.unsplash.com/random/40x40?person2" alt="avatar">
                            <div class="ml-3">
                                <h5 class="font-semibold text-sm">Althea Cabardo <span
                                        class="text-xs text-gray-400 float-right">14 sec ago</span></h5>
                                <p class="text-sm text-gray-600">Many desktop publishing packages</p>
                            </div>
                        </div>

                        <div class="flex items-start px-4 py-3 hover:bg-gray-100">
                            <div
                                class="w-10 h-10 bg-blue-100 text-blue-700 flex items-center justify-center rounded-full font-bold">
                                AC</div>
                            <div class="ml-3">
                                <h5 class="font-semibold text-sm">Account Created <span
                                        class="text-xs text-gray-400 float-right">28 min ago</span></h5>
                                <p class="text-sm text-gray-600">Successfully created new email</p>
                            </div>
                        </div>

                        <div class="flex items-start px-4 py-3 hover:bg-gray-100">
                            <div
                                class="w-10 h-10 bg-gray-200 text-gray-700 flex items-center justify-center rounded-full font-bold">
                                SS</div>
                            <div class="ml-3">
                                <h5 class="font-semibold text-sm">New Product Approved <span
                                        class="text-xs text-gray-400 float-right">2 hrs ago</span></h5>
                                <p class="text-sm text-gray-600">Your new product has approved</p>
                            </div>
                        </div>

                        <div class="flex items-start px-4 py-3 hover:bg-gray-100">
                            <img class="w-10 h-10 rounded-full object-cover"
                                src="https://source.unsplash.com/random/40x40?person3" alt="avatar">
                            <div class="ml-3">
                                <h5 class="font-semibold text-sm">Katherine Pechon <span
                                        class="text-xs text-gray-400 float-right">15 min ago</span></h5>
                                <p class="text-sm text-gray-600">Making this the first true generator</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border-t">
                        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg">
                            View All Notifications
                        </button>
                    </div>
                </div>
            </div>



            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
