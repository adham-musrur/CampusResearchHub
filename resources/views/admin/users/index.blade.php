<x-app-layout>

    <style>

        /* =====================================================
           PAGE
        ====================================================== */

        .users-page {
            min-height: calc(100vh - 64px);
            background: #eef5ff;
            padding: 40px 48px 60px;
        }


        /* =====================================================
           HEADER
        ====================================================== */

        .users-header {
            background: #ffffff;
            padding: 30px 48px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            border-bottom: 1px solid #e5edf5;

            margin: -40px -48px 40px;
        }

        .users-header-title {
            margin: 0;

            color: #056f78;

            font-size: 26px;
            font-weight: 800;

            line-height: 1.2;
        }


        /* =====================================================
           ADD USER BUTTON
        ====================================================== */

        .add-user-button {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 13px 22px;

            background: #078c98;

            color: #ffffff !important;

            border-radius: 10px;

            font-size: 16px;
            font-weight: 700;

            text-decoration: none;

            transition: all .2s ease;
        }

        .add-user-button:hover {
            background: #067782;

            transform: translateY(-2px);

            box-shadow:
                0 8px 18px rgba(7, 140, 152, .20);
        }


        /* =====================================================
           ALERTS
        ====================================================== */

        .users-alert {
            max-width: 1500px;

            margin: 0 auto 20px;

            padding: 14px 18px;

            border-radius: 10px;

            font-size: 14px;
            font-weight: 600;
        }

        .users-alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .users-alert-error {
            background: #fee2e2;
            color: #991b1b;
        }


        /* =====================================================
           MAIN CONTAINER
        ====================================================== */

        .users-container {
            width: 100%;

            max-width: 1500px;

            margin: 0 auto;
        }


        /* =====================================================
           FILTER CARD
        ====================================================== */

        .users-filter-card {
            background: #ffffff;

            border-radius: 14px;

            padding: 32px 36px;

            box-shadow:
                0 5px 20px rgba(15, 23, 42, .06);

            margin-bottom: 28px;
        }

        .users-filter-row {
            display: flex;

            align-items: center;

            gap: 30px;
        }


        /* =====================================================
           ALL USERS TITLE
        ====================================================== */

        .users-filter-title {
            flex-shrink: 0;

            min-width: 145px;

            color: #056f78;

            font-size: 23px;

            font-weight: 800;

            line-height: 1.2;
        }


        /* =====================================================
           SEARCH FORM
        ====================================================== */

        .users-search-form {
            flex: 1;

            display: flex;

            align-items: center;

            gap: 14px;
        }


        /* =====================================================
           SEARCH INPUT
        ====================================================== */

        .users-search-input {
            width: 100%;

            max-width: 450px;

            height: 52px;

            box-sizing: border-box;

            padding: 0 18px;

            background: #ffffff !important;

            color: #0f172a !important;

            border: 1px solid #cbd5e1 !important;

            border-radius: 10px;

            font-size: 16px;

            outline: none;
        }

        .users-search-input::placeholder {
            color: #94a3b8;
        }

        .users-search-input:focus {
            border-color: #078c98 !important;

            box-shadow:
                0 0 0 3px rgba(7, 140, 152, .12) !important;
        }


        /* =====================================================
           ROLE SELECT
        ====================================================== */

        .users-role-select {
            width: 220px;

            height: 52px;

            padding: 0 16px;

            background: #ffffff !important;

            color: #0f172a !important;

            border: 1px solid #cbd5e1 !important;

            border-radius: 10px;

            font-size: 16px;

            cursor: pointer;

            outline: none;
        }

        .users-role-select:focus {
            border-color: #078c98 !important;

            box-shadow:
                0 0 0 3px rgba(7, 140, 152, .12) !important;
        }


        /* =====================================================
           SEARCH BUTTON
        ====================================================== */

        .users-search-button {
            height: 52px;

            padding: 0 24px;

            border: none;

            border-radius: 10px;

            background: #078c98;

            color: #ffffff;

            font-size: 16px;

            font-weight: 700;

            cursor: pointer;

            transition: all .2s ease;
        }

        .users-search-button:hover {
            background: #067782;

            transform: translateY(-1px);
        }


        /* =====================================================
           RESET BUTTON
        ====================================================== */

        .users-reset-button {
            height: 52px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 0 23px;

            border-radius: 10px;

            background: #64748b;

            color: #ffffff !important;

            font-size: 16px;

            font-weight: 700;

            text-decoration: none;

            transition: all .2s ease;
        }

        .users-reset-button:hover {
            background: #475569;

            transform: translateY(-1px);
        }


        /* =====================================================
           TABLE CARD
        ====================================================== */

        .users-table-card {
            background: #ffffff;

            border-radius: 14px;

            padding: 30px;

            box-shadow:
                0 5px 20px rgba(15, 23, 42, .06);

            overflow: hidden;
        }


        /* =====================================================
           TABLE WRAPPER
        ====================================================== */

        .users-table-wrapper {
            width: 100%;

            overflow-x: auto;
        }


        /* =====================================================
           TABLE
        ====================================================== */

        .users-table {
            width: 100%;

            min-width: 950px;

            border-collapse: collapse;

            table-layout: fixed;
        }


        .users-table th:nth-child(1),
        .users-table td:nth-child(1) {
            width: 7%;
        }

        .users-table th:nth-child(2),
        .users-table td:nth-child(2) {
            width: 15%;
        }

        .users-table th:nth-child(3),
        .users-table td:nth-child(3) {
            width: 28%;
        }

        .users-table th:nth-child(4),
        .users-table td:nth-child(4) {
            width: 14%;
        }

        .users-table th:nth-child(5),
        .users-table td:nth-child(5) {
            width: 16%;
        }

        .users-table th:nth-child(6),
        .users-table td:nth-child(6) {
            width: 20%;
        }


        /* =====================================================
           TABLE HEADER
        ====================================================== */

        .users-table thead {
            background: #dff6f8;
        }

        .users-table th {
            padding: 18px;

            text-align: left;

            color: #056f78;

            font-size: 16px;

            font-weight: 800;

            border-bottom: 1px solid #c7e7ea;
        }


        /* =====================================================
           TABLE BODY
        ====================================================== */

        .users-table td {
            padding: 22px 18px;

            color: #334155;

            font-size: 15px;

            border-bottom: 1px solid #e2e8f0;

            vertical-align: middle;
        }

        .users-table tbody tr:last-child td {
            border-bottom: none;
        }

        .users-table tbody tr:hover {
            background: #f8fafc;
        }


        /* =====================================================
           USER NAME
        ====================================================== */

        .user-name {
            color: #056f78;

            font-weight: 700;
        }


        /* =====================================================
           ROLE BADGES
        ====================================================== */

        .role-badge {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 7px 16px;

            border-radius: 999px;

            font-size: 13px;

            font-weight: 700;
        }

        .role-student {
            background: #dcfce7;

            color: #15803d;
        }

        .role-faculty {
            background: #dbeafe;

            color: #1d4ed8;
        }

        .role-supervisor {
            background: #ede9fe;

            color: #6d28d9;
        }

        .role-admin {
            background: #fee2e2;

            color: #b91c1c;
        }


        /* =====================================================
           ACTIONS
        ====================================================== */

        .user-actions {
            display: flex;

            align-items: center;

            gap: 10px;

            white-space: nowrap;
        }


        /* =====================================================
           EDIT BUTTON
        ====================================================== */

        .user-edit-button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 70px;

            padding: 9px 16px;

            border-radius: 8px;

            background: #f4b400;

            color: #ffffff !important;

            font-size: 14px;

            font-weight: 700;

            text-decoration: none;

            transition: all .2s ease;
        }

        .user-edit-button:hover {
            background: #d99d00;

            transform: translateY(-1px);
        }


        /* =====================================================
           DELETE BUTTON
        ====================================================== */

        .user-delete-button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: 46px;

            height: 40px;

            padding: 0;

            border: none;

            border-radius: 8px;

            background: #078c98;

            color: #ffffff;

            font-size: 18px;

            cursor: pointer;

            transition: all .2s ease;
        }

        .user-delete-button:hover {
            background: #067782;

            transform: translateY(-1px);
        }

