# Stripe Payment Integration

This project demonstrates how to integrate Stripe payment processing into a Laravel application. It includes functionality for checkout, success, and cancellation using Stripe's Checkout API.

## Features

- List products with name, description, price, and image.
- Checkout process using Stripe's Checkout Session.
- Success and cancellation handling.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.0
- Laravel >= 10.x
- Composer
- Stripe Account

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/jsfranciscoDev/stripe-payment.git
   cd stripe-payment

2. **Install Dependencies**

    Run Composer to install the necessary PHP dependencies:
     ```bash
    composer install

3. **Set Up Environment**

    Copy the .env.example file to .env:
     ```bash
   cp .env.example .env

4. **Set Up Environment**

   Generate an application key:
     ```bash
   php artisan key:generate

5. **Configure Stripe**

   In your .env file, add your Stripe API keys:
     ```bash
   STRIPE_KEY=your_publishable_key
   STRIPE_SECRET=your_secret_key
   To obtain your Stripe API keys, follow these steps:

   Sign In to Your Stripe Account

   Go to the Stripe Dashboard and log in to your Stripe account. If you don’t have an account, you can create one here.

   Navigate to API Keys

   In the Stripe Dashboard, go to the Developers section from the left-hand menu and click on API keys.

   Retrieve Your API Keys

   Publishable Key: This key is used in your client-side code and is visible to your users. You can find it under "Standard keys".
   Secret Key: This key is used in your server-side code and should be kept confidential. It is also under "Standard keys".
   Copy and Paste

   Copy the keys from the Stripe Dashboard and paste them into your .env file in place of your_publishable_key and your_secret_key.


6. **Start the Laravel Development Server**
    ```bash
    php artisan serve
    npm run dev


## Visit the Application
Open your browser and go to http://localhost:8000/checkout to see the product list and start the checkout process.



