<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">


<title>
CampusResearchHub
</title>



@vite([
'resources/css/app.css',
'resources/css/theme.css',
'resources/js/app.js'
])


</head>



<body class="bg-slate-50 text-slate-800">





{{-- NAVBAR --}}


<nav class="bg-white shadow-sm border-b">


<div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">





{{-- BRAND --}}


<div class="flex items-center gap-4">


<img
src="{{ asset('images/logo.png') }}"
class="h-12 w-auto"
alt="CampusResearchHub">



<div>


<h1 class="font-bold text-xl text-teal-700">

CampusResearchHub

</h1>


<p class="text-xs text-slate-500">

Research Platform

</p>



</div>


</div>








{{-- AUTH BUTTONS --}}


<div class="flex gap-4 items-center">



@auth



<a href="{{ route('dashboard') }}"
class="px-5 py-2 rounded-xl bg-teal-600 text-white">

Dashboard

</a>






<form method="POST" action="{{ route('logout') }}">

@csrf


<button
type="submit"
class="px-5 py-2 rounded-xl border border-red-500 text-red-600">

Logout

</button>


</form>





@else




<a href="{{ route('login') }}"
class="px-5 py-2 rounded-xl border border-teal-600 text-teal-700">

Login

</a>





<a href="{{ route('register') }}"
class="px-5 py-2 rounded-xl bg-teal-600 text-white">

Register

</a>





@endauth



</div>



</div>


</nav>









{{-- HERO --}}


<section class="max-w-7xl mx-auto px-6 py-24">



<div class="grid md:grid-cols-2 gap-12 items-center">





<div>


<h1 class="text-6xl font-bold leading-tight text-slate-800">

Discover.
Collaborate.
<br>

Innovate.

</h1>




<p class="mt-8 text-xl text-slate-600 leading-relaxed">

CampusResearchHub connects researchers, students and academic communities through projects, papers, datasets and discussions.

</p>





<div class="mt-8 flex gap-5">



<a href="{{ route('research.public') }}"
class="px-8 py-4 rounded-xl bg-teal-600 text-white font-semibold">

Explore Research

</a>





<a href="{{ route('research.search') }}"
class="px-8 py-4 rounded-xl border border-teal-600 text-teal-700">

Search

</a>



</div>



</div>








<div>


<div class="bg-gradient-to-br from-teal-600 to-cyan-500
rounded-3xl p-12 text-white text-center shadow-xl">


<div class="text-7xl mb-6">

🔬

</div>



<h2 class="text-3xl font-bold">

Academic Research Hub

</h2>



<p class="mt-4 text-lg">

Manage research projects, share knowledge and build collaboration.

</p>



</div>



</div>





</div>


</section>









{{-- FEATURES --}}


<section class="max-w-7xl mx-auto px-6 pb-20">



<div class="grid md:grid-cols-4 gap-6">



<div class="bg-white rounded-2xl shadow p-6">

<div class="text-4xl mb-4">

📁

</div>


<h3 class="font-bold text-xl">

Projects

</h3>


<p class="text-slate-500 mt-2">

Create and manage research projects.

</p>


</div>







<div class="bg-white rounded-2xl shadow p-6">

<div class="text-4xl mb-4">

📄

</div>


<h3 class="font-bold text-xl">

Research Papers

</h3>


<p class="text-slate-500 mt-2">

Publish and explore academic papers.

</p>


</div>







<div class="bg-white rounded-2xl shadow p-6">

<div class="text-4xl mb-4">

📊

</div>


<h3 class="font-bold text-xl">

Datasets

</h3>


<p class="text-slate-500 mt-2">

Share research datasets.

</p>


</div>







<div class="bg-white rounded-2xl shadow p-6">

<div class="text-4xl mb-4">

💬

</div>


<h3 class="font-bold text-xl">

Discussions

</h3>


<p class="text-slate-500 mt-2">

Collaborate with researchers.

</p>


</div>





</div>



</section>





</body>

</html>