<?php

/**
 * Declaration of the controllers namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Error;


/**
 * AuthenticationController class that extends the base class Controller.
 */
class AuthenticationController extends Controller
{
    /**
     * @description Login authentication function.
     *      1. Validates login request.
     *      2. Try to create access token for user.
     *      3. If token creation successfull return response with authenticated user and access token.
     *      4. Else catch
     * @param Request $request
     * @return bool|Application|ResponseFactory|Response
     */
    final public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);


        try {
            Auth::attempt($login);

            $accessToken = Auth::user()->createToken('authToken')->accessToken;

            return response([
                'user' => Auth::user(),
                'access_token' => $accessToken
            ]);

        } catch (Error $error) {
            return response([
                'message' => 'Invalid login credentials...',
                'error' => $error->getMessage()
            ]);
        }
    }
}
