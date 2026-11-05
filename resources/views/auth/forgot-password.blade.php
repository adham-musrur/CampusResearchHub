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

Reset Password

</h1>


<p class="login-subtitle">

Recover your CampusResearchHub account

</p>








<div class="login-status">

<x-auth-session-status
:status="session('status')"
/>

</div>







<p class="text-sm text-gray-600 mb-6 text-center">

{{ __('Forgot your password? No problem. Enter your email address and we will send you a password reset link.') }}

</p>







<form method="POST"
action="{{ route('password.email') }}">


@csrf





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

:value="old('email')"

required

autofocus

/>


<x-input-error
:messages="$errors->get('email')"
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


Send Reset Link


</button>



</div>




</form>




</div>


</div>


</x-guest-layout>