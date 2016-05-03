<?php
include_once('helper.php');

$request = [];
$request["amount"] = 990;
$request["currency"] = 'EUR';
$result = getJson('Charge/Capture', $request);


$formToken = $result['answer']['formToken'];

echo "New form token genrated: " . $formToken;

?>

<script src="https://krypton.purebilling.io/V3/stable/kr.debug.js?formToken=<?php echo $formToken?>"
        kr-public-key="demo:testpublickey_DEMOPUBLICKEY95me92597fd28tGD4r5"
        kr-company-name="My company"
        kr-button-label="Pay now!"
        kr-order-summary="super bike"
        kr-post-url="/paid.php"></script>

<div class="kr-checkout"></div>