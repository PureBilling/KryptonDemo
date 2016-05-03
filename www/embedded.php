<?php
include_once('helper.php');

$request = [];
$request["amount"] = 990;
$request["currency"] = 'EUR';
$result = getJson('Charge/Capture', $request);


$formToken = $result['answer']['formToken'];

echo "New form token genrated: " . $formToken. "<br><br>";

?>

<script src="https://krypton.purebilling.io/V3/stable/kr.debug.js?formToken=<?php echo $formToken?>"
        kr-public-key="demo:testpublickey_DEMOPUBLICKEY95me92597fd28tGD4r5"
        kr-post-url="/paid.php"
></script>

<div class="kr-embedded">
    <div class="kr-pan kr-order-1"></div>
    <div class="kr-expiry-month kr-order-2"></div>
    <div class="kr-expiry-year kr-order-3"></div>
    <div class="kr-security-code kr-order-4"></div>

    <div class="kr-form-error"></div>

    <button class="kr-payment-button kr-order-5">Pay now!</button>

</div>