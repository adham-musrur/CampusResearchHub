<x-app-layout>

<div class="p-6">

<h1 class="text-2xl font-bold">
Student Dashboard
</h1>

<p>
Welcome {{ auth()->user()->name }}
</p>


<div class="mt-5">

<ul>
<li>📚 Browse Research Papers</li>
<li>🔬 Join Research Projects</li>
<li>📂 Upload Dataset</li>
<li>💬 Project Discussion</li>
</ul>

</div>

</div>

</x-app-layout>