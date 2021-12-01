<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
// use Stripe\Customer;
use Stripe\Charge;


/**
 * Checkout Controller for Stripe Payments.
 */
class CheckoutController extends Controller
{

    /**
     * @description Charge payment from user.
     * @param Request $request
     * @return string
     */
    final public function charge(Request $request)
    {
        try {
            Stripe::setApiKey('STRIPE_API_KEY');

            $charge = Charge::create([
                'amount' => $request->price,
                'source' => $request->token,
                'currency' => $request->currency
            ]);

            return 'Charge successful!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
