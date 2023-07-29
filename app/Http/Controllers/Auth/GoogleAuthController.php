<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    // Redirect the user to Google for authentication
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the Google OAuth callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Find or create the user based on the email
        $existingUser = User::where('email', $user->email)->first();
        $userArray = $user->user;

        if ($existingUser) {
            auth()->login($existingUser);
        } else {
            // Create a new user
            $newUser = new User([
                'first_name' => $userArray['given_name'],
                'last_name' => $userArray['family_name'],
                'username' => str_replace(' ', '', $userArray['given_name'] . $userArray['family_name']),
                'email' => $userArray['email'],
                'password' => Hash::make($userArray['name'] . '@' . $userArray['id']),
                "avatar" => $userArray['picture'],
                "user_type" => "user",

                // Add other fields as needed
            ]);
            $newUser->save();
            auth()->login($newUser);
            return redirect()->route('userdetail.create');
        }

        // Redirect the user to the home page
        return redirect()->route('welcome');
    }
}