/* =====================================================
   USER COUNT
====================================================== */

.users-count {
    margin-top: 6px;

    color: #64748b;

    font-size: 13px;

    font-weight: 500;
}


/* =====================================================
   PAGINATION CARD
====================================================== */

.users-pagination {
    margin-top: 24px;

    display: flex;

    justify-content: center;
}


/* =====================================================
   PAGINATION LINKS
====================================================== */

.users-pagination nav {
    display: flex;

    align-items: center;

    justify-content: center;
}


/* =====================================================
   EMPTY STATE
====================================================== */

.users-empty-wrapper {
    padding: 60px 20px;

    text-align: center;
}

.users-empty-icon {
    width: 64px;
    height: 64px;

    margin: 0 auto 15px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #e0f5f7;

    color: #078c98;

    font-size: 28px;
}

.users-empty-title {
    margin: 0;

    color: #334155;

    font-size: 18px;

    font-weight: 700;
}

.users-empty-text {
    margin: 7px 0 0;

    color: #64748b;

    font-size: 14px;
}


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 1100px) {

            .users-page {
                padding: 35px 25px 50px;
            }

            .users-header {
                margin: -35px -25px 30px;

                padding: 25px 30px;
            }

            .users-filter-row {
                flex-direction: column;

                align-items: stretch;

                gap: 20px;
            }

            .users-filter-title {
                min-width: auto;
            }

            .users-search-form {
                flex-wrap: wrap;
            }

            .users-search-input {
                max-width: none;

                flex: 1 1 250px;
            }

            .users-role-select {
                flex: 1 1 180px;

                width: auto;
            }
        }


        @media (max-width: 700px) {

            .users-page {
                padding: 25px 15px 40px;
            }

            .users-header {
                margin: -25px -15px 25px;

                padding: 22px 20px;

                flex-direction: column;

                align-items: flex-start;

                gap: 18px;
            }

            .users-header-title {
                font-size: 23px;
            }

            .add-user-button {
                width: 100%;
            }

            .users-filter-card {
                padding: 24px 20px;
            }

            .users-search-form {
                flex-direction: column;

                align-items: stretch;
            }

            .users-search-input,
            .users-role-select,
            .users-search-button,
            .users-reset-button {
                width: 100%;

                max-width: none;

                flex: none;
            }

            .users-table-card {
                padding: 20px 15px;
            }
        }

    </style>


    <!-- =====================================================
         PAGE
    ====================================================== -->

    <div class="users-page">


        <!-- =================================================
             HEADER
        ================================================== -->

        <div class="users-header">

            <h2 class="users-header-title">
                Manage Users
            </h2>

            <a
                href="{{ route('admin.users.create') }}"
                class="add-user-button"
            >
                + Add User
            </a>

        </div>


        <!-- =================================================
             MAIN CONTAINER
        ================================================== -->

        <div class="users-container">


            <!-- =================================================
                 SUCCESS MESSAGE
            ================================================== -->

            @if(session('success'))

                <div class="users-alert users-alert-success">
                    {{ session('success') }}
                </div>

            @endif


            <!-- =================================================
                 ERROR MESSAGE
            ================================================== -->

            @if(session('error'))

                <div class="users-alert users-alert-error">
                    {{ session('error') }}
                </div>

            @endif


            <!-- =================================================
                 FILTER CARD
            ================================================== -->

            <div class="users-filter-card">

                <div class="users-filter-row">


                    <!-- TITLE -->

                    <div class="users-filter-title">

    <div>
        All Users
    </div>

    <div class="users-count">
        {{ $users->total() }} total users
    </div>

