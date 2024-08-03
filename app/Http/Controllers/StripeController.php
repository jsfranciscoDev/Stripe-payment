<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        $products = [
            [
                'name' => 'Nike 1',
                'price' => 20.00,
                'description' => 'High-quality running shoes',
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' // Replace with a valid image URL
            ],
            [
                'name' => 'Nike 2',
                'price' => 30.00,
                'description' => 'Comfortable and stylish',
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' // Replace with a valid image URL
            ],
            [
                'name' => 'Nike 3',
                'price' => 40.00,
                'description' => 'Premium quality item',
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' // Replace with a valid image URL
            ],
        ];

        return view('index', compact('products'));
    }

    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $itemName = $request->input('item_name');
        $description = $request->input('description');
        $imageUrl = $request->input('image_url');
        $amountInDollars = $request->input('price');
        $amountInCents = $amountInDollars * 100;

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $itemName, // Required
                        'description' => $description,
                        'images' => [ $imageUrl ], // Optional
                        'metadata' => [
                            'custom_key' => 'custom_value' // Optional
                        ],
                    ],
                    'unit_amount' => $amountInCents,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        return view('success');
    }

    public function cancel()
    {
        return redirect()->route('checkout');
    }
}
