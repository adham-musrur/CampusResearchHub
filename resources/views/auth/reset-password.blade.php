<x-guest-layout>

<div class="login-page">


<div class="login-card">



<div class="login-logo">

<img
src="{{ asset('images/logo.png') }}"
alt="Campus Research Hub Logo"
onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
>


<div class="login-logo-placeholder" style="display:none;">
🔬
</div>


</div>





<h1 class="login-title">

Create New Password

</h1>


<p class="login-subtitle">

Secure your CampusResearchHub account

</p>






<form method="POST" action="{{ route('password.store') }}">

@csrf


<input
type="hidden"
name="token"
value="{{ $request->route('token') }}">





<div>


<x-input-label
for="email"
:value="__('Email')"
/>


<x-text-input

id="email"

class="block mt-1 w-full"

type="email"

name="email"

:value="old('email', $request->email)"

required

autofocus

autocomplete="username"

/>


<x-input-error
:messages="$errors->get('email')"
class="mt-2"
/>


</div>








<div class="mt-4">


<x-input-label
for="password"
:value="__('Password')"
/>


<x-text-input

id="password"

class="block mt-1 w-full"

type="password"

name="password"

required

autocomplete="new-password"

/>


<x-input-error
:messages="$errors->get('password')"
class="mt-2"
/>


</div>








<div class="mt-4">


<x-input-label
for="password_confirmation"
:value="__('Confirm Password')"
/>



<x-text-input

id="password_confirmation"

class="block mt-1 w-full"

type="password"

name="password_confirmation"

required

autocomplete="new-password"

/>



<x-input-error
:messages="$errors->get('password_confirmation')"
class="mt-2"
/>


</div>









<div class="login-actions">


<a
href="{{ route('login') }}"
class="forgot-password">

Back to Login

</a>





<button
type="submit"
class="login-submit">

Reset Password

</button>


</div>






</form>


</div>


</div>


</x-guest-layout>