<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <title>Payment Complete Response -demo</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen">
        <link rel="stylesheet" href="css/bootswatch.min.css">
        <script src="js/jquery-1.10.2.min.js"></script>
</head>
<body>
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

        <?php $ini_array = parse_ini_file("config.ini"); ?>

        <?php
        
        date_default_timezone_set('Asia/Colombo');
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
          STEP3: Build PaymentCompleteRequest object
          ------------------------------------------------------------------------------ */
        $completeRequest = new PaymentCompleteRequest();
        $completeRequest->setClientId($ini_array['clientID']);
        $completeRequest->setReqid($_GET['reqid']);
        /* ------------------------------------------------------------------------------
          STEP4: Process PaymentCompleteRequest object
          ------------------------------------------------------------------------------ */
        $completeResponse = $client->payment()->complete($completeRequest);

        $creditCard = $completeResponse->getCreditCard();
        $transactionAmount = $completeResponse->getTransactionAmount();
        ?>
</body>
</html>