<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>
        {{ config('app.name', 'CampusResearchHub') }}
    </title>


    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
          rel="stylesheet" />



    <!-- CSS / JS -->

    @vite([
        'resources/css/app.css',
        'resources/css/dashboard.css',
        'resources/css/theme.css',
        'resources/js/app.js'
    ])

</head>



<body class="font-sans antialiased bg-slate-50">


<div class="min-h-screen">


    {{-- SIDEBAR --}}

    <aside
        class="fixed left-0 top-0 h-screen w-[280px]
        bg-slate-900 z-50">


        @include('layouts.navigation')


    </aside>





    {{-- MAIN AREA --}}

    <div class="ml-[280px] min-h-screen">



        {{-- TOP HEADER --}}

        <header
            class="h-20 bg-white border-b
            flex items-center justify-between
            px-8">


            <div>


                <h1 class="text-2xl font-bold text-slate-800">

                    CampusResearchHub

                </h1>


                <p class="text-sm text-slate-500">

                    Research Platform

                </p>


            </div>





            @auth

            <div class="flex items-center gap-5">


                {{-- Notification --}}

                <div class="text-2xl">

                    🔔

                </div>



                <div class="text-right">


                    <p class="font-semibold text-slate-800">

                        {{ auth()->user()->name }}

                    </p>


                    <p class="text-xs text-slate-500 capitalize">

                        {{ auth()->user()->role }}

                    </p>


                </div>


            </div>


            @endauth



        </header>






        {{-- PAGE CONTENT --}}

        <main class="p-8">


            {{ $slot }}


        </main>



    </div>



</div>



</body>

</html>