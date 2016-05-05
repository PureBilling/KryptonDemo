<html>
<head>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/styles/dracula.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="skinned/assets/paid.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/highlight.min.js"></script>

</head>
<body>
<div class="container">
<?php

include_once('helper.php');

if (!empty($_POST)) {

    $postData = $_POST;
    $data1 = json_encode($postData, JSON_PRETTY_PRINT);

    $billingId = $postData["kr_billing_transaction"];

    $request = [];
    $request["id"] = $billingId;
    $result = getJson('Charge/Get', $request);

    if ($result['answer']['status'] == 'paid') {
        print "<h2>Transaction has been paid !!</h2>";
    }

    echo "<h2>post data received:</h2>", PHP_EOL;
    echo "<pre><code class=\"json\">$data1</code></pre>";



    echo "<h2>Charge/Get web-service answer:</h2>", PHP_EOL;
    $data = json_encode($result, JSON_PRETTY_PRINT);
    echo "<pre><code class=\"json\">$data</code></pre>";
} else {
    echo "No post data received";
}

?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });
    });
</script>
</body></html>