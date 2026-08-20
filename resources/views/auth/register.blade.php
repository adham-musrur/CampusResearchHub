<x-guest-layout>

<style>

    /* =========================================================
       GLOBAL PAGE
    ========================================================= */

    html,
    body {
        margin: 0 !important;
        padding: 0 !important;

        width: 100% !important;
        min-height: 100% !important;

        background: #eef1f4 !important;

        overflow-x: hidden;
    }

    body {
        color: #0f172a;
    }


    /* =========================================================
       MAIN REGISTER PAGE
    ========================================================= */

    .register-page {

        position: relative !important;

        /*
         * IMPORTANT:
         * Escape the narrow Laravel Breeze guest container.
         */
        width: min(1200px, calc(100vw - 48px)) !important;

        min-width: 0 !important;

        min-height: calc(100vh - 48px) !important;

        /*
         * Center according to the browser viewport.
         */
        left: 50% !important;

        transform: translateX(-50%) !important;

        margin-left: 0 !important;
        margin-right: 0 !important;

        margin-top: 24px !important;
        margin-bottom: 24px !important;

        background: #ffffff !important;

        border-radius: 24px;

        box-shadow:
            0 12px 45px rgba(15, 23, 42, .10);

        color: #0f172a;

        overflow: hidden;

        box-sizing: border-box;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .register-header {

        width: 100%;

        background: #ffffff;

        text-align: center;

        padding:
            42px 30px 20px;

        box-sizing: border-box;
    }


    /* =========================================================
       LOGO
    ========================================================= */

    .register-logo {

        display: flex;

        justify-content: center;
        align-items: center;

        margin-bottom: 15px;
    }

    .register-logo img {

        width: 72px;
        height: 72px;

        object-fit: contain;

        display: block;
    }


    /* =========================================================
       LOGO FALLBACK
    ========================================================= */

    .logo-placeholder {

        width: 72px;
        height: 72px;

        display: flex;

        justify-content: center;
        align-items: center;

        border-radius: 16px;

        background:
            rgb(4, 134, 144);

        color: #ffffff;

        font-size: 32px;

        box-shadow:
            0 8px 20px
            rgba(4, 134, 144, .18);
    }


    /* =========================================================
       MAIN TITLE
    ========================================================= */

    .register-title {

        margin: 0;

        color:
            rgb(4, 134, 144) !important;

        font-size: 42px;

        font-weight: 800;

        line-height: 1.2;

        letter-spacing: -0.8px;
    }


    /* =========================================================
       SUBTITLE
    ========================================================= */

    .register-subtitle {

        margin:
            10px 0 0;

        color:
            #475569 !important;

        font-size: 17px;

        font-weight: 500;
    }


    /* =========================================================
       MAIN CONTENT
    ========================================================= */

    .register-content {

        width: 100%;

        box-sizing: border-box;

        padding:
            25px 45px 55px;
    }


    /* =========================================================
       COMMUNITY HEADING
    ========================================================= */

    .role-heading {

        text-align: center;

        margin-bottom: 30px;
    }


    .role-heading h2 {

        margin: 0;

        color:
            #0f172a !important;

        font-size: 30px;

        font-weight: 800;

        line-height: 1.25;
    }


    .role-heading p {

        margin:
            10px 0 0;

        color:
            #64748b !important;

        font-size: 16px;
    }


    /* =========================================================
       ROLE GRID
       LANDSCAPE / THREE COLUMNS
    ========================================================= */

    .role-grid {

        width: 100%;

        max-width: 1060px;

        margin:
            0 auto;

        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 22px;

        align-items: stretch;
    }


    /* =========================================================
       ROLE CARD
    ========================================================= */

    .role-card {

        position: relative;

        min-height: 370px;

        background:
            #ffffff;

        border:
            1px solid #e2e8f0;

        border-radius: 18px;

        overflow: hidden;

        cursor: pointer;

        display: flex;

        flex-direction: column;

        text-align: center;

        box-shadow:
            0 8px 25px
            rgba(15, 23, 42, .07);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }


    /* =========================================================
       CARD HOVER
    ========================================================= */

    .role-card:hover {

        transform:
            translateY(-6px);

        border-color:
            rgb(4, 134, 144);

        box-shadow:
            0 16px 35px
            rgba(15, 23, 42, .13);
    }


    /* =========================================================
       CARD TOP
    ========================================================= */

    .role-card-top {

        height: 145px;

        flex-shrink: 0;

        display: flex;

        justify-content: center;
        align-items: center;

        color:
            #ffffff;
    }


    /* =========================================================
       STUDENT
    ========================================================= */

    .student .role-card-top {

        background:
            rgb(37, 99, 235);
    }


    /* =========================================================
       FACULTY
    ========================================================= */

    .faculty .role-card-top {

        background:
            rgb(4, 134, 144);
    }


    /* =========================================================
       SUPERVISOR
    ========================================================= */

    .supervisor .role-card-top {

        background:
            rgb(124, 58, 237);
    }


    /* =========================================================
       ROLE ICON
    ========================================================= */

    .role-icon {

        width: 78px;
        height: 78px;

        display: flex;

        justify-content: center;
        align-items: center;

        border-radius: 50%;

        background:
            rgba(255, 255, 255, .16);

        border:
            2px solid
            rgba(255, 255, 255, .45);

        font-size: 35px;

        box-shadow:
            0 8px 20px
            rgba(0, 0, 0, .10);

        transition:
            transform .25s ease;
    }


    .role-card:hover .role-icon {

        transform:
            scale(1.08);
    }


    /* =========================================================
       CARD BODY
    ========================================================= */

    .role-card-body {

        flex: 1;

        padding:
            25px 22px 25px;

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: space-between;

        box-sizing: border-box;
    }


    /* =========================================================
       CARD TITLE
    ========================================================= */

    .role-card-body h3 {

        margin:
            0 0 10px;

        color:
            #0f172a !important;

        font-size: 23px;

        font-weight: 800;
    }


    /* =========================================================
       CARD DESCRIPTION
    ========================================================= */

    .role-card-body p {

        margin:
            0 auto 22px;

        max-width: 290px;

        color:
            #475569 !important;

        font-size: 14px;

        line-height: 1.65;
    }


    /* =========================================================
       REGISTER BUTTON
    ========================================================= */

    .role-select {

        display: inline-flex;

        align-items: center;
        justify-content: center;

        min-width: 175px;

        padding:
            11px 20px;

        border-radius: 9px;

        color:
            #ffffff !important;

        font-size: 14px;

        font-weight: 700;

        text-decoration: none;

        transition:
            transform .2s ease,
            filter .2s ease;
    }


    .role-card:hover .role-select {

        transform:
            translateY(-2px);

        filter:
            brightness(.95);
    }


    /* =========================================================
       BUTTON COLORS
    ========================================================= */

    .student .role-select {

        background:
            rgb(37, 99, 235);
    }


    .faculty .role-select {

        background:
            rgb(4, 134, 144);
    }


    .supervisor .role-select {

        background:
            rgb(124, 58, 237);
    }


    /* =========================================================
       REGISTRATION FORM
    ========================================================= */

    #registrationForm {

        display: none;

        width: 100%;

        max-width: 650px;

        margin:
            0 auto;
    }


    /* =========================================================
       FORM CARD
    ========================================================= */

    .form-card {

        background:
            #ffffff;

        border:
            1px solid #e2e8f0;

        border-radius: 20px;

        padding:
            40px;

        box-shadow:
            0 15px 45px
            rgba(15, 23, 42, .10);

        box-sizing: border-box;
    }


    /* =========================================================
       FORM TITLE
    ========================================================= */

    .form-card h2 {

        margin: 0;

        text-align: center;

        color:
            #0f172a !important;

        font-size: 28px;

        font-weight: 800;
    }


    /* =========================================================
       FORM ROLE
    ========================================================= */

    .form-role {

        text-align: center;

        margin:
            8px 0 30px;

        color:
            rgb(4, 134, 144) !important;

        font-weight: 700;
    }


    /* =========================================================
       FORM LABEL
    ========================================================= */

    .form-card label {

        color:
            #0f172a !important;

        font-weight: 600;
    }


    /* =========================================================
       FORM INPUT
    ========================================================= */

    .form-card input {

        width: 100%;

        box-sizing: border-box;

        background:
            #ffffff !important;

        color:
            #0f172a !important;

        border:
            1px solid #cbd5e1 !important;

        border-radius: 8px;
    }


    /* =========================================================
       INPUT PLACEHOLDER
    ========================================================= */

    .form-card input::placeholder {

        color:
            #94a3b8 !important;
    }


    /* =========================================================
       INPUT FOCUS
    ========================================================= */

    .form-card input:focus {

        border-color:
            rgb(4, 134, 144) !important;

        box-shadow:
            0 0 0 3px
            rgba(4, 134, 144, .15) !important;
    }


    /* =========================================================
       FORM BUTTON
    ========================================================= */

    .form-card button {

        background:
            rgb(4, 134, 144) !important;

        color:
            #ffffff !important;

        border:
            none !important;

        border-radius:
            8px;
    }


    .form-card button:hover {

        background:
            rgb(2, 94, 101) !important;
    }


    /* =========================================================
       BACK BUTTON
    ========================================================= */

    .back-role {

        display: block;

        margin-top:
            25px;

        text-align:
            center;

        color:
            rgb(4, 134, 144) !important;

        font-size:
            14px;

        font-weight:
            700;

        cursor:
            pointer;

        text-decoration:
            none;
    }


    .back-role:hover {

        text-decoration:
            underline;
    }


    /* =========================================================
       ERROR MESSAGES
    ========================================================= */

    .form-card [class*="text-red"] {

        color:
            #dc2626 !important;
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 1050px) {

        .register-page {

            width:
                calc(100vw - 30px) !important;

            margin-top:
                15px !important;

            margin-bottom:
                15px !important;
        }


        .register-content {

            padding-left:
                25px;

            padding-right:
                25px;
        }


        .role-grid {

            gap:
                16px;
        }


        .role-card {

            min-height:
                350px;
        }


        .role-card-body {

            padding-left:
                15px;

            padding-right:
                15px;
        }


        .role-card-body p {

            font-size:
                13px;
        }
    }


    /* =========================================================
       MOBILE / TABLET
    ========================================================= */

    @media (max-width: 800px) {

        .register-page {

            width:
                calc(100vw - 20px) !important;

            min-height:
                calc(100vh - 20px) !important;

            margin-top:
                10px !important;

            margin-bottom:
                10px !important;

            border-radius:
                18px;
        }


        .register-header {

            padding:
                32px 20px 15px;
        }


        .register-title {

            font-size:
                32px;
        }


        .register-subtitle {

            font-size:
                15px;
        }


        .register-content {

            padding:
                20px 20px 40px;
        }


        .role-heading h2 {

            font-size:
                26px;
        }


        .role-grid {

            grid-template-columns:
                1fr;

            max-width:
                520px;

            gap:
                18px;
        }


        .role-card {

            min-height:
                330px;
        }
    }


    /* =========================================================
       SMALL MOBILE
    ========================================================= */

    @media (max-width: 600px) {

        .register-page {

            width:
                calc(100vw - 12px) !important;

            border-radius:
                14px;
        }


        .register-header {

            padding:
                25px 15px 15px;
        }


        .register-content {

            padding:
                20px 12px 35px;
        }


        .register-logo img,
        .logo-placeholder {

            width:
                62px;

            height:
                62px;
        }


        .register-title {

            font-size:
                27px;
        }


        .register-subtitle {

            font-size:
                14px;
        }


        .role-heading h2 {

            font-size:
                23px;
        }


        .role-heading p {

            font-size:
                14px;
        }


        .role-card {

            min-height:
                315px;
        }


        .form-card {

            padding:
                25px 20px;
        }


        .form-card h2 {

            font-size:
                24px;
        }
    }

