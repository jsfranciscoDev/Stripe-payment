<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-6">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-sm w-full text-center">
        <svg class="w-16 h-16 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <h1 class="text-3xl font-bold mb-2">Payment Successful!</h1>
        <p class="text-gray-600 mb-4">Thank you for your purchase. Your payment has been processed successfully.</p>
        <a href="{{ route('checkout') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Back to Shop
        </a>
    </div>
</body>
</html>
