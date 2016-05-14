<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Paycorp Init</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/bootswatch.min.css">
    <link rel="stylesheet" href="css/jsonprettyprint.css">
    <link rel="stylesheet" href="../pcw4/css/layout.css">
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
</head>
<body>
		<?php
        error_reporting(E_ALL);
        ini_set('display_errors', 0);
        ?>

        <?php include 'lib/au.com.gateway.client/GatewayClient.php'; ?>
        <?php include 'lib/au.com.gateway.client.config/ClientConfig.php'; ?>
        <?php include 'lib/au.com.gateway.client.component/RequestHeader.php'; ?>
        <?php include 'lib/au.com.gateway.client.component/CreditCard.php'; ?>
        <?php include 'lib/au.com.gateway.client.component/TransactionAmount.php'; ?>
        <?php include 'lib/au.com.gateway.client.component/Redirect.php'; ?>
        <?php include 'lib/au.com.gateway.client.facade/BaseFacade.php'; ?>
        <?php include 'lib/au.com.gateway.client.facade/Payment.php'; ?>
        <?php include 'lib/au.com.gateway.client.payment/PaymentInitRequest.php'; ?>
        <?php include 'lib/au.com.gateway.client.payment/PaymentInitResponse.php'; ?>
        <?php include 'lib/au.com.gateway.client.root/PaycorpRequest.php'; ?>
        <?php include 'lib/au.com.gateway.client.utils/IJsonHelper.php'; ?>
        <?php include 'lib/au.com.gateway.client.helpers/PaymentInitJsonHelper.php'; ?>
        <?php include 'lib/au.com.gateway.client.utils/HmacUtils.php'; ?>
        <?php include 'lib/au.com.gateway.client.utils/CommonUtils.php'; ?>
        <?php include 'lib/au.com.gateway.client.utils/RestClient.php'; ?>
        <?php include 'lib/au.com.gateway.client.enums/TransactionType.php'; ?>
        <?php include 'lib/au.com.gateway.client.enums/Version.php'; ?>
        <?php include 'lib/au.com.gateway.client.enums/Operation.php'; ?>
        <?php include 'lib/au.com.gateway.client.facade/Vault.php'; ?>
        <?php include 'lib/au.com.gateway.client.facade/Report.php'; ?>
        <?php include 'lib/au.com.gateway.client.facade/AmexWallet.php'; ?>
        <?php
        
        function hostedPage($url) {
            
            header("Location: ".$url);
        }
        
        
        $url = "http://localhost/paycorp/payment_complete.php";

        if (isset($_POST['submit'])) {

            $operation = $_POST['operation'];
            $requestDate = $_POST['requestDate'];
            $validateOnly = $_POST['validateOnly'];
            $clientId = (int) $_POST['clientId'];
            $transactionType = $_POST['transactionType'];
            $tokenize = $_POST['tokenize'];
            $tokenReference = $_POST['tokenReference'];
            $clientRef = $_POST['clientRef'];
            $comment = $_POST['comment'];
            $totalAmount = $_POST['totalAmount'];
            $serviceFeeAmount = $_POST['serviceFeeAmount'];
            $paymentAmount = $_POST['paymentAmount'];
            $currency = $_POST['currency'];
            $returnUrl = $_POST['returnUrl'];
            $returnMethod = $_POST['returnMethod'];

            date_default_timezone_set('Australia/Sydney');

            /* ------------------------------------------------------------------------------
              STEP1: Build PaycorpClientConfig object
              ------------------------------------------------------------------------------ */
            $clientConfig = new ClientConfig();
            $clientConfig->setServiceEndpoint($ini_array['endpoint']);
            $clientConfig->setAuthToken($ini_array['authToken']);
            $clientConfig->setHmacSecret($ini_array['hmac']);

            /* ------------------------------------------------------------------------------
              STEP2: Build PaycorpClient object
              ------------------------------------------------------------------------------ */
            $client = new GatewayClient($clientConfig);

            /* ------------------------------------------------------------------------------
              STEP3: Build PaymentInitRequest object
              ------------------------------------------------------------------------------ */
            $initRequest = new PaymentInitRequest();

            $initRequest->setClientId($ini_array['clientID']);
            $initRequest->setTransactionType(TransactionType::$PURCHASE);
            $initRequest->setClientRef();
            $initRequest->setComment("$comment");
            $initRequest->setTokenize(FALSE);
            $initRequest->setExtraData(array("invoiceNo" => "12345", "other_reference" => "other_reference"));

            // sets transaction-amounts details (all amounts are in cents)
            $transactionAmount = new TransactionAmount();
            $transactionAmount->setTotalAmount((float) $totalAmount);
            $transactionAmount->setServiceFeeAmount((float) $serviceFeeAmount);
            $transactionAmount->setPaymentAmount(100);
            $transactionAmount->setCurrency("$currency");
            $initRequest->setTransactionAmount($transactionAmount);
            $initRequest->setCssLocation1("http://localhost/paycorp/css/test.css");
            // sets redirect settings

            $redirect = new Redirect();
            $redirect->setReturnUrl($returnUrl);
            $redirect->setReturnMethod($returnMethod);
            $initRequest->setRedirect($redirect);
            /* ------------------------------------------------------------------------------
              STEP4: Process PaymentInitRequest object
              ------------------------------------------------------------------------------ */
            $initResponse = $client->payment()->init($initRequest);
            
            hostedPage($initResponse->getPaymentPageUrl());
        }
        ?>
</body>
</html>