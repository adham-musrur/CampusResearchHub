<div class="sidebar-wrapper">


    {{-- LOGO --}}

    <div class="sidebar-logo">

        <a href="{{ route('dashboard') }}">

            <img src="{{ asset('images/logo.png') }}"
                 alt="CampusResearchHub Logo">

        </a>


    </div>



    {{-- MENU --}}

    <div class="sidebar-menu">


        <a href="{{ route('dashboard') }}">
            <span>▣</span>
            Dashboard
        </a>


        <a href="{{ route('projects.index') }}">
            <span>◉</span>
            Projects
        </a>


        <a href="{{ route('papers.index') }}">
            <span>📄</span>
            Research Papers
        </a>


        <a href="{{ route('datasets.index') }}">
            <span>📊</span>
            Datasets
        </a>


        <a href="{{ route('updates.index') }}">
            <span>📝</span>
            Updates
        </a>


        <a href="#">
            <span>💬</span>
            Discussions
        </a>



        @if(auth()->user()->role === 'admin')

        <hr>


        <small>
            ADMINISTRATION
        </small>


        <a href="{{ route('admin.users.index') }}">
            <span>👥</span>
            User Management
        </a>


        @endif


        <hr>


        <a href="{{ route('research.public') }}">
            🌐 Public Research
        </a>


        <a href="{{ route('research.search') }}">
            🔍 Search
        </a>


    </div>



</div>