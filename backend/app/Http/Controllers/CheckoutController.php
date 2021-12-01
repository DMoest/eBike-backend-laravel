<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class CheckoutController extends Controller
{

    public function charge(Request $request)
    {

        try {
            Stripe::setApiKey('sk_test_51JxuwuKh30a9IIAiHTQNSfkDL81LHFr0hyfbAC0mtj3w4ES7vO3BX0NrPBt9pCwbVRL1rPSPkcp4g8KPBcUZzq9F00FtttQb3F');

            $charge = Charge::create(array(
                'amount' => $request->price,
                'source' => $request->token,
                'currency' => $request->currency
            ));

            return 'Charge successful!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

}
