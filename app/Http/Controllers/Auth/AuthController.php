<?php

namespace App\Http\Controllers\Auth;

// app/Http/Controllers/AuthController.php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // Redirect to Google OAuth for login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the callback after Google OAuth login
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Handle exceptions (e.g., if user denies access)
            return redirect('/login')->with('error', 'Google login failed');
        }

        // Check if the user already exists in the database
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            // User does not exist, create a new user with Google OAuth data
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                // Additional fields like first_name, last_name, etc.
            ]);
        }

        // Log in the user
        Auth::login($user);

        return redirect('/profile'); // Redirect to the profile page or any desired page after login
    }
}
