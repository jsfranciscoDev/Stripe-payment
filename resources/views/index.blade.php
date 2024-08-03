<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Checkout</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-6">TEST DEV: Stripe Checkout</h1>

    <!-- Test Notice -->
    <div class="bg-yellow-100 border border-yellow-300 text-yellow-700 px-4 py-3 rounded mb-6" role="alert">
        <strong class="font-bold">Notice:</strong>
        <span class="block sm:inline">This checkout is for development/testing purposes only. No real transactions will be processed. Please use testing cards.</span>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        @foreach ($products as $product)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-40 object-cover mb-4 rounded-md">
                <h2 class="text-2xl font-bold mb-2">{{ $product['name'] }}</h2>
                <p class="text-lg mb-2">${{ number_format($product['price'], 2) }}</p>
                <p class="text-sm mb-4">{{ $product['description'] }}</p>
                <form action="{{ route('stripe.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="{{ $product['name'] }}">
                    <input type="hidden" name="price" value="{{ $product['price'] }}">
                    <input type="hidden" name="description" value="{{ $product['description'] }}">
                    <input type="hidden" name="image_url" value="{{ $product['image'] }}">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Checkout
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
