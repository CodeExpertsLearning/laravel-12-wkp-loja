<?php

namespace App\Http\Controllers\Site;

use App\Events\UserOrderedItemsEvent;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\CartService;
use App\Services\Payments\PaymentInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('site.checkout');
    }

    public function process(Order $order, CartService $cart, PaymentInterface $payment)
    {
        if (!$cart->count()) {
            session()->flash('warning', 'Sem Itens para Processar Checkout!');
            return redirect()->route('site.home');
        }

        $customer = auth()->user();

        $order = $order->create([
            'code' => Str::uuid(),
            'user_id' => $customer->id
        ]);

        $itemsCreate = [];

        foreach ($cart->all() as $item) {
            $itemsCreate[] = [
                'quantity' => $item['quantity'],
                'product_id' => $item['id'],
            ];
        }

        $order->items()->createMany($itemsCreate);

        $gatewayCode = $payment->doPayment([
            'our_code' => $order->id,
            'name' => $customer->name,
            'email' => $customer->email,
            'cardToken' => 'XYZ',
            'paymentMethod' => 'CREDIT_CARD'
        ])['gateway_code'];

        $order->update(['gateway_code' => $gatewayCode]);

        event(new UserOrderedItemsEvent($order));

        session()->forget(CartService::SESSION_KEY);

        return redirect()->route('site.checkout.thanks', $order);
    }

    public function thanks(Order $order)
    {
        return view('site.thanks', compact('order'));
    }
}
