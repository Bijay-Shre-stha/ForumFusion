<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        try {
            $user = Socialite::driver('google')->user();
            // Check if user already exists
            $findUser = User::where('email', $user->getEmail())->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect("/welcome");
            } else {
                $newUser = User::create([
                    'email' => $user->getEmail(),
                    'googleId' => $user->getId(), // Update to use 'google_id' field
                    'username' => $user->getName(), // Adjust as needed
                    'currentOrgName' => 0, // Adjust as needed
                ]);
                Log::info('Attempting to create a new user', ['email' => $user->getEmail(), 'google_id' => $user->getId()]);

                Auth::login($newUser);
                return redirect("/welcome");
            }
        } catch (Exception $e) {
            dd($e->getMessage()); // This will show the specific exception message
            return redirect()->route('home');
        }
    }
}
