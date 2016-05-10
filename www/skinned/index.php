<?php
include_once('../helper.php');

$request = [];
$request["amount"] = 990;
$request["currency"] = 'EUR';
$result = getJson('Charge/CreatePayment', $request);


$formToken = $result['answer']['formToken'];

$comment =  "New form token genrated: " . $formToken. "<br><br>";

?>
<!doctype html>
<html>
<head>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/animatecss/3.5.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/material.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</head>

<body>

<p><?php echo $comment;?></p>

<div id="wrapper" class="card">
    <div id="header" class="valign-wrapper">
        <h2>
            Demo
        </h2>

    </div>

    <div id="form" class="kr-embedded container">

        <!-- Card number -->
        <div class="row">
            <div class="col s3 icon-container"><i class="zmdi zmdi-card"></i></div>
            <div class="col s7 kr-pan" kr-style='{"input":{"border":"0px","border-bottom":"1px solid #ccc"}}'>

            </div>
            <div class="col s2">&nbsp;</div>
        </div>

        <!-- Expiration month -->
        <div class="row">
            <div class="col s3 icon-container"><i class="zmdi zmdi-calendar"></i></div>
            <div class="col s7 kr-expiry" kr-style='{"input":{"border":"0px","border-bottom":"1px solid #ccc"}}'>

            </div>
            <div class="col s2">&nbsp;</div>
        </div>

        <!-- CVV -->
        <div class="row">
            <div class="col s3 icon-container"><i class="zmdi zmdi-shield-security"></i></div>
            <div class="col s7 kr-security-code" kr-style='{"input":{"border":"0px","border-bottom":"1px solid #ccc"}}'>

            </div>
            <div class="col s2">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col s3">&nbsp;</div>
            <div class="col s6 valign-wrapper center-align">
                <button type="submit" class="btn kr-payment-button waves-effect waves-light">pagar</button>
            </div>
            <div class="col s3">&nbsp;</div>

        </div>

    </div>
</div>


<script src="https://krypton.purebilling.io/V3/stable/kr.debug.js?formToken=<?php echo $formToken?>"
        kr-public-key="demo:testpublickey_DEMOPUBLICKEY95me92597fd28tGD4r5"
        kr-style='{"wrapper":{"font-family":"Trebuchet MS"}}'
        kr-post-url="/paid.php"
        kr-language="es"></script>

<script type="text/javascript" src="assets/material.js"></script>

</body>

</html>