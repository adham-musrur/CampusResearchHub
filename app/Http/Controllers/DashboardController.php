<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'student') {

            return view('dashboard.student');

        } elseif ($user->role == 'faculty') {

            return view('dashboard.faculty');

        } elseif ($user->role == 'supervisor') {

            return view('dashboard.supervisor');

        } elseif ($user->role == 'admin') {

            return view('dashboard.admin');

        }

        return abort(403);
    }
}