</div>


                    <!-- SEARCH FORM -->

                    <form
                        method="GET"
                        action="{{ route('admin.users.index') }}"
                        class="users-search-form"
                    >


                        <!-- SEARCH INPUT -->

                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            placeholder="Search name or email..."
                            class="users-search-input"
                        >


                        <!-- ROLE -->

                        <select
                            name="role"
                            class="users-role-select"
                        >

                            <option value="">
                                All Roles
                            </option>

                            <option
                                value="student"
                                @selected(($role ?? '') === 'student')
                            >
                                Student
                            </option>

                            <option
                                value="faculty"
                                @selected(($role ?? '') === 'faculty')
                            >
                                Faculty
                            </option>

                            <option
                                value="supervisor"
                                @selected(($role ?? '') === 'supervisor')
                            >
                                Supervisor
                            </option>

                            <option
                                value="admin"
                                @selected(($role ?? '') === 'admin')
                            >
                                Admin
                            </option>

                        </select>


                        <!-- SEARCH BUTTON -->

                        <button
                            type="submit"
                            class="users-search-button"
                        >
                            Search
                        </button>


                        <!-- RESET -->

                        @if(!empty($search) || !empty($role))

                            <a
                                href="{{ route('admin.users.index') }}"
                                class="users-reset-button"
                            >
                                Reset
                            </a>

                        @endif

                    </form>

                </div>

            </div>


            <!-- =================================================
                 TABLE CARD
            ================================================== -->

            <div class="users-table-card">

                <div class="users-table-wrapper">

                    <table class="users-table">


                       <!-- TABLE HEADER -->

