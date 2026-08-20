<x-guest-layout>

<style>

    /* =========================================================
       LOGIN PAGE
    ========================================================= */

    .login-page {

        width: 100%;

        min-height: 100vh;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 40px 20px;

        box-sizing: border-box;

        background: #eef1f4;
    }


    /* =========================================================
       LOGIN CARD
    ========================================================= */

    .login-card {

        width: 100%;

        max-width: 520px;

        background: #ffffff;

        border: 1px solid #e2e8f0;

        border-radius: 22px;

        padding: 42px;

        box-sizing: border-box;

        box-shadow:
            0 15px 45px
            rgba(15, 23, 42, .10);
    }


    /* =========================================================
       LOGO
    ========================================================= */

    .login-logo {

        display: flex;

        justify-content: center;

        align-items: center;

        margin-bottom: 18px;
    }


    .login-logo img {

        width: 72px;

        height: 72px;

        object-fit: contain;

        display: block;
    }


    .login-logo-placeholder {

        width: 72px;

        height: 72px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 16px;

        background: rgb(4, 134, 144);

        color: #ffffff;

        font-size: 32px;
    }


    /* =========================================================
       TITLE
    ========================================================= */

    .login-title {

        margin: 0;

        text-align: center;

        color: rgb(4, 134, 144) !important;

        font-size: 32px;

        font-weight: 800;

        line-height: 1.2;
    }


    .login-subtitle {

        margin: 9px 0 30px;

        text-align: center;

        color: #64748b !important;

        font-size: 15px;

        font-weight: 500;
    }


    /* =========================================================
       SESSION MESSAGE
    ========================================================= */

    .login-status {

        margin-bottom: 18px;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .login-card label {

        color: #0f172a !important;

        font-weight: 600;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .login-card input[type="email"],
    .login-card input[type="password"] {

        width: 100%;

        box-sizing: border-box;

        background: #ffffff !important;

        color: #0f172a !important;

        border:
            1px solid #cbd5e1 !important;

        border-radius: 8px;

        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }


    .login-card input[type="email"]:focus,
    .login-card input[type="password"]:focus {

        border-color:
            rgb(4, 134, 144) !important;

        box-shadow:
            0 0 0 3px
            rgba(4, 134, 144, .15) !important;

        outline: none;
    }


    /* =========================================================
       REMEMBER ME
    ========================================================= */

    .remember-row {

        margin-top: 18px;
    }


    .remember-row label {

        display: inline-flex;

        align-items: center;

        cursor: pointer;
    }


    .remember-row input[type="checkbox"] {

        width: 16px;

        height: 16px;

        accent-color:
            rgb(4, 134, 144);
    }


    .remember-row span {

        margin-left: 8px;

        color: #64748b !important;

        font-size: 14px;
    }


    /* =========================================================
       ACTION BUTTONS
    ========================================================= */

    .login-actions {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        margin-top: 28px;
    }


    /* =========================================================
       FORGOT PASSWORD
    ========================================================= */

    .forgot-password {

        color:
            rgb(4, 134, 144) !important;

        font-size: 14px;

        font-weight: 600;

        text-decoration: none;
    }


    .forgot-password:hover {

        text-decoration: underline;
    }


    /* =========================================================
       LOGIN BUTTON
    ========================================================= */

    .login-submit {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-width: 125px;

        padding:
            11px 22px;

        border-radius: 8px;

        background:
            rgb(4, 134, 144) !important;

        color:
            #ffffff !important;

        border: none;

        font-size: 14px;

        font-weight: 700;

        cursor: pointer;

        transition:
            background .2s ease,
            transform .2s ease;
    }


    .login-submit:hover {

        background:
            rgb(2, 94, 101) !important;

        transform:
            translateY(-2px);
    }


    /* =========================================================
       REGISTER LINK
    ========================================================= */

    .register-back {

        display: block;

        margin-top: 25px;

        padding-top: 20px;

        border-top:
            1px solid #e2e8f0;

        text-align: center;

        color:
            #64748b !important;

        font-size: 14px;
    }


    .register-back a {

        color:
            rgb(4, 134, 144) !important;

        font-weight: 700;

        text-decoration: none;
    }


    .register-back a:hover {

        text-decoration: underline;
    }


    /* =========================================================
       ERROR MESSAGES
    ========================================================= */

    .login-card [class*="text-red"] {

        color:
            #dc2626 !important;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 600px) {

        .login-page {

            padding:
                25px 15px;
        }


        .login-card {

            padding:
                30px 22px;

            border-radius:
                18px;
        }


        .login-title {

            font-size:
                28px;
        }


        .login-subtitle {

            font-size:
                14px;
        }


        .login-actions {

            flex-direction:
                column;

            align-items:
                stretch;
        }


        .forgot-password {

            text-align:
                center;
        }


        .login-submit {

            width:
                100%;
        }
    }

</style>


<!-- =========================================================
     LOGIN PAGE
========================================================= -->

<div class="login-page">


    <!-- =====================================================
         LOGIN CARD
    ====================================================== -->

    <div class="login-card">


        <!-- =================================================
             LOGO
        ================================================== -->

        <div class="login-logo">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Campus Research Hub Logo"
                onerror="
                    this.style.display='none';
                    this.nextElementSibling.style.display='flex';
                "
            >


            <div
                class="login-logo-placeholder"
                style="display:none;"
            >
                🔬
            </div>

        </div>


        <!-- =================================================
             TITLE
        ================================================== -->

        <h1 class="login-title">
            Campus Research Hub
        </h1>


        <p class="login-subtitle">
            Welcome back · Continue your research journey
        </p>


        <!-- =================================================
             SESSION STATUS
        ================================================== -->

        <div class="login-status">

            <x-auth-session-status
                :status="session('status')"
            />

        </div>


        <!-- =================================================
             LOGIN FORM
        ================================================== -->

        <form
            method="POST"
            action="{{ route('login') }}"
        >

            @csrf


            <!-- =================================================
                 EMAIL
            ================================================== -->

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
                    autocomplete="username"
                />


                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />

            </div>


            <!-- =================================================
                 PASSWORD
            ================================================== -->

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
                    autocomplete="current-password"
                />


                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />

            </div>


            <!-- =================================================
                 REMEMBER ME
            ================================================== -->

            <div class="remember-row">

                <label for="remember_me">

                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                    >

                    <span>
                        {{ __('Remember me') }}
                    </span>

                </label>

            </div>


            <!-- =================================================
                 ACTIONS
            ================================================== -->

            <div class="login-actions">


                <!-- FORGOT PASSWORD -->

                @if (Route::has('password.request'))

                    <a
                        class="forgot-password"
                        href="{{ route('password.request') }}"
                    >
                        {{ __('Forgot your password?') }}
                    </a>

                @endif


                <!-- LOGIN -->

                <button
                    type="submit"
                    class="login-submit"
                >
                    {{ __('Log in') }}
                </button>


            </div>

        </form>


        <!-- =================================================
             BACK TO REGISTER
        ================================================== -->

        <div class="register-back">

            Don't have an account?

            <a href="{{ route('register') }}">
                Register here
            </a>

        </div>


    </div>

</div>


</x-guest-layout>