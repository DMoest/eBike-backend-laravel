<?php

/**
 * Declaration of the controllers namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use PhpParser\Error;
use App\Models\User;


/**
 * AuthenticationController class that extends the base class Controller.
 */
class AuthenticationController extends Controller
{
    /**
     * @description Login authentication function.
     *      1. Find the user from request email.
     *      2. Validates login request.
     *      3. Try to create access token for user.
     *      4. If token creation successful return response with authenticated user and access token.
     *      5. Else catch
     *
     * @param Request $request
     */
    final public function login(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);



//        $request->session()->put('state', $state = Str::random(40));
//
//        $query = http_build_query([
//            'client_id' => 'client-id',
//            'redirect_uri' => 'http://third-party-app.com/callback',
//            'response_type' => 'code',
//            'scope' => '',
//            'state' => $state,
//        ]);
//
//        return redirect('http://passport-app.test/oauth/authorize?'.$query);



        if (!Auth::attempt($login)) {
            return response()->json(
                [
                    'message' => 'Invalid Login Credentials'
                ],
                401,
                [
                    'content-type' => 'application/json;charset=UTF-8',
                    'Charset' => 'utf-8'
                ],
                JSON_UNESCAPED_UNICODE
            );
        }

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json(
            [
                'message' => 'Login Successful',
                'user' => $user,
                'access_token' => $accessToken,
            ],
            201,
            [
                'content-type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );

//        try {
//            Auth::attempt($login);
//        } catch (Error $error) {
//            return response()->json(
//                [
//                    'message' => 'Invalid Login Credentials',
//                    'error' => $error->getMessage()
//                ],
//                401,
//                [
//                    'content-type' => 'application/json;charset=UTF-8',
//                    'Charset' => 'utf-8'
//                ],
//                JSON_UNESCAPED_UNICODE
//            );
//        }
//
//        $accessToken = $user->createToken('authToken')->accessToken;
//
//        return response()->json(
//            [
//                'message' => 'Login Successful',
//                'user' => $user,
//                'access_token' => $accessToken,
//            ],
//            201,
//            [
//                'content-type' => 'application/json;charset=UTF-8',
//                'Charset' => 'utf-8'
//            ],
//            JSON_UNESCAPED_UNICODE
//        );




    }


    /**
     * @description Function for local registration of OAuth client/user on the API.
     *
     * @param Request $request
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    final public function registerUser(Request $request) {

        $data = [
            'email' => $request['email'],
            'password' => $request['password'],
            'firstname' => $request['firstname'] || null,
            'lastname' => $request['lastname'] || null,
            'phone' => $request['phone'] || null,
            'adress' => $request['adress'] || null,
            'postcode' => $request['postcode'] || null
        ];

        return view('dashboard', $data);
    }
}
