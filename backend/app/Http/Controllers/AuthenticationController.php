<?php

/**
 * Declaration of the controllers namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;


/**
 * AuthenticationController class that extends the base class Controller.
 *
 */
class AuthenticationController extends Controller
{
    /**
     * @method redirectToProvider()
     * @description With Socialite redirects user to authentication provider.
     * @return object
     */
    final public function redirectToProvider(): object
    {
        return Socialite::driver('github')->redirect();
    }


    /**
     * @method providerCallback()
     * @description
     */
    final public function providerCallback()
    {
        $githubUser = Socialite::driver('github')->user();
//        dd($githubUser); // Check values from
        $fullName = explode(" ", $githubUser->getName());

        $user = User::where('provider_id', $githubUser->getId())->first();

        /* If user does not exist in database, create new user in database. */
//        $user = User::firstOrCreate(
//            [
//                'provider_id', $githubUser->getId()
//            ],
//            [
//                'provider_id' => $githubUser->getId(),
//                'firstname' => $fullName[0],
//                'lastname' => $fullName[1],
//                'adress' => null,
//                'postcode' => null,
//                'city' => null,
//                'phone' => null,
//                'email' => $githubUser->getEmail(),
//                'password' => null,
//                'payment_method' => 'credit',
//                'payment_status' => 'unpaid',
//            ]
//        );


        if (! $user) {
            $fullName = explode(" ", $githubUser->getName());

            $user = User::create([
                'provider_id' => $githubUser->getId(),
                'firstname' => $fullName[0],
                'lastname' => $fullName[1],
                'adress' => null,
                'postcode' => null,
                'city' => null,
                'phone' => null,
                'email' => $githubUser->getEmail(),
                'password' => null,
                'payment_method' => 'credit',
                'payment_status' => 'unpaid',
            ]);
        }

        // $user->token

        /* Log user in. */
        auth()->login($user, true);

        return redirect('http://127.0.0.1:8000/api/bike');
    }
}
