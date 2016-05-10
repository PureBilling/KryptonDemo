<?php
include_once('helper.php');

$request = [];
$request["amount"] = 990;
$request["currency"] = 'EUR';
$result = getJson('Charge/CreatePayment', $request);


$formToken = $result['answer']['formToken'];

echo "New form token genrated: " . $formToken . "<br><br>";

?>

<script src="https://krypton.purebilling.io/V3/stable/kr.debug.js?formToken=<?php echo $formToken?>"
        kr-public-key="demo:testpublickey_DEMOPUBLICKEY95me92597fd28tGD4r5"
        kr-company-name="Gonzales S.L."
        kr-button-label="pagar"
        kr-order-summary="1 protector de pantalla"
        kr-post-url="/paid.php"
        kr-language="es"></script>

<div class="kr-checkout"></div>