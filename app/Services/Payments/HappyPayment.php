<?php

namespace App\Services\Payments;

use App\Services\Payments\PaymentInterface;

class HappyPayment implements PaymentInterface
{
    public function doPayment(array $data): array
    {
        //algoritmo do pagamento...
        return ['gateway_code' => str()->uuid()];
    }
}
