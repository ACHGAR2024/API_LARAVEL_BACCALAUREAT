<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-900">

    <div class="min-h-screen bg-slate-900 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <div class="bg-slate-900 font-sans leading-normal tracking-normal">
            <div id="header" class="fixed w-full z-40">
                <!-- Nav -->
                <div class="flex w-full top-0 bg-gray-200 border-b border-grey-light opacity-75">

                    <!--///////////////Search//////////////// -->
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between py-1">
                        <form action="{{ route('rechercherheroes.index') }}" method="GET">
                            <input class=" text-black text-bold font-bold rounded-lg" type="text" name="search"
                                placeholder="Rechercher ...">
                            <button class=" text-black text-bold font-bold" type="submit"><svg
                                    class="fill-current text-grey-darkest h-5 w-5 " xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                                    </path>
                                </svg></button>
                        </form>


                        <!-- //////////////////////////////////// -->


                    </div>
                </div>

            </div>


        </div>

        <section class="bg-gray-900 dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
                <div class="mx-auto w-full text-center mb-8 lg:mb-16">
                    <h2 class="mt-16 mb-4 text-4xl tracking-tight font-extrabold text-white dark:text-white">Votre
                        recherche " <span class="text-blue-600 dark:text-blue-500">{{ $_GET['search'] }}</span> " sur
                        Héros Marvel</h2>
                    @if (count($heroes) == 0)
                        <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Aucun Héros Marvel ne
                            correspond à votre recherche</p>
                    @else
                        <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Trouver les Héros
                            Marvel en quelques clics et consulter les informations sur les personnages de science
                            fiction</p>
                    @endif

                </div>
                <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
                    @foreach ($heroes as $index => $hero)
                        <div
                            class="items-center text-gray-400 bg-gray-700 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                            <div class="w-3/6 pt-3 pl-2">
                                <a href="#">
                                    <img class="p-2 w-full rounded-lg sm:rounded-none sm:rounded-l-lg"
                                        src="{{ asset('storage/' . $hero->photo) }}" alt="{{ $hero->name }}">
                                </a>
                            </div>
                            <div class="w-3/6 px-3 pt-3">
                                <h3 class="text-xl font-bold tracking-tight text-gray-400 dark:text-white">
                                    <a href="#">{{ $hero->name }}</a>
                                </h3>
                                <span class="text-gray-300 dark:text-gray-400">{{ $hero->skill->name }}</span>
                                <p class="mt-3 mb-4 font-light text-gray-200 dark:text-gray-400">
                                    {{ $hero->description }}</p>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>




    </div>


    <!-- Swiper JS -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>
