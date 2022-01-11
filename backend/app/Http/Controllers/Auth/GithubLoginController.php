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
        $userName = explode(' ', $githubUser->name);
        $user = User::where('provider_id', $githubUser->getId())->first();
        $lastname = null;

        if ($userName > 1) {
            $lastname = $userName[1];
        }

        /**
         * If user does not exits in database, create a new user.
         */
        if (!$user) {
            echo "Create User.";

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
            ]);
        }

        Auth::login($user, true);

        return redirect('/dashboard/clients');
    }
}
