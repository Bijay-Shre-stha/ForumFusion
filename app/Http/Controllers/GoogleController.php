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
            $findUser = $this->findOrCreateUser($user);

            Auth::login($findUser);
            return redirect()->route('dashboard.index');
        } catch (Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            return redirect()->route('login');
        }
    }

    protected function findOrCreateUser($socialiteUser)
    {
        $existingUser = User::where('email', $socialiteUser->getEmail())->first();

        return $existingUser ?: $this->createNewUser($socialiteUser);
    }

    protected function createNewUser($socialiteUser)
    {
        // dd($socialiteUser);
        return User::create([
            'email' => $socialiteUser->getEmail(),
            'googleId' => $socialiteUser->getId(),
            'username' => $socialiteUser->getName(),
            'avatar' => $socialiteUser->getAvatar(),
            'isAuthenticated' => true,
        ]);
    }
}
