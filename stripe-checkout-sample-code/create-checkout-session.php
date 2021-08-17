<?php

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51JCEcACeiwjee7zVh6m3XGtvxkERonYj8IKJe4yGL5Xd61c4voo6xYi0XUnmaqo9I1gKiOOUn0Ykey19b4R31Dk500qTl7LhTO');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:4242';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => [
    'card',
  ],
  'line_items' => [[
    # TODO: replace this with the `price` of the product you want to sell
    'price' => '{{PRICE_ID}}',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);