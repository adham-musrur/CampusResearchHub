<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
 * Display all users with search, role filter and pagination.
 */
public function index(Request $request)
{
    $search = $request->input('search');
    $role = $request->input('role');

    $users = User::query()

        // Search by name or email
        ->when($search, function ($query, $search) {

            $query->where(function ($query) use ($search) {

                $query->where(
                    'name',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhere(
                    'email',
                    'like',
                    '%' . $search . '%'
                );

            });

        })

        // Filter by role
        ->when($role, function ($query, $role) {

            $query->where('role', $role);

        })

        // Latest users first
        ->latest()

        // 10 users per page
        ->paginate(10)

        // Keep search and role in pagination links
        ->withQueryString();


    return view(
        'admin.users.index',
        compact(
            'users',
            'search',
            'role'
        )
    );
}
    /**
     * Show create user form.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store new user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => 'required|string|min:8|confirmed',

            'role' => [
                'required',
                Rule::in([
                    'student',
                    'faculty',
                    'supervisor',
                    'admin',
                ]),
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully!');
    }

    /**
     * Show edit user form.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'role' => [
                'required',
                Rule::in([
                    'student',
                    'faculty',
                    'supervisor',
                    'admin',
                ]),
            ],

            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully!');
    }

    /**
     * Delete user.
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully!');
    }
}