</style>


<!-- =========================================================
     MAIN REGISTER PAGE
========================================================= -->

<div class="register-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header class="register-header">


        <!-- =================================================
             LOGO
        ================================================== -->

        <div class="register-logo">

            {{-- 
                YOUR LOGO

                Put your logo here:

                public/images/logo.png
            --}}

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Campus Research Hub Logo"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
            >


            {{-- FALLBACK LOGO --}}

            <div
                class="logo-placeholder"
                style="display:none;"
            >
                🔬
            </div>

        </div>


        <!-- =================================================
             MAIN TITLE
        ================================================== -->

        <h1 class="register-title">
            Campus Research Hub
        </h1>


        <!-- =================================================
             SUBTITLE
        ================================================== -->

        <p class="register-subtitle">
            Connect · Discover · Research · Collaborate
        </p>


    </header>



    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="register-content">


        <!-- =================================================
             ROLE SELECTION
        ================================================== -->

        <section id="roleSelection">


            <!-- =================================================
                 SECTION HEADING
            ================================================== -->

            <div class="role-heading">

                <h2>
                    Join Our Research Community
                </h2>

                <p>
                    Select your role to continue registration
                </p>

            </div>



            <!-- =================================================
                 ROLE CARDS
            ================================================== -->

            <div class="role-grid">


                <!-- =================================================
                     STUDENT CARD
                ================================================== -->

                <div
                    class="role-card student"
                    onclick="openRegistration('student')"
                >


                    <!-- CARD TOP -->

                    <div class="role-card-top">

                        <div class="role-icon">
                            🎓
                        </div>

                    </div>


                    <!-- CARD BODY -->

                    <div class="role-card-body">

                        <div>

                            <h3>
                                Student
                            </h3>


                            <p>
                                Participate in research projects,
                                submit research papers, manage
                                datasets and collaborate with
                                researchers.
                            </p>

                        </div>


                        <span class="role-select">
                            Register as Student
                        </span>

                    </div>

                </div>



                <!-- =================================================
                     FACULTY CARD
                ================================================== -->

                <div
                    class="role-card faculty"
                    onclick="openRegistration('faculty')"
                >


                    <!-- CARD TOP -->

                    <div class="role-card-top">

                        <div class="role-icon">
                            👨‍🏫
                        </div>

                    </div>


                    <!-- CARD BODY -->

                    <div class="role-card-body">

                        <div>

                            <h3>
                                Faculty
                            </h3>


                            <p>
                                Share your research expertise,
                                publish papers, collaborate with
                                students and contribute to
                                academic research.
                            </p>

                        </div>


                        <span class="role-select">
                            Register as Faculty
                        </span>

                    </div>

                </div>



                <!-- =================================================
                     SUPERVISOR CARD
                ================================================== -->

                <div
                    class="role-card supervisor"
                    onclick="openRegistration('supervisor')"
                >


                    <!-- CARD TOP -->

                    <div class="role-card-top">

                        <div class="role-icon">
                            🔬
                        </div>

                    </div>


                    <!-- CARD BODY -->

                    <div class="role-card-body">

                        <div>

                            <h3>
                                Supervisor
                            </h3>


                            <p>
                                Guide research projects,
                                supervise students and monitor
                                research progress.
                            </p>

                        </div>


                        <span class="role-select">
                            Register as Supervisor
                        </span>

                    </div>

                </div>


            </div>

        </section>



        <!-- =================================================
             REGISTRATION FORM
        ================================================== -->

        <section id="registrationForm">


            <div class="form-card">


                <!-- FORM TITLE -->

                <h2>
                    Create Your Account
                </h2>


                <!-- SELECTED ROLE -->

                <div class="form-role">

                    Registering as

                    <span id="roleName"></span>

                </div>



                <!-- =================================================
                     REGISTRATION FORM
                ================================================== -->

                <form
                    method="POST"
                    action="{{ route('register') }}"
                >

                    @csrf


                    <!-- =================================================
                         ROLE
                    ================================================== -->

                    <input
                        type="hidden"
                        id="role"
                        name="role"
                    >



                    <!-- =================================================
                         NAME
                    ================================================== -->

                    <div>

                        <x-input-label
                            for="name"
                            :value="__('Name')"
                        />


                        <x-text-input
                            id="name"
                            class="block mt-1 w-full"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                        />


                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2"
                        />

                    </div>



                    <!-- =================================================
                         EMAIL
                    ================================================== -->

                    <div class="mt-4">

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
                            autocomplete="new-password"
                        />


                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />

                    </div>



                    <!-- =================================================
                         CONFIRM PASSWORD
                    ================================================== -->

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



                    <!-- =================================================
                         FORM BUTTONS
                    ================================================== -->

                    <div
                        class="flex items-center justify-between mt-6"
                    >


                        <!-- LOGIN LINK -->

                        <a
                            href="{{ route('login') }}"
                            style="color: rgb(4,134,144);"
                            class="text-sm underline"
                        >
                            Already registered?
                        </a>


                        <!-- REGISTER BUTTON -->

                        <x-primary-button>

                            Register

                        </x-primary-button>


                    </div>

                </form>



                <!-- =================================================
                     BACK TO ROLE SELECTION
                ================================================== -->

                <span
                    class="back-role"
                    onclick="showRoles()"
                >
                    ← Choose a different role
                </span>


            </div>

        </section>


    </main>

