<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Method to show register form
     */
    public function create(): View
    {
        return view('users.register');
    }

    /**
     * Method to create/store a new user
     */
    public function store(Request $request): Redirector|RedirectResponse
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['email', 'required', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8']
        ]);
        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user = User::create($formFields);

        // Auto login user
        auth()->login($user);

        return redirect("/")->with('message', 'User created and logged in successfully');
    }

    /**
     * Method to log out a user
     */
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/")->with('message', 'You have been logged out');
    }
}
