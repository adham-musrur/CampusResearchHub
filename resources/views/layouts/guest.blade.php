<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>
        {{ config('app.name', 'Laravel') }}
    </title>


    <!-- Fonts -->

    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    >

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    />


    <!-- Scripts -->

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])


    <!-- Guest Layout Override -->

    <style>

        html,
        body {

            margin: 0 !important;
            padding: 0 !important;

            width: 100% !important;
            min-height: 100vh !important;

            background: #eef1f4 !important;

            overflow-x: hidden;
        }


        body {

            font-family:
                'Figtree',
                sans-serif;

            color: #0f172a;

            background:
                #eef1f4 !important;
        }


        /*
         * IMPORTANT:
         *
         * This removes the default Laravel Breeze
         * narrow guest container.
         */

        .guest-layout {

            width: 100% !important;

            min-height: 100vh !important;

            margin: 0 !important;
            padding: 0 !important;

            background:
                #eef1f4 !important;
        }


        /*
         * The slot receives your register.blade.php
         */

        .guest-content {

            width: 100% !important;

            min-height: 100vh !important;

            margin: 0 !important;
            padding: 0 !important;

            background:
                transparent !important;

            box-sizing: border-box;
        }

    </style>

</head>


<body>


    <!-- =====================================================
         GUEST LAYOUT
    ====================================================== -->

    <div class="guest-layout">


        <!-- =================================================
             PAGE CONTENT
        ================================================== -->

        <main class="guest-content">

            {{ $slot }}

        </main>


    </div>


</body>

</html>