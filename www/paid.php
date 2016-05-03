<pre>
<?php

include_once('helper.php');

if (!empty($_POST)) {
    echo "POST DATA RECEIVED:", PHP_EOL;
    $postData = $_POST;
    var_dump($postData);
    echo "<br><br>";

    $billingId = $postData["kr_billing_transaction"];

    $request = [];
    $request["id"] = $billingId;
    $result = getJson('Charge/Get', $request);

    echo "Charge/Get WEBSERVICE ANSWER:", PHP_EOL;
    echo "<pre>".var_dump($result['answer'])."</pre>";
} else {
    echo "No post data received";
}

?>
</pre>