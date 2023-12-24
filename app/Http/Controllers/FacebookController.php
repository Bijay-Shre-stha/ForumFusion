<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;
use Str;
use Hash;
use Exception;

class FacebookController extends Controller
{
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            // Check if user already exist
            return ("welcome");
        } catch (Exception $e) {
            return redirect()->route('facebook.login'); // Redirect to the facebook login page on error
        }
    }
}
