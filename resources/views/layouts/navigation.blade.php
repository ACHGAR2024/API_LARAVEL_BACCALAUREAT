<nav class="bg-black  border-white border-separate dark:bg-gray-900 border-x-slate-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('storage/photos/') }}/logo.png" alt="LOGO" class="w-30 h-14 " title="LOGO">

        </a>-->
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @if (auth()->check())
                <button type="button"
                    class="mr-8 flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Adminstrateur menu</span>
                    <img class="w-12 h-12 object-cover rounded-full"
                        src="{{ asset('storage') }}/{{ auth()->user()->image }}" title="avatar" alt="avatar">
                </button>
            @else
                <div class=" ">
                    <button type="button"
                        class="flex text-sm bg-gray-500 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Administrateur menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="">
                    <x-dropdown-link :href="route('login')"
                        class=" h-9 rounded-lg text-white hover:text-black hover:font-extrabold ">
                        {{ __('Connexion') }}
                    </x-dropdown-link>
                </div>
                <div class="ml-5">
                    <x-dropdown-link :href="route('register')"
                        class="  h-9 bg-slate-700 rounded-lg text-white  hover:text-black hover:font-extrabold">
                        {{ __('Enregistrer') }}
                    </x-dropdown-link>
                </div>
            @endif

            <!-- Dropdown menu -->
            <!-- Menu Adminstrateur -->
            @if (auth()->check())
                <div class="m-5 z-50 hidden my-4 text-base list-none bg-gray-700 divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-300 dark:text-white"> {{ auth()->user()->pseudo }}</span>
                        <span class="block text-sm  text-gray-400 truncate dark:text-gray-400">
                            {{ auth()->user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">

                        <li>
                            <x-dropdown-link :href="route('profile.edit')"
                                class="w-full h-9 bg-slate-700 rounded-lg text-white hover:text-black hover:font-extrabold ">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        </li>
                        <li>

                        </li>
                        <li>

                        </li>
                        <li>
                            <x-dropdown-link :href="route('contacts.show')"
                                class="w-full h-9 bg-slate-700 rounded-lg text-white  hover:text-black hover:font-extrabold">
                                {{ __('Messages') }}
                            </x-dropdown-link>
                        </li>
                        <li>
                            <x-dropdown-link :href="route('user.index')"
                                class="w-full h-9 bg-slate-700 rounded-lg text-white  hover:text-black hover:font-extrabold">
                                {{ __('Gestion des comptes') }}
                            </x-dropdown-link>
                        </li>
                        <li>


                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}"
                                class="w-full h-9 bg-slate-700 rounded-lg text-white  hover:text-black hover:font-extrabold">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                    class="w-full h-9 bg-slate-700 rounded-lg text-white  hover:text-black hover:font-extrabold">
                                    {{ __('Déconnecter') }}
                                </x-dropdown-link>
                            </form>

                        </li>
                    </ul>
                </div>
            @endif
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Acceuil') }}
                    </x-nav-link>
                </li>

                <li>

                </li>
            </ul>
        </div>
    </div>
</nav>
