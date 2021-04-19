<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Liqpay\Liqpay;

class PaymentController extends Controller
{
    const CURRENCY = "UAH";
    const PUBLIC_KEY = "sandbox_i70327305416";
    const PRIVATE_KEY ="sandbox_SO43FU9K1QRo5k5wygUza5OK2wBeUqPC33NL1cz8";
    const API_VERSION = "3";
    const AMOUNT = "20";
    const DESCRIPTION = "Оплата за послуги визначення овуляції";

    public function showPayment(){
      $liqpay = new LiqPay(self::PUBLIC_KEY, self::PRIVATE_KEY);

      $paymentParams = array(
        'action'         => 'pay',
        'amount'         => self::AMOUNT,
        'currency'       => self::CURRENCY,
        'description'    => self::DESCRIPTION,
        'order_id'       => uniqid(null, true),
        'version'        => self::API_VERSION
      );

      $formData = $liqpay->cnb_form_raw($paymentParams);

      return view("paymentPage", $formData);
    }

    public function processPayment(){

    }
}
