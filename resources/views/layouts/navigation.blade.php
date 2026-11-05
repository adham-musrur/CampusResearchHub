@auth

<div class="sidebar-wrapper">


    {{-- LOGO --}}

    <div class="sidebar-logo">

        <a href="{{ route('dashboard') }}">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="CampusResearchHub Logo">


            <div>

                <h2>
                    CampusResearchHub
                </h2>

                <p>
                    Research Platform
                </p>

            </div>


        </a>

    </div>





    {{-- USER PROFILE --}}

    <div class="sidebar-user">


        <div class="avatar">

            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

        </div>



        <div>

            <h4>

                {{ auth()->user()->name }}

            </h4>


            <span>

                {{ ucfirst(auth()->user()->role) }}

            </span>


        </div>


    </div>








    {{-- MENU --}}

    <div class="sidebar-menu">


        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <span>▣</span>

            Dashboard

        </a>





        <a href="{{ route('projects.index') }}"
           class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">

            <span>◉</span>

            Projects

        </a>






        <a href="{{ route('papers.index') }}"
           class="{{ request()->routeIs('papers.*') ? 'active' : '' }}">

            <span>📄</span>

            Research Papers

        </a>






        <a href="{{ route('datasets.index') }}"
           class="{{ request()->routeIs('datasets.*') ? 'active' : '' }}">

            <span>📊</span>

            Datasets

        </a>






        <a href="{{ route('updates.index') }}"
           class="{{ request()->routeIs('updates.*') ? 'active' : '' }}">

            <span>📝</span>

            Updates

        </a>






        <a href="#">

            <span>💬</span>

            Discussions

        </a>







        @if(auth()->user()->role === 'admin')


            <div class="sidebar-divider"></div>


            <div class="sidebar-title">

                Administration

            </div>





            <a href="{{ route('admin.users.index') }}"
               class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">

                <span>👥</span>

                User Management

            </a>



        @endif







        <div class="sidebar-divider"></div>





        <a href="{{ route('research.public') }}">

            <span>🌐</span>

            Public Research

        </a>





        <a href="{{ route('research.search') }}">

            <span>🔍</span>

            Search

        </a>




    </div>









    {{-- LOGOUT --}}


    <div class="sidebar-footer">


        <form method="POST"
              action="{{ route('logout') }}">


            @csrf



            <button type="submit">

                🚪 Logout

            </button>



        </form>


    </div>





</div>


@endauth