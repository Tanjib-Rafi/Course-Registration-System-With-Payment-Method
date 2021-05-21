<?php
// require_once('vendor/autoload.php');//use for composer
require_once('./stripe-php-master/init.php');
$stripe = [
    "secret_key"      => "sk_test_51IX1k6DfbWnbeNn87lLrzfpb55q183HIi1zaJolaFmbSue1mObueIfuMVvmi4KUMgnVL0wRSrSU2IhOqwitFWlHf00NivAklfr",
    "publishable_key" => "pk_test_51IX1k6DfbWnbeNn8F2WxLumAyepqQOs89j1ymxFJp5CV7r6hWUz30YSc7gUcG4S1q5m5VMBhl7BeyKqL1MHbDcwp000FVbJrM2",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>