<thead>

    <tr>

        <th>ID</th>

        <th>User</th>

        <th>Email Address</th>

        <th>Role</th>

        <th>Joined</th>

        <th>Actions</th>

    </tr>

</thead>


                        <!-- TABLE BODY -->

                        <tbody>

                            @forelse($users as $user)

                                <tr>

                                    <!-- ID -->

                                    <td>
                                        {{ $user->id }}
                                    </td>


                                    <!-- NAME -->

                                    <td>

                                        <span class="user-name">
                                            {{ $user->name }}
                                        </span>

                                    </td>


                                    <!-- EMAIL -->

                                    <td>
                                        {{ $user->email }}
                                    </td>


                                    <!-- ROLE -->

                                    <td>

                                        @if($user->role === 'admin')

                                            <span class="role-badge role-admin">
                                                Admin
                                            </span>

                                        @elseif($user->role === 'faculty')

                                            <span class="role-badge role-faculty">
                                                Faculty
                                            </span>

                                        @elseif($user->role === 'supervisor')

                                            <span class="role-badge role-supervisor">
                                                Supervisor
                                            </span>

                                        @else

                                            <span class="role-badge role-student">
                                                Student
                                            </span>

                                        @endif

                                    </td>


                                    <!-- JOINED -->

                                    <td>
                                        {{ $user->created_at?->format('Y-m-d') }}
                                    </td>


                                    <!-- ACTIONS -->

                                    <td>

                                        <div class="user-actions">


                                            <!-- EDIT -->

                                            <a
                                                href="{{ route('admin.users.edit', $user) }}"
                                                class="user-edit-button"
                                            >
                                                Edit
                                            </a>


                                            <!-- DELETE -->

                                            @if($user->id !== auth()->id())

                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.users.destroy', $user) }}"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?');"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="user-delete-button"
                                                        title="Delete User"
                                                    >
                                                        🗑
                                                    </button>

                                                </form>

                                            @endif

                                        </div>

                                    </td>

                                </tr>



    @empty

    <tr>

        <td colspan="6">

            <div class="users-empty-wrapper">

                <div class="users-empty-icon">
                    👤
                </div>

                <h3 class="users-empty-title">
                    No users found
                </h3>

                <p class="users-empty-text">
                    Try changing your search or role filter.
                </p>

            </div>

        </td>

    </tr>

@endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- =================================================
                 PAGINATION
            ================================================== -->

            @if($users->hasPages())

                <div class="users-pagination">

                    {{ $users->links() }}

                </div>

            @endif


        </div>

    </div>

</x-app-layout>