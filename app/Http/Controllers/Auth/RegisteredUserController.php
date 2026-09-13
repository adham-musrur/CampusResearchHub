<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    /**
     * Display registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }



    /**
     * Handle registration.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],


            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],


            // Public users can only register as these roles
            'role' => [
                'required',
                'in:student,faculty,supervisor',
            ],


            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],

        ]);



        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => strtolower($request->role),

        ]);



        event(new Registered($user));


        Auth::login($user);



        return redirect(route('dashboard', absolute: false));

    }

}