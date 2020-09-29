<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;

class SocLoginController extends Controller
{
    public function loginGH() {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        return Socialite::with('github')->redirect();
    }

    public function responseGH(UserRepository $userRepository) {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        $user = Socialite::driver('github')->user();
        $userInSystem = $userRepository->getUserBySocId($user, 'github');
//        dump($user);
//        dd($userInSystem);
        Auth::login($userInSystem);
//        dd($user);
        return redirect()->route('Home');
    }
}
