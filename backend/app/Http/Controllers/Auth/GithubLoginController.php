<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


/**
 * @description Authentication controller for GitHub login. Uses
 *
 */
class GithubLoginController extends Controller
{
    /**
     * @description Redirects user to GitHub provider for authentication.
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    final public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }


    /**
     * @description GitHub login request where user can login and create a new account
     *      from GitHub creadentials. Split GitHub username to get first and last name.
     *      Try to get existing user from database. If user exists log in user else we first
     *      create a user to log in. Finally redirect user to application.
     *
     * @return Application|RedirectResponse|Redirector
     */
    final public function githubCallback(): Application|RedirectResponse|Redirector
    {
        $githubUser = Socialite::driver('github')->user();
        $session = session()->all();
        $previousURL = $session['_previous']['url'];
        $requestURLs = [
            'http://localhost:8000/login/admin/web/github',
            'http://localhost:8000/login/user/web/github',
            'http://localhost:8000/login/user/mobile/github'
        ];
        $userName = explode(' ', $githubUser->name);
        $user = User::where('provider_id', $githubUser->getId())->first();
        $lastname = null;

        if (count($userName) > 1) {
            $lastname = $userName[1];
        }

        if ($previousURL == $requestURLs[0]) {
            if (!$user) {
                $user = $this->createAdmin($githubUser, $userName, $lastname);
            }

            Auth::login($user, true);

            return redirect('http://localhost:3000/admin');

        } elseif ($previousURL == $requestURLs[2]) {
            if (!$user) {
                $user = $this->createUser($githubUser, $userName, $lastname);
            }

            Auth::login($user, true);

            return redirect('http://localhost:8001/index.html#/');

        }

        if (!$user) {
            $user = $this->createUser($githubUser, $userName, $lastname);
        }

        Auth::login($user, true);

        return redirect('http://localhost:3000/user');

    }


    final public function createAdmin($githubUser, $userName, $lastname) {
        return User::create([
            '_id' => $githubUser->getId(),
            'firstname' => $userName[0],
            'lastname' => $lastname,
            'email' => $githubUser->getEmail(),
            'country' => $githubUser->user['location'],
            'created_at' => now(),
            'updated_at' => now(),
            'provider_id' => $githubUser->getId(),
            'adress' => null,
            'postcode' => null,
            'city' => null,
            'userClass' => 'Admin'
        ]);
    }

    final public function createUser($githubUser, $userName, $lastname) {
        return User::create([
            '_id' => $githubUser->getId(),
            'firstname' => $userName[0],
            'lastname' => $lastname,
            'email' => $githubUser->getEmail(),
            'country' => $githubUser->user['location'],
            'created_at' => now(),
            'updated_at' => now(),
            'provider_id' => $githubUser->getId(),
            'adress' => null,
            'postcode' => null,
            'city' => null,
            'userClass' => 'User'
        ]);
    }
}
