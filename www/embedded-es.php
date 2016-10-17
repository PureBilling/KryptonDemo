<?php
include_once('helper.php');

$request = [];
$request["amount"] = 990;
$request["currency"] = 'EUR';
$result = getJson('Charge/CreatePayment', $request);


$formToken = $result['answer']['formToken'];

echo "<p>New form token genrated: " . $formToken. "</p>";

?>

<script src="https://krypton.purebilling.io/V3/stable/kr.debug.js?formToken=<?php echo $formToken?>"
        kr-public-key="demo:testpublickey_DEMOPUBLICKEY95me92597fd28tGD4r5"
        kr-post-url="/paid.php"
        kr-theme="icons-1"
        kr-language="es"
></script>

<div class="kr-embedded">
    <div class="kr-pan kr-order-1"></div>
    <div class="kr-expiry kr-order-2"></div>
    <div class="kr-security-code kr-order-3"></div>

    <div class="kr-form-error"></div>

    <button class="kr-payment-button kr-order-4">pagar</button>

</div>