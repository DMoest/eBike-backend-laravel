<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
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
    final public function mobileUserRedirectToGithub()
    {
        return Socialite::driver('github_user_mobile')->redirect();
    }


    /**
     * @description Redirects user to GitHub provider for authentication.
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    final public function webUserRedirectToGithub()
    {
        return Socialite::driver('github_user_web')->redirect();
    }


    /**
     * @description Redirects admin to GitHub provider for authentication.
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    final public function adminRedirectToGithub()
    {
        return Socialite::driver('github_admin')->redirect();
    }


    /**
     * @description GitHub login request where user can login and create a new account
     *      from GitHub creadentials. Split GitHub username to get first and last name.
     *      Try to get existing user from database. If user exists log in user else we first
     *      create a user to log in. Finally redirect user to application.
     *
     * @return Application|RedirectResponse|Redirector
     */
    final public function mobileUserGithubCallback(): Application|RedirectResponse|Redirector
    {
        $githubUser = Socialite::driver('github_user_web')->user();
        $userName = explode(' ', $githubUser->name);
        $user = User::where('provider_id', $githubUser->getId())->first();
        $lastname = null;

        if (count($userName) > 1) {
            $lastname = $userName[1];
        }


        /**
         * If user does not exits in database, create a new user.
         */
        if (!$user) {
            $user = User::create([
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

        Auth::login($user, true);

        return redirect('http://localhost:8001/index.html#/');
    }


    /**
     * @description GitHub login request where user can login and create a new account
     *      from GitHub creadentials. Split GitHub username to get first and last name.
     *      Try to get existing user from database. If user exists log in user else we first
     *      create a user to log in. Finally redirect user to application.
     *
     * @return Application|RedirectResponse|Redirector
     */
    final public function webUserGithubCallback(): Application|RedirectResponse|Redirector
    {
        $githubUser = Socialite::driver('github_admin')->user();
        $userName = explode(' ', $githubUser->name);
        $user = User::where('provider_id', $githubUser->getId())->first();
        $lastname = null;

        if (count($userName) > 1) {
            $lastname = $userName[1];
        }


        /**
         * If user does not exits in database, create a new user.
         */
        if (!$user) {
            $user = User::create([
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

        Auth::login($user, true);

        return redirect('http://localhost:3000/user');
    }


    /**
     * @description GitHub login request where user can login and create a new account
     *      from GitHub creadentials. Split GitHub username to get first and last name.
     *      Try to get existing user from database. If user exists log in user else we first
     *      create a user to log in. Finally redirect user to application.
     *
     * @return Application|RedirectResponse|Redirector
     */
    final public function adminGithubCallback(): Application|RedirectResponse|Redirector
    {
        $githubUser = Socialite::driver('github_admin')->user();
        $userName = explode(' ', $githubUser->name);
        $user = User::where('provider_id', $githubUser->getId())->first();
        $lastname = null;

        if (count($userName) > 1) {
            $lastname = $userName[1];
        }


        /**
         * If user does not exits in database, create a new user.
         */
        if (!$user) {
            $user = User::create([
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

        Auth::login($user, true);

        return redirect('http://localhost:3000/admin');
    }
}