</div>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>


    /* =========================================================
       OPEN REGISTRATION FORM
    ========================================================= */

    function openRegistration(role) {


        const roleSelection =
            document.getElementById('roleSelection');


        const registrationForm =
            document.getElementById('registrationForm');


        const roleInput =
            document.getElementById('role');


        const roleName =
            document.getElementById('roleName');



        /* Hide role cards */

        roleSelection.style.display =
            'none';



        /* Show registration form */

        registrationForm.style.display =
            'block';



        /* Store selected role */

        roleInput.value =
            role;



        /* Display selected role */

        roleName.textContent =
            role.charAt(0).toUpperCase()
            + role.slice(1);



        /* Scroll to top */

        window.scrollTo({

            top: 0,

            behavior: 'smooth'

        });

    }



    /* =========================================================
       SHOW ROLE CARDS AGAIN
    ========================================================= */

    function showRoles() {


        const roleSelection =
            document.getElementById('roleSelection');


        const registrationForm =
            document.getElementById('registrationForm');



        /* Hide form */

        registrationForm.style.display =
            'none';



        /* Show role selection */

        roleSelection.style.display =
            'block';



        /* Scroll to top */

        window.scrollTo({

            top: 0,

            behavior: 'smooth'

        });

    }


</script>


</x-guest-layout>