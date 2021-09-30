<?php

use FontLib\Table\Type\name;

namespace App\Service;

class BraintreeService
{
    public function gateway()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        return $gateway;
    }

    public function getToken()
    {
        return $this->gateway()->ClientToken()->generate();
    }
}