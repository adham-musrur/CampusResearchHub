<nav x-data="{ open: false }"
class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


<div class="flex justify-between h-16">


{{-- LEFT SIDE --}}

<div class="flex items-center">


{{-- Logo --}}

<div class="shrink-0 flex items-center">

<a href="{{ url('/') }}">

<x-application-logo
class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
/>

</a>

</div>




{{-- DESKTOP NAVIGATION --}}

<div class="hidden sm:flex sm:items-center sm:ms-8 space-x-6">


@auth


<x-nav-link
:href="route('dashboard')"
:active="request()->routeIs('dashboard')">

Dashboard

</x-nav-link>



<x-nav-link
:href="route('projects.index')"
:active="request()->routeIs('projects.*')">

Projects

</x-nav-link>



<x-nav-link
:href="route('papers.index')"
:active="request()->routeIs('papers.*')">

Papers

</x-nav-link>



<x-nav-link
:href="route('datasets.index')"
:active="request()->routeIs('datasets.*')">

Datasets

</x-nav-link>



<x-nav-link
:href="route('updates.index')"
:active="request()->routeIs('updates.*')">

Updates

</x-nav-link>


@endauth





<x-nav-link
:href="route('research.public')"
:active="request()->routeIs('research.public')">

Research

</x-nav-link>



<x-nav-link
:href="route('research.search')">

Search

</x-nav-link>


</div>


</div>







{{-- RIGHT SIDE --}}

<div class="hidden sm:flex sm:items-center sm:ms-6">


@auth



{{-- Notification Bell --}}

<x-dropdown align="right" width="80">


<x-slot name="trigger">


<button
class="relative mr-5 text-gray-600 dark:text-gray-300">

🔔


@if($notifications->count())


<span class="absolute -top-2 -right-2
bg-red-600 text-white text-xs
rounded-full px-2">


{{ $notifications->count() }}


</span>


@endif


</button>


</x-slot>




<x-slot name="content">



@if($notifications->count())



@foreach($notifications as $notification)



<div class="px-4 py-3 border-b">


<p class="text-sm text-gray-800">

{{ $notification->data['message'] }}

</p>


<p class="text-xs text-gray-500 mt-1">

{{ $notification->created_at->diffForHumans() }}

</p>


</div>



@endforeach



@else


<div class="px-4 py-3 text-gray-500">

No notifications

</div>


@endif



</x-slot>



</x-dropdown>







{{-- USER DROPDOWN --}}


<x-dropdown align="right" width="48">


<x-slot name="trigger">


<button
class="inline-flex items-center px-3 py-2
border border-transparent text-sm
font-medium rounded-md text-gray-500
dark:text-gray-400">


<div>

{{ Auth::user()->name }}

</div>



<div class="ms-1">

<svg class="fill-current h-4 w-4"
xmlns="http://www.w3.org/2000/svg"
viewBox="0 0 20 20">


<path
fill-rule="evenodd"
d="M5.293 7.293a1 1 0 011.414 0
L10 10.586l3.293-3.293
a1 1 0 111.414 1.414l-4 4
a1 1 0 01-1.414 0l-4-4
a1 1 0 010-1.414z"
clip-rule="evenodd"/>


</svg>

</div>


</button>


</x-slot>





<x-slot name="content">


<x-dropdown-link :href="route('profile.edit')">

Profile

</x-dropdown-link>




<form method="POST"
action="{{ route('logout') }}">


@csrf



<x-dropdown-link
:href="route('logout')"
onclick="event.preventDefault();
this.closest('form').submit();">


Log Out


</x-dropdown-link>


</form>



</x-slot>



</x-dropdown>



@endauth





@guest


<a href="{{ route('login') }}"
class="text-gray-700 dark:text-gray-300">

Login

</a>



<a href="{{ route('register') }}"
class="ms-5 text-gray-700 dark:text-gray-300">

Register

</a>


@endguest



</div>






{{-- MOBILE BUTTON --}}


<div class="-me-2 flex items-center sm:hidden">


<button
@click="open=!open"
class="p-2 rounded-md text-gray-400">


<svg class="h-6 w-6"
stroke="currentColor"
fill="none"
viewBox="0 0 24 24">


<path
:class="{'hidden':open,'inline-flex':!open}"
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M4 6h16M4 12h16M4 18h16"/>


<path
:class="{'hidden':!open,'inline-flex':open}"
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M6 18L18 6M6 6l12 12"/>


</svg>


</button>


</div>



</div>


</div>






{{-- MOBILE MENU --}}


<div
:class="{'block':open,'hidden':!open}"
class="hidden sm:hidden">


<div class="pt-2 pb-3 space-y-1">


<x-responsive-nav-link
:href="route('research.public')">

Research

</x-responsive-nav-link>



<x-responsive-nav-link
:href="route('research.search')">

Search

</x-responsive-nav-link>



@auth


<x-responsive-nav-link
:href="route('dashboard')">

Dashboard

</x-responsive-nav-link>



<x-responsive-nav-link
:href="route('projects.index')">

Projects

</x-responsive-nav-link>



<x-responsive-nav-link
:href="route('papers.index')">

Papers

</x-responsive-nav-link>



<x-responsive-nav-link
:href="route('datasets.index')">

Datasets

</x-responsive-nav-link>



<x-responsive-nav-link
:href="route('updates.index')">

Updates

</x-responsive-nav-link>


@endauth


</div>





@auth


<div class="border-t pt-4 pb-1">


<div class="px-4">


<div class="font-medium">

{{ Auth::user()->name }}

</div>


<div class="text-sm text-gray-500">

{{ Auth::user()->email }}

</div>


</div>


</div>


@endauth



</div>



</nav>