<!DOCTYPE html>
<html lang="fr">

<!-- ////////////////////////////////////////////////////////
//  Encyclopédie Héros Marvel
//  Copyright (c) 2024 , Rachid EL ACHGAR
//  All rights reserved.
////////////////////////////////////////////////////////////// -->

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="[Rachid EL ACHGAR]">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="content-language" content="fr">
    <link rel="canonical" href="http://127.0.0.1:8000/">

    <!-- Open Graph meta tags for social media sharing -->
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="URL_de_l'image">
    <meta property="og:url" content="URL_de_la_page">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

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
        <main>
            <!-- Page Content -->

            <!-- Hero Section -->
            <section class="bg-gray-900 dark:bg-gray-900">

            </section>
        </main>
    </div>

    <!-- Footer -->


</body>

</html>
