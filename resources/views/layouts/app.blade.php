<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">


<title>
{{ config('app.name', 'CampusResearchHub') }}
</title>



<link rel="preconnect" href="https://fonts.bunny.net">

<link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
rel="stylesheet" />



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


<aside class="sidebar-container">


@include('layouts.navigation')


</aside>







{{-- CONTENT AREA --}}


<div class="dashboard-content">







{{-- TOP HEADER --}}


<header class="dashboard-header">



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





{{-- NOTIFICATION --}}


<a href="{{ route('notifications.index') }}"
class="relative text-2xl hover:scale-110 transition">


🔔



@if(auth()->user()->unreadNotifications->count() > 0)


<span
class="absolute -top-2 -right-3
bg-red-600 text-white
text-xs font-bold
rounded-full
px-2 py-1">


{{ auth()->user()->unreadNotifications->count() }}


</span>


@endif



</a>








{{-- USER INFO --}}


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


<main class="dashboard-main">


{{ $slot }}


</main>






</div>






</div>





</body>

